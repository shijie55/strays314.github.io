<?php
namespace Home\Model;
use Think\Model;

class FixModel extends Model
{
    protected $_validate = array(
        array('tel','number','手机格式错误')
    );
}