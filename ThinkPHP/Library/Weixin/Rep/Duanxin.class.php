<?php
/*
 ## Duanxin
 ## 阿里云短信接口
 ## $Dx = new Duanxin($options);
 ## $res = $Dx -> sendmsg('2152',13805697081);
 ## $res 
*/
namespace Weixin\Rep;
 
class Duanxin
{
	const REQUEST_HOST = 'http://sms.market.alicloudapi.com';
	const REQUEST_URI = '/singleSendSms';
	const REQUEST_METHOD = 'GET';
	
	private $app_key;
	private $app_secret;
	//private $request_paras;

	public function __construct($options){
	   $this -> app_key = isset($options['app_key'])?$options['app_key']:'';
	   $this -> app_secret = isset($options['app_secret'])?$options['app_secret']:'';
	   //$this -> request_paras = isset($options['request_paras'])?$options['request_paras']:false;
	}
	
	public function sendmsg($request_paras){
	  
	   ksort($this -> request_paras);
	   $request_header_accept = "application/json;charset=utf-8";
	   $content_type = "";
	   $headers = array(
	      'X-Ca-Key' => $this -> app_key,
		  'Accept' => $request_header_accept
       );
	   ksort($headers);
	   $header_str = "";
	   $header_ignore_list = array('X-CA-SIGNATURE', 'X-CA-SIGNATURE-HEADERS', 'ACCEPT', 'CONTENT-MD5', 'CONTENT-TYPE', 'DATE');
	   $sig_header = array();
	   foreach($headers as $k => $v) {
          if(in_array(strtoupper($k), $header_ignore_list)) {
             continue;
          }
          $header_str .= $k . ':' . $v . "\n";
          array_push($sig_header, $k);
       }
	   $url_str = self::REQUEST_URI;
	   $para_array = array();
	   foreach($request_paras as $k => $v) {
          array_push($para_array, $k .'='. $v);
       }
	   if(!empty($para_array)) {
          $url_str .= '?' . join('&', $para_array);
       }
	   $content_md5 = "";
	   $date = "";
	   $sign_str = "";
	   $sign_str .= self::REQUEST_METHOD ."\n";
	   $sign_str .= $request_header_accept."\n";
	   $sign_str .= $content_md5."\n";
	   $sign_str .= "\n";
	   $sign_str .= $date."\n";
	   $sign_str .= $header_str;
	   $sign_str .= $url_str;
	   $sign = base64_encode(hash_hmac('sha256', $sign_str, $this -> app_secret, true));
	   $headers['X-Ca-Signature'] = $sign;
	   $headers['X-Ca-Signature-Headers'] = join(',', $sig_header);
	   $request_header = array();
	   foreach($headers as $k => $v) {
          array_push($request_header, $k .': ' . $v);
       }
	   
	   $ch = curl_init();
	   
	   curl_setopt($ch, CURLOPT_URL, self::REQUEST_HOST . $url_str);
	   //curl_setopt($ch, CURLOPT_HEADER, true);
	   //curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	   curl_setopt($ch, CURLOPT_VERBOSE, true);
	   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($ch, CURLOPT_HTTPHEADER, $request_header);
	   $sContent = curl_exec($ch);
	   $aStatus = curl_getinfo($ch);
	   //$res = curl_multi_getcontent($ch);
	   curl_close($ch);
	   if(intval($aStatus["http_code"])==200){
		  return $sContent;
	   }else{
		  return false;
	   }
	}
}
