/**
 * Created by Administrator on 2016/11/29.
 */

$(function() {

    // 设置nav-copy的高度与原来nav所占的高度一致
    var h = $('nav .row').eq(0).height();
    var h2 = h+20;
    $('.nav-copy').css( {
        'height': h2,
    } );

    $('.rightside-menu > ul').css( {
        'margin-top': h2
    } );

    // 眼睛按钮点击事件
    $('.eye').click(function () {
        $(this).fadeOut('fast', function () {
            $('.cover-floor').fadeIn('fast');
        })
    })

    // 遮盖层删除按钮点击事件
    $('.exit-floor').click(function () {
        $('.cover-floor').fadeOut('fast', function () {
            $('.eye').fadeIn('fast');
        })
    })

    // 导航菜单按键点击
    $('nav .row span').eq(0).click(function () {
        $(this).fadeOut('fast', function () {
            $('.rightside-menu span').fadeIn('fast',function () {
                $('.rightside-menu').css('display','block').animate( {
                    right: '0'
                }, 'fast');
            } );
        } );
     } );

    // 侧边菜单关闭按钮点击事件
    $('.rightside-menu span').click(function () {
        $(this).fadeOut('fast', function() {
            $('nav .row span').fadeIn('fast',function() {
                $('.rightside-menu').animate( {
                    right: '-50%'
                }, 'fast', function() {
                    $('.rightside-menu').css('display','none');
                    $('.second-menu').css('display','none');
                } );
            } );
        } );
    } );

    // 导航二级菜单
    $('.rightside-menu>ul>li').click(function() {
        $(this).siblings().children('ul').slideUp('fast');
        $(this).children('ul').slideDown('fast');
    } );

    // 导航色块touch高度变化
    $('.banner-bottom>div').click(function() {
        $(this).animate( {
            top: "-10%",
            height: "110%"
        }).siblings().animate( {
            top: "0",
            height: "100%"
        } );
    } );

    /* // content-repeat点击事件
    $('.content-repeat').click(function() {
        $(this).addClass('opened').siblings().removeClass('opened');
    } )*/

    // 加号，减号点击
    $('.plus').click(function() {
        $(this).parent('p').parent('div').addClass('opened').siblings().removeClass('opened');
    } )
    $('.minus').click(function() {
        $('.content-repeat').removeClass('opened');
    } )

    // 轮播图滑动

} )
