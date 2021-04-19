(function($){
	"use strict";	
    $(document).ready(function() {

        if ($('body').length ) { $('body').fitVids(); }
        $('select').chosen();


        $('audio').mediaelementplayer({
            pluginPath: 'https://cdnjs.com/libraries/mediaelement/',
            shimScriptAccess: 'always'
        });

        // Function Silaslite
        header_fixed();
        init_carousel();
        silaslite_main_menu();
        document.onkeyup = KeyPress;

        // Menu Touch        
        $('.body-overlay').on('click',function() {
            $('body').removeClass('open-menutouch');
        });

        $(document).on('click','.menu-touch',function( event ){
            event.stopPropagation();
            $(this).toggleClass('active');
            $('body').addClass('open-menutouch');
            return false;
        });
        
        //Nav Search
         $(document).on('click','.navbar-search',function(){
            $('.header-search').addClass('search-active');
            return false;
        });
         $(document).on('click','.close-search',function(){
            $(this).closest('.header-search').removeClass('search-active');
            return false;
        });

        //Submenu 
        var _subMenu = $('.main-menu-horizontal .silaslite-main-menu > li > .sub-menu');
        _subMenu.each(function(){
            var _widthSub = $(this).outerWidth(),
                _widthContainer = $('.main-wrapper-boxed').outerWidth(),
                offsetContent = ($(window).width() - _widthContainer)/2;
            
            var offsetLeft = $(this).offset().left,
                offsetRight = $(window).width() - offsetLeft;

            var _rightPos =  offsetRight - offsetContent;

            if(_rightPos < _widthSub){
                var _left = (_widthSub - _rightPos) + 50;
                console.log(_left);
                $(this).css({
                    "left": '-'+_left+'px'
                });
                $(this).find('.sub-menu').css({
                    "left": "auto",
                    "right": "100%"
                });
            }

        })


    });

    // Header Fixed
    function header_fixed()
    {
        var lastScrollTop = 0, flag = false;
        var heightFixed = $('.header-maintop').outerHeight(),
            heightAnimate = heightFixed + 500;
        $(window).scroll(function(event){
            var st = $(this).scrollTop();
            if (st > heightFixed){
                // downscroll code
                $('.header').addClass('header-fixed');
            }
            if(st >= heightAnimate){
                $('.header').addClass('header-animate');
            }else{
                // upscroll code
                flag = true;
                $('.header').removeClass('header-animate');
                $('.header').removeClass('header-fixed');
            }

        });
    }

    /* ---------------------------------------------
     Owl carousel
    --------------------------------------------- */
    function init_carousel()
    {
        $('.owl-carousel').each(function(){
            var config = $(this).data();
            config.navText = ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'];
            var animateOut = $(this).data('animateout');
            var animateIn = $(this).data('animatein');
            if(typeof animateOut != 'undefined' ){
              config.animateOut = animateOut;
            }
            if(typeof animateIn != 'undefined' ){
              config.animateIn = animateIn;
            }
            
            config.smartSpeed = 1000;

            var owl = $(this);
            owl.owlCarousel(config);

        });
    }

    // Menu
    function silaslite_main_menu()
    {
        //Hover
        $('.silaslite-main-menu li.menu-item-has-children,.silaslite-main-menu li.page_item_has_children').hover(function(){
             $(this).addClass('is-hover');
        },function(){
             $(this).removeClass('is-hover');
        });

        //Click
        $('.silaslite-main-menu li.menu-item-has-children > a,.silaslite-main-menu li.page_item_has_children > a').on('click',function(e){
            if ($(this).parent().hasClass('show-submenu')) {
                $(this).parent().removeClass('show-submenu');
                $(this).removeClass('active');
            } else {
                $(this).closest('ul').children('li').removeClass('show-submenu');
                $(this).closest('ul').children('li').children('.active').removeClass('active');
                $(this).parent().toggleClass('show-submenu');
                $(this).addClass('active');
            }
            return false;
        });
    }

    function KeyPress()
    {
        if ( ! $('.menu-touch').is(':focus') ) {
            $(this).removeClass('active');
            $('body').removeClass('open-menutouch');
        }
        //Focus
        $('.menu-touch').on('focus',function(){
            $(this).addClass('active');
            $('body').addClass('open-menutouch');
            return false;
        });

        if ( $('.close-search').is(':focus') ) {
            $('.header-search').removeClass('search-active');
        }
        //Focus
        $('.navbar-search').on('focus',function(){
            $('.header-search').addClass('search-active');
            return false;
        });
        
        
    }
})(jQuery);
