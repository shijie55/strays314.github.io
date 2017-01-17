// JavaScript Document
$(function(){
   $('.kd-menu-icon a').click(function(){
      $('.kd-nav').slideDown(function(){
	     $('.kd-menu-icon-close').fadeIn();
	  });
   });   
   $('.kd-menu-icon-close a').click(function(){
      $(this).parent().fadeOut();
	  $('.kd-nav').slideUp();
   });
   
   $('.ion-opn-sub-menu').click(function(){
      var p = $(this).parent();
	  $(this).addClass('hidden');
	  $('.p-nav-box ul').slideDown();
	  p.find('.ion-cls-sub-menu').removeClass('hidden');
   });
   $('.ion-cls-sub-menu').click(function(){
      var p = $(this).parent();
	  $(this).addClass('hidden');
	  $('.p-nav-box ul').slideUp();
	  p.find('.ion-opn-sub-menu').removeClass('hidden');
   });
});

         
  