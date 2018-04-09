$(document).ready(function(){
   // Carousel generation
    var mainCarousel = $('#main-carousel');
    mainCarousel.owlCarousel({
        nav: true,
        loop:false,
        dots: false,
        margin:10,
        responsiveClass:true,
        navText: ["<span><i class=\"fa fa-arrow-left\" aria-hidden=\"true\"></i></span>","<span><i class=\"fa fa-arrow-right\" aria-hidden=\"true\"></i></span>"],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:4,
            }
        }
    })
});