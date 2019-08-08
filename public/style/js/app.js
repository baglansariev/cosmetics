$(function(){

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
    })
});