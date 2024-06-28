(function ($) {
  "use strict";

  var clientSlider = function ($scope, $) {
    $(document).ready(function () {
      $("#owl-carousel").owlCarousel({
        loop: true,
        // margin: 30,
        dots: false,
        nav: false,
        mouseDrag: true,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
          },
          480: {
            items: 1,
          },
          769: {
            items: 1,
          },
          1024: {
            items: 1,
          },

          1366: {
            items: 1,
          },
        },
      });
      var owl = $(".owl-carousel");
      // Custom Button
      $(".customNextBtn").click(function () {
        owl.trigger("next.owl.carousel");
      });
      $(".customPreviousBtn").click(function () {
        owl.trigger("prev.owl.carousel");
      });
    });
  };




 

  

  $(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/client-slider.default",
      clientSlider
    );
  });
})(jQuery);
