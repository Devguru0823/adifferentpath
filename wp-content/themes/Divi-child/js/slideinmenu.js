jQuery(document).ready(function ($) {
  if($(window).width() > 768 && !navigator.userAgent.match(/(iPod|iPhone|iPad)/) ){
    var menu = $('.et_slide_in_menu_container')
    var timeout = 0;
    var hovering = false;
    menu.hide();

    $('#et-top-navigation')
        .on("mouseenter", function () {
        hovering = true;
        // Open the menu
		$('.et_slide_in_menu_container').css('right','0px');
		$('.et_slide_in_menu_container').addClass('et_pb_slide_menu_opened');
		$('body').addClass('et_pb_slide_menu_active');

        $('.et_slide_in_menu_container')
            .stop(true, true)
            .slideDown(400);
        if (timeout > 0) {
            clearTimeout(timeout);
        }
    })
        .on("mouseleave", function () {
        resetHover();
    });

    $(".et_slide_in_menu_container")
        .on("mouseenter", function () {
        // reset flag
        hovering = true;
        // reset timeout
        startTimeout();
    })
        .on("mouseleave", function () {
        // The timeout is needed incase you go back to the main menu
        resetHover();
    });

    function startTimeout() {
        // This method gives you 1 second to get your mouse to the sub-menu
        timeout = setTimeout(function () {
            closeMenu();
        }, 200);
    };

    function closeMenu() {
        // Only close if not hovering
        if (!hovering) {
            $('.et_slide_in_menu_container').stop(true, true).slideUp(400);
        }
    };

    function resetHover() {
		
		//$('.et_slide_in_menu_container').css('right','-320px');
		$('.et_slide_in_menu_container').removeClass('et_pb_slide_menu_opened');
		$('body').removeClass('et_pb_slide_menu_active');
        // Allow the menu to close if the flag isn't set by another event
        hovering = false;
        // Set the timeout
        startTimeout();
    };
	
  }
});