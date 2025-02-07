jQuery(document).ready(function($) {
jQuery('body').find('.fullpagesection').each(function(){  
   if($(this).css('display')=='none') {
       $(this).remove();
   }
    });
   
    var width = jQuery(window).width();
    var siteurl = jQuery("#siteurl").val();
    var ajaxurl = siteurl + "/wp-admin/admin-ajax.php";
    jQuery.ajax({

        type: "POST",

        url: ajaxurl,

        data: {

            action: "removeslide",

            width: width

        },

        success: function(data) {





            var json = $.parseJSON(data);

            

            //console.log(width,json[0]['mediaquery']);

            var sliding = json[0].sliding;

            var position = json[0].position;

            var md = json[0].mediaquery;



            /*console.log(json[0].position);*/



            console.log(sliding, md, position);



            if (sliding == 'on') {

                

                if ($(window).width() > md) { 

                    //console.log("yes");

                    jQuery("body,html").removeClass("newbd");

                    $('#fullpage').fullpage({

                        navigation: true,

                        navigationPosition: position,

                        sectionSelector: '.fullpagesection',

                        controlArrows: true,

                        fixedElements: '#main-footer',

                        //easing: 'swing',

                        easingcss3: 'cubic-bezier(0.175, 0.885, 0.320, 1.275)',

                        scrollBar: true

                    });



                    //adding the action to the button

                    $(document).on('click', '#fullpage .fullpagesection .scroll-down', function() {

                        $.fn.fullpage.moveSectionDown();

                    });

                 } else {

                    jQuery("body,html").addClass("newbd");

                    /* $('#fullpage').fullpage({

		sectionSelector: '.fullpagesection',

        navigation: true,

        fixedElements: '#main-header, #main-footer',

		onLeave: function(index, nextIndex, direction){

			

			 if(nextIndex === $('#fullpage .fullpagesection').length){

				 $('#main-footer').css('display','block');



			 }else{

				  $('#main-footer').css('display','none');

			 }

			 

			},

       

		});

	*/

                }

            } else /*  IF SLIDING IS OFF */ {



                

                if ($(window).width() > 1000) {

                    

                   /* $('#fullpage').fullpage({

                        navigation: true,

                        navigationPosition: 'right',

                        sectionSelector: '.fullpagesection',

                        controlArrows: true,

                        fixedElements: '#main-header, #main-footer',

                        //easing: 'swing',

                        easingcss3: 'cubic-bezier(0.175, 0.885, 0.320, 1.275)',

                        scrollBar: true

                    });*/



                    $('#fullpage').fullpage({

                        navigation: true,

                        navigationPosition: 'right',

                        sectionSelector: '.fullpagesection',

                        controlArrows: true,

                        fixedElements: '#main-footer',

                        //easing: 'swing',

                        easingcss3: 'cubic-bezier(0.175, 0.885, 0.320, 1.275)',

                        scrollBar: true

                    });



                    //adding the action to the button

                    $(document).on('click', '#fullpage .fullpagesection .scroll-down', function() {

                        $.fn.fullpage.moveSectionDown();

                    });

                } else {



                    $('#fullpage').fullpage({

                        sectionSelector: '.fullpagesection',

                        navigation: true,

                        onLeave: function(index, nextIndex, direction) {



                            if (nextIndex === $('#fullpage .fullpagesection').length) {

                                $('#main-footer').css('display', 'block');



                            } else {

                                $('#main-footer').css('display', 'none');

                            }



                        },



                    });



                }

            }



        },

        error: function(errorThrown) {

            console.log(errorThrown);

        }

    });









});