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
});