jQuery(function ($) {

  /* -----------------------------------------
    rtl
    ----------------------------------------- */
  var isRTL = $('html').attr('dir') === 'rtl';
  
  /* -----------------------------------------
    Main Slider
    ----------------------------------------- */
  $(".banner-style-3 .banner-slider").slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    infinite: true,
    rtl: isRTL,
    arrows: true,
    prevArrow: "<button class='fa fa-chevron-left'</button>",
    nextArrow: "<button class='fa fa-chevron-right'</button>",
    responsive: [
    {
      breakpoint: 1500,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      },
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      },
    },
    {
      breakpoint: 700,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots:true
      },
    },
    ],
  });

});
