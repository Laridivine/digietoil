jQuery(document).ready(function($) {

    // Header Slide
    var owl = $('.header-slider');
    owl.owlCarousel({
        rtl: $("html").attr("dir") == 'rtl' ? true : false,
        items: 1,
        loop: true,
        dots: true,
        nav: true,
        margin: 0,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        singleItem: true,
        autoplay: false,
        autoplayTimeout: 3000,
        autoHeight:true
    });
    owl.owlCarousel();
    owl.on('translate.owl.carousel', function (event) {
        var data_anim = $("[data-animation]");
        data_anim.each(function() {
            var anim_name = $(this).data('animation');
            $(this).removeClass('animated ' + anim_name).css('opacity', '0');
        });
    });
    $("[data-delay]").each(function() {
        var anim_del = $(this).data('delay');
        $(this).css('animation-delay', anim_del);
    });
    $("[data-duration]").each(function() {
        var anim_dur = $(this).data('duration');
        $(this).css('animation-duration', anim_dur);
    });
    owl.on('translated.owl.carousel', function() {
        var data_anim = owl.find('.owl-item.active').find("[data-animation]");
        data_anim.each(function() {
            var anim_name = $(this).data('animation');
            $(this).addClass('animated ' + anim_name).css('opacity', '1');
        });
    });


    // testimonial Carousel
    $(".testimonial-carousel").owlCarousel({
        rtl: $("html").attr("dir") == 'rtl' ? true : false,
        //center: true,
        loop: true,
        dots: true,
        margin: 30,
        //stagePadding: 15,
        //items: 2,
        autoplay: false,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2//,
                //margin: 13
            },
            992: {
                items: 2,
            }
        }
    });


    /* --------------------------------------
        Scroll UP
    -------------------------------------- */

    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    /*------------------------------------
        Search
    --------------------------------------*/

    $('.searchBtn').on('click', function(e) {
        //$('body').toggleClass('search__box__show__hide');
        var $searchbox = $('.search__area');
        if ($('body').hasClass('search__box__show__hide')) {
            $('body').removeClass('search__box__show__hide');
            $(".search__open").focus();
        } else {
            $('body').addClass('search__box__show__hide');
            $('.search-field.sb-field').focus();
        }
        e.preventDefault();
        var links,i,len,searchItem=document.querySelector('.search__area'),fieldToggle=document.querySelector('#close-btn');let focusableElements='button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';let firstFocusableElement=fieldToggle;let focusableContent=searchItem.querySelectorAll(focusableElements);let lastFocusableElement=focusableContent[focusableContent.length-1];if(!searchItem){return!1}
        links=searchItem.getElementsByTagName('button');for(i=0,len=links.length;i<len;i++){links[i].addEventListener('focus',toggleFocus,!0);links[i].addEventListener('blur',toggleFocus,!0)}
        function toggleFocus(){var self=this;while(-1===self.className.indexOf('search__inner')){if('input'===self.tagName.toLowerCase()){if(-1!==self.className.indexOf('focus')){self.className=self.className.replace('focus','')}else{self.className+=' focus'}}
        self=self.parentElement}}
        document.addEventListener('keydown',function(e){let isTabPressed=e.key==='Tab'||e.keyCode===9;if(!isTabPressed){return}
        if(e.shiftKey){if(document.activeElement===firstFocusableElement){lastFocusableElement.focus();e.preventDefault()}}else{if(document.activeElement===lastFocusableElement){firstFocusableElement.focus();e.preventDefault()}}})
    });
    
    /*------------------------------------
        Sticky Menu
    --------------------------------------*/

    var windows = $(window);
    var stick = $(".header-sticky");
    windows.on('scroll', function() {
        var scroll = windows.scrollTop();
        if (scroll < 10) {
            stick.removeClass("sticky");
        } else {
            stick.addClass("sticky");
        }
    });

    /*------------------------------------
        Main Menu
    --------------------------------------*/
    $('.navbar-pc').find( 'a' ).on( 'focus blur', function() {
        $( this ).parents( 'ul, li' ).toggleClass( 'focus' );
    });

    /* last  2 li child add class */
    $('ul.menu > li').slice(-2).addClass('last-elements');
    $('.our-feature .features-box').each(function(){$(this).hover(function(){$(this).parents('.our-feature .row').find('.features-box').removeClass('active');$(this).addClass('active');});});
    var perspectiveSettings=[{},{movement:{imgWrapper:{translation:{x:10,y:10,z:30},rotation:{x:0,y:-10,z:0},reverseAnimation:{duration:200,easing:"easeOutQuad"}},lines:{translation:{x:10,y:10,z:[0,70]},rotation:{x:0,y:0,z:-2},reverseAnimation:{duration:2000,easing:"easeOutExpo"}},caption:{rotation:{x:0,y:0,z:2},reverseAnimation:{duration:200,easing:"easeOutQuad"}},overlay:{translation:{x:10,y:-10,z:0},rotation:{x:0,y:0,z:2},reverseAnimation:{duration:2000,easing:"easeOutExpo"}},shine:{translation:{x:100,y:100,z:0},reverseAnimation:{duration:200,easing:"easeOutQuad"}}}},{movement:{imgWrapper:{rotation:{x:-5,y:10,z:0},reverseAnimation:{duration:900,easing:"easeOutCubic"}},caption:{translation:{x:30,y:30,z:[0,40]},rotation:{x:[0,15],y:0,z:0},reverseAnimation:{duration:1200,easing:"easeOutExpo"}},overlay:{translation:{x:10,y:10,z:[0,20]},reverseAnimation:{duration:1000,easing:"easeOutExpo"}},shine:{translation:{x:100,y:100,z:0},reverseAnimation:{duration:900,easing:"easeOutCubic"}}}},{movement:{imgWrapper:{rotation:{x:-5,y:10,z:0},reverseAnimation:{duration:50,easing:"easeOutQuad"}},caption:{translation:{x:20,y:20,z:0},reverseAnimation:{duration:200,easing:"easeOutQuad"}},overlay:{translation:{x:5,y:-5,z:0},rotation:{x:0,y:0,z:6},reverseAnimation:{duration:1000,easing:"easeOutQuad"}},shine:{translation:{x:50,y:50,z:0},reverseAnimation:{duration:50,easing:"easeOutQuad"}}}},{movement:{imgWrapper:{translation:{x:0,y:-8,z:0},rotation:{x:3,y:3,z:0},reverseAnimation:{duration:1200,easing:"easeOutExpo"}},lines:{translation:{x:15,y:15,z:[0,15]},reverseAnimation:{duration:1200,easing:"easeOutExpo"}},overlay:{translation:{x:0,y:8,z:0},reverseAnimation:{duration:600,easing:"easeOutExpo"}},caption:{translation:{x:10,y:-15,z:0},reverseAnimation:{duration:900,easing:"easeOutExpo"}},shine:{translation:{x:50,y:50,z:0},reverseAnimation:{duration:1200,easing:"easeOutExpo"}}}},{movement:{lines:{translation:{x:-5,y:5,z:0},reverseAnimation:{duration:1000,easing:"easeOutExpo"}},caption:{translation:{x:15,y:15,z:0},rotation:{x:0,y:0,z:3},reverseAnimation:{duration:1500,easing:"easeOutElastic",elasticity:700}},overlay:{translation:{x:15,y:-15,z:0},reverseAnimation:{duration:500,easing:"easeOutExpo"}},shine:{translation:{x:50,y:50,z:0},reverseAnimation:{duration:500,easing:"easeOutExpo"}}}},{movement:{imgWrapper:{translation:{x:5,y:5,z:0},reverseAnimation:{duration:800,easing:"easeOutQuart"}},caption:{translation:{x:10,y:10,z:[0,50]},reverseAnimation:{duration:1000,easing:"easeOutQuart"}},shine:{translation:{x:50,y:50,z:0},reverseAnimation:{duration:800,easing:"easeOutQuart"}}}},{movement:{lines:{translation:{x:40,y:40,z:0},reverseAnimation:{duration:1500,easing:"easeOutElastic"}},caption:{translation:{x:20,y:20,z:0},rotation:{x:0,y:0,z:-5},reverseAnimation:{duration:1000,easing:"easeOutExpo"}},overlay:{translation:{x:-30,y:-30,z:0},rotation:{x:0,y:0,z:3},reverseAnimation:{duration:750,easing:"easeOutExpo"}},shine:{translation:{x:100,y:100,z:0},reverseAnimation:{duration:750,easing:"easeOutExpo"}}}}];function init(){var a=0;[].slice.call(document.querySelectorAll(".tilter")).forEach(function(b,c){a=c%2===0?a+1:a;new TiltFx(b,perspectiveSettings[a-1])})}init();
    $('.fun-fact-section, #footer-widgets').ripples('show');
    $(window).on('load', function() {
        // Sticky Nav
       $(".sticky-nav").sticky({ topSpacing: 0 });
    });

    //Set Animation Timing
        var animationDelay = 2500;
        initHeadline();
        //Init Headline
        function initHeadline() {
          //initialise headline animation
          animateHeadline($('.av-heading'));
        }
        //Single Letters
        function singleLetters($words) {
          $words.each(function(){
            var word = $(this),
              letters = word.text().split(''),
              selected = word.hasClass('is-show');
              var newLetters = letters.join('');
              word.html(newLetters).css('opacity', 1);
          });
        }
        //Animate Headline
        function animateHeadline($headlines) {
          var duration = animationDelay;
          $headlines.each(function(){
            var headline = $(this);
            //trigger animation
            setTimeout(function(){ hideWord( headline.find('.is-show').eq(0) ) }, duration);
          });
        }
        //Hide Word
        function hideWord($word) {
          var nextWord = takeNext($word);
            switchWord($word, nextWord);
            setTimeout(function(){ hideWord(nextWord) }, animationDelay);
        }
        //Hide Letter
        function hideLetter($letter, $word, $bool, $duration) {
          $letter.removeClass('in').addClass('out');
          
          if(!$letter.is(':last-child')) {
            setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);  
          } else if($bool) { 
            setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
          }

          if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
            var nextWord = takeNext($word);
            switchWord($word, nextWord);
          } 
        }
        //Take Next
        function takeNext($word) {
          return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
        }
        //Take Prev
        function takePrev($word) {
          return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
        }
        //Switch Word
        function switchWord($oldWord, $newWord) {
          $oldWord.removeClass('is-show').addClass('is-hide');
          $newWord.removeClass('is-hide').addClass('is-show');
        }
});

