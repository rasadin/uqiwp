;(function($) {

    // Scroll to Top
    // $(window).scroll(function(){
    //     if($(this).scrollTop()>100){
    //         $("#up").fadeIn();
    //     }else{
    //         $("#up").fadeOut();
    //     }
    // });

    $("#up").click(function(){
        $("html, body").animate({scrollTop:0},1000)
    })
    

    $(document).ready(function() {
        $('input[type="radio"]').on('click', function() {
            // Remove active class from all radio button labels
            $('input[type="radio"]').parent().removeClass('active');
    
            // Add active class to the clicked radio button's label
            if ($(this).is(':checked')) {
                $(this).parent().addClass('active');
            }
        });
    });
    


})(jQuery);