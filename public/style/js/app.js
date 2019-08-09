$(function(){
    $('.phone_mask').mask('+7(999)999-99-99', {autoclear: false});
    $('.slider').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    sliderTextEffect();
    $('.item').on('mouseup', function (e) {
            sliderTextEffect();
    });
    $('.item').on('touchmove', function () {
        sliderTextEffect();
    });
    $('.owl-prev').click(function () {
        sliderTextEffect();
    });
    $('.owl-next').click(function () {
        sliderTextEffect();
    });

    function sliderTextEffect(){
        setTimeout(function () {
            $('.owl-item.active').find('.slide-text').children().each(function(){
                $(this).fadeIn();
                $(this).css('filter', 'blur(0px)');
            });
        }, 500);
    }
    
    $('.service').on('mouseover', function () {
        $(this).find('.service-img-cover').fadeIn();
    });
    $('.service').on('mouseleave', function () {
        $(this).find('.service-img-cover').fadeOut();
    });

    $('.mobile-burger').click(function () {
        $('.mobile-menu').animate({
            right: '0',
        }, 500);
    });

    $('.mobile-menu-close').click(function () {
        $('.mobile-menu').animate({
            right: '-100%',
        }, 500);
    });

    $('.course-1 .course-button').click(function () {
        $(this).parents().find('.course-1 .course-desc').animate({
            left: '0',
        }, 500);
    });

    $('.course-2 .course-button').click(function () {
        $('.course-2 .course-desc').css('background-color', 'rgba(251, 168, 127, 1)');
        $(this).parents().find('.course-2 .course-desc').animate({
            left: '0',
        }, 500);
    });

    $('.course-3 .course-button').click(function () {
        $(this).parents().find('.course-3 .course-desc').animate({
            left: '0',
        }, 500);
    });

    $('.course-desc-close').click(function () {
        $('.course-desc').animate({
            left: '-100%',
        }, 500);
    });

    $('#appointment').click(function(){
        $('.contact-form').fadeIn();
    });
    $('.about-us-button').click(function () {
        $('.contact-form').fadeIn();
    });

    $('.modal-feedback-close').click(function(){
        $('.contact-form').fadeOut();
    });

    $('.contact-form').click(function(e){
        if(e.target == $('.contact-form')[0]){
            $('.contact-form').fadeOut();
        }
    });

    $('.desktop-menu ul li a').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $([document.documentElement, document.body]).animate({
            scrollTop: $(id).offset().top
        }, 1000);
    });

    $('.mobile-menu ul li a').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $('.mobile-menu').animate({
            right: '-100%',
        }, 500);

        $([document.documentElement, document.body]).animate({
            scrollTop: $(id).offset().top
        }, 1000);
    });

    $('.go-to-top').click(function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $('#main').offset().top
        }, 1000);
    });
});