jQuery(document).ready(function(e) {
    e(".mobile-menu-active").meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: ".mobile-menu"
    }), e(".mobile-menu .meanmenu-reveal").on("click", function(n) {
        if (e(this).hasClass("meanclose")) {
            n.preventDefault();
            var t, a, c, o = document.querySelector(".mean-bar");
            let e = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])',
                m = document.querySelector(".meanclose"),
                u = o.querySelectorAll(e),
                r = u[u.length - 1];
            if (!o) return !1;
            for (a = 0, c = (t = o.getElementsByTagName("a")).length; a < c; a++) t[a].addEventListener("focus", l, !0), t[a].addEventListener("blur", l, !0);

            function l() {
                for (var e = this; - 1 === e.className.indexOf("mean-bar");) "li" === e.tagName.toLowerCase() && (-1 !== e.className.indexOf("focus") ? e.className = e.className.replace("focus", "") : e.className += " focus"), e = e.parentElement
            }
            document.addEventListener("keydown", function(e) {
                ("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey ? document.activeElement === m && (r.focus(), e.preventDefault()) : document.activeElement === r && (m.focus(), e.preventDefault()))
            })
        } else {
            e(".meanmenu-reveal:not(.meanclose)").focus();
        }
    })
});



jQuery(document).ready(function($) {

    var $container = $('#services'),
        $articles = $container.children('div'),
        timeout;

    $articles.on('mouseenter', function (event) {

        var $article = $(this);
        clearTimeout(timeout);
        timeout = setTimeout(function () {

            if ($article.hasClass('active')) return false;
            $articles.not($article.removeClass('blur').addClass('active'))
                .removeClass('active')
                .addClass('blur');
        }, 65);

    });

    $container.on('mouseleave', function (event) {
        clearTimeout(timeout);
        $articles.removeClass('active blur');

    });

});