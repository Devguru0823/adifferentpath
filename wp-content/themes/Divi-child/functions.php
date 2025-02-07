<?php 

// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);

add_filter('body_class','my_class_names');

function my_class_names($classes) {



	if(!is_page_template( 'page-template-fullpage.php')){

		if (! ( is_user_logged_in() )) {

			$classes[] = 'logged-out';

		}

	}	



return $classes;

}



/* Load parent Divi styles. */  		





function onepage_enqueue_assets() {



    wp_enqueue_style( 'onepage-style', get_template_directory_uri() . '/style.css' , array(), '0.0.1' ); 



	wp_enqueue_style( 'animate-style', get_stylesheet_directory_uri() . '/css/animate.css' );  


	wp_enqueue_script('jquery');
		



/*

4/5/2017

remove css in all blank & full page

*/

  if ( is_page_template( 'page-template-blank.php' ) || is_page_template( 'page-template-blank-fullpage.php' ) || is_page_template( 'page-template-fullpage.php' )|| is_page_template( 'page-template-fullpage-hidden-footer.php' ) ) 

{ 

//if($sld=='off')

//{

		wp_enqueue_style( 'fullPage-style', get_stylesheet_directory_uri() . '/css/jquery.fullPage.css' );

	//	}  

		wp_enqueue_style( 'fullPagecss-style', get_stylesheet_directory_uri() . '/css/fullpage.css' );  

		



	

	

	

	if(!$_GET['et_fb']){ //phpcs:ignore

	  wp_enqueue_script( 'fullPage-js',get_stylesheet_directory_uri() . '/js/jquery.fullPage.js', array(), '0.0.9',true);

	  wp_enqueue_script( 'fullPage-custom-js',get_stylesheet_directory_uri() . '/js/fullPage.js', array(), '0.0.1',true);

	} 

	



}





		wp_enqueue_script( 'easings-js',get_stylesheet_directory_uri() . '/js/jquery.easings.min.js', array(), '0.0.1',true);



	wp_enqueue_script( 'wowmins',get_stylesheet_directory_uri() . '/js/wow.min.js', array(), '0.0.1',true);







			//wp_enqueue_script( 'scrolloverflow-js',get_stylesheet_directory_uri() . '/js/scrolloverflow.min.js', array(), '0.0.1',true);





   wp_enqueue_script( 'wowinitjs',get_stylesheet_directory_uri() . '/js/wowinit.js', array(), '0.0.1',true);





	$menucolor = !empty(get_option('menucolor')) ? get_option('menucolor') : '#2ea3f2';



	$onhovermenucss = ".et_slide_in_menu_container {background-color: ".$menucolor.";}#et_search_icon:hover, .mobile_menu_bar::before, .mobile_menu_bar::after, .et-social-icon a:hover, .comment-reply-link, .form-submit input, .entry-summary p.price ins, .woocommerce div.product span.price, .woocommerce-page div.product span.price, .woocommerce #content div.product span.price, .woocommerce-page #content div.product span.price, .woocommerce div.product p.price, .woocommerce-page div.product p.price, .woocommerce #content div.product p.price, .woocommerce-page #content div.product p.price, .woocommerce .star-rating span::before, .woocommerce-page .star-rating span::before, .woocommerce a.button.alt, .woocommerce-page a.button.alt, .woocommerce button.button.alt, .woocommerce-page button.button.alt, .woocommerce input.button.alt, .woocommerce-page input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce-page #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button, .woocommerce a.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce a.button:hover, .woocommerce-page a.button:hover, .woocommerce button.button, .woocommerce-page button.button:hover, .woocommerce input.button:hover, .woocommerce-page input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce-page #respond input#submit:hover, .woocommerce #content input.button:hover, .wp-pagenavi span.current, .wp-pagenavi a:hover, .et_password_protected_form .et_submit_button, .nav-single a, .posted_in a, #top-menu li.current-menu-ancestor > a, #top-menu li.current-menu-item > a, .bottom-nav li.current-menu-item > a, .footer-widget h4{color: ".$menucolor." !important;}";



	$bullet = !empty(get_option('bullet')) ? get_option('bullet') : '#fffff';

	$closebutton = !empty(get_option('closebutton')) ? get_option('closebutton') : '#fffff';



	$onhovermenucss .= "#fp-nav ul li a span, .fp-slidesNav ul li a span{background: ".$bullet." none repeat scroll 0 0 !important;border: 3px solid ".$bullet." !important;}";



	$onhovermenucss .= ".et_header_style_fullscreen .et_slide_in_menu_container span.mobile_menu_bar.et_toggle_fullscreen_menu:before{color: ".$closebutton."!important;}";

	



	wp_add_inline_style( 'onepage-style', $onhovermenucss );







}



add_action( 'wp_enqueue_scripts', 'onepage_enqueue_assets' );











add_action( 'admin_enqueue_scripts', 'onepagescroll_enqueue_scripts' );







/**



 * Enqueue dashboard scripts



 *



 * @return void



 */



function onepagescroll_enqueue_scripts() {



	if ( isset( $_GET['page'] ) && ( 'et_divi_onepage' === $_GET['page'] || ( 'et_divi_onepage_options' === $_GET['page'] ) || ( 'et_divi_onepage_options_help' === $_GET['page'] )) ) { //phpcs:ignore



		//$dependencies = array( 'jquery' );

		wp_enqueue_script('jquery');

		wp_enqueue_style( 'onepagescroll-admin_style',  get_stylesheet_directory_uri() . '/css/admin-style.css', array(), '0.0.1' );



		wp_enqueue_script( 'onepagescrolladmin',  get_stylesheet_directory_uri() . '/js/admin-custom.js', array(), '0.0.1',true);



		



                wp_enqueue_style( 'spectrum-admin_style',  get_stylesheet_directory_uri() . '/css/spectrum.css', array(), '0.0.1' );



		wp_enqueue_script( 'spectrumadmin',  get_stylesheet_directory_uri() . '/js/spectrum.js', array(), '0.0.1',false);



		wp_enqueue_script( 'spectrumjsadmin',  get_stylesheet_directory_uri() . '/js/custom.js', array(), '0.0.1',true);



	}



}



















/* Make OnePageScroll Menu in Admin Menu Item*/



add_action('admin_menu','onepage_scroll_setting',30);







/*



* Setup Admin menu item



*/



function onepage_scroll_setting(){



	add_submenu_page('et_divi_options','Child Theme Settings', 'Child Theme Settings', 'switch_themes', 'et_divi_onepage_options', 'onepage_render_settings' );



}







function onepage_render_settings(){











$is_settings_updated = false;



$nonce   = "onepagescroll_nonce";



if ( isset( $_POST[ $nonce ] ) ) {







	$is_settings_updated         = true;



	$is_settings_updated_success = false;



	// Verify nonce and user permission



	if ( wp_verify_nonce(  sanitize_text_field( $_POST[ $nonce ] ), $nonce ) && current_user_can( 'switch_themes' ) ) {

			//$onhovermenu	= $_POST['onhovermenu'];

			$scrollingposition =   isset( $_POST['scrollingposition'] ) ?  sanitize_text_field( wp_unslash( $_POST['scrollingposition'] ) ) : '' ;

			$menucolor		   = isset( $_POST['menucolor'] ) ? sanitize_text_field(  wp_unslash(  $_POST['menucolor'] ) ) : '';

            $slidingeffect	=  isset( $_POST['slidingeffect'] ) ? sanitize_text_field(  wp_unslash( $_POST['slidingeffect'] ) ) : '';

			$mediaquery	    =  isset( $_POST['mediaquery'] ) ? sanitize_text_field(  wp_unslash( $_POST['mediaquery'] ) ) : '';

			//$slidingdots	= $_POST['slidingdots'];

		//	$hidefooter		 = $_POST['hidefooter'];

			$bullet		 =  isset( $_POST['bullet'] ) ? sanitize_text_field(  wp_unslash( $_POST['bullet'] ) ) : '';

			$closebutton     = isset( $_POST['closebutton'] ) ? sanitize_text_field(  wp_unslash( $_POST['closebutton'] ) ) : '';


			update_option('bullet',$bullet);

            update_option('closebutton',$closebutton);

		    //update_option('onhovermenu',$onhovermenu);

			update_option('menucolor',$menucolor);

			update_option('slidingeffect',$slidingeffect);

            update_option('mediaquery',$mediaquery);

            update_option('scrollingposition',$scrollingposition);

		//	update_option('slidingdots',$slidingdots);

		//	update_option('hidefooter',$hidefooter);


			$is_settings_updated_message = __( 'Settings have been saved.' );

			$is_settings_updated_success = true;


	} else {



			$is_settings_updated_message = __( 'Error authenticating request. Please try again.' );



	}







}



 $toggle_options = array( 'off', 'on' );





?>



<div id="wrapper" class="et-divi-gradient-form">



				<div id="panel-wrap">



					<?php if ( $is_settings_updated ) { ?>



						<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible <?php echo $is_settings_updated_success ? '' : 'error' ?>" style="margin: 0 0 25px 0;">



							<p>



								<strong><?php echo esc_html( $is_settings_updated_message ); ?></strong>



							</p>



							<button type="button" class="notice-dismiss">



								<span class="screen-reader-text"><?php echo esc_html( 'Dismiss this notice.' ); ?></span>



							</button>



						</div>



					<?php } ?>



					<div id="epanel-wrapper">



							<div id="epanel">



								<div id="epanel-content-wrap">



									<div id="epanel-content">



									



										<div id="epanel-header">



											<h1 id="epanel-title">Child Theme Settings</h1>



										</div><!-- #wrap-general.content-div -->



											<form action="" method="POST" class="et-divi-onepagescroll-form">



										<div id="wrap-general" class="content-div diviscroll">



										



										<div id="tabs">







											<ul class="idTabs">



													<li class="ui-tabs ui-tabs-active">	<a href="#general-1"><?php echo esc_html( 'Settings' ); ?></a></li>



													



										    </ul><!-- .idTabs -->



											<div id="general-1" class="tab-content">



													



											



												 

												   <div class="epanel-box" data-type="toggle">



														     



															 <div class="box-title">



																<h3> Remove scroll effect in small screen sizes</h3>



																<div class="box-descr"></div><!-- .box-descr -->																                                                              </div>



																



															  <div class="box-content">



																	<?php 



																	 printf('<select name="%1$s" id="%1$s" data-preview-prefix="%2$s" data-preview-height="%3$s" class="et-pb-toggle-select">',esc_attr( 'slidingeffect' ),esc_attr( '200' ),esc_attr( '200' ));







																	  $selected_value_hidefooter = !empty(get_option('slidingeffect')) ? get_option('slidingeffect') : 'off';



																	  foreach ( $toggle_options as $option_value ) {



																					printf(



																						'<option value="%1$s" %2$s>%1$s</option>',



																						esc_attr( $option_value ),



																						"{$option_value}" === $selected_value_hidefooter ? 'selected="selected"' : ''



																					);



																		}







																		echo '</select>';







																		echo sprintf(



																					'<div class="et_pb_yes_no_button et_pb_%1$s_state" style="max-width: 195px;">



																						<span class="et_pb_value_text et_pb_on_value">%2$s</span>



																						<span class="et_pb_button_slider"></span>



																						<span class="et_pb_value_text et_pb_off_value">%3$s</span>



																					</div>',



																					esc_attr( $selected_value_hidefooter ),



																					esc_html__( 'On' ),



																					esc_html__( 'Off' )



																		);







																		echo '</select>';



																	?>



												   			   </div>	



															   



										         </div><!-- .epanel-box -->

										         

										         

										         <?php

			//if(get_option('hidefooter');)

$sld=get_option('slidingeffect');

$md=get_option('mediaquery');



			?>									 

<div class="epanel-box" data-type="toggle" style="padding-left:15px">



														     



															 <div class="box-title">



																<h3>MAXIMUM SMALL SCREEN SIZE IN PX (DEFAULT: 768)</h3>



																<div class="box-descr"></div><!-- .box-descr -->																                                                              </div>



																



															  <div class="box-content">



															  <?php



															  	$mediaquery = !empty(get_option('mediaquery')) ? get_option('mediaquery') : '768';



															  ?>



																  <input id="mediaquery" name="mediaquery" value="<?php echo esc_attr( $mediaquery ) ;?>"  type="number">



																



												   			   </div>	



															   



										         </div>

                                                 

                                                 <div class="epanel-box" data-type="toggle">



														     



															 <div class="box-title">



																<h3> Scroll Navigation Dots Position</h3>



																<div class="box-descr"></div><!-- .box-descr -->																                                                              </div>



																



															  <div class="box-content">



																	<?php 



																	 printf('<select name="%1$s" id="%1$s" data-preview-prefix="%2$s" data-preview-height="%3$s" class="et-pb-toggle-select">',esc_attr( 'scrollingposition' ),esc_attr( '200' ),esc_attr( '200' ));







																	  $selected_position = !empty(get_option('scrollingposition')) ? get_option('scrollingposition') : 'off';



																	  foreach ( $toggle_options as $position_value ) {



																					printf(



																						'<option value="%1$s" %2$s>%1$s</option>',



																						esc_attr( $position_value ),



																						"{$position_value}" === $selected_position ? 'selected="selected"' : ''



																					);



																		}







																		echo '</select>';







																		echo sprintf(



																					'<div class="et_pb_yes_no_button et_pb_%1$s_state" style="max-width: 195px;">



																						<span class="et_pb_value_text et_pb_on_value">%2$s</span>



																						<span class="et_pb_button_slider"></span>



																						<span class="et_pb_value_text et_pb_off_value">%3$s</span>



																					</div>',



																					esc_attr( $selected_position ),



																					esc_html__( 'Right' ),



																					esc_html__( 'Left' )



																		);







																		echo '</select>';



																	?>



												   			   </div>	



															   



										         </div><!-- .epanel-box -->

                                                 											


												 



												 <div class="epanel-box" data-type="toggle">



														     



															 <div class="box-title">



																<h3>dot navigation color</h3>



																<div class="box-descr"></div><!-- .box-descr -->																                                                              </div>



																



															  <div class="box-content">



															  <?php



															  	$bullet = !empty(get_option('bullet')) ? get_option('bullet') : '#fffff';



															  ?>



																Choose Color : <input id="bullet" name="bullet" value="<?php echo esc_attr( $bullet ) ;?>"  type="text">



																<?php if($bullet != ''):?>



																	<script> var colorString4 ="<?php echo esc_html( $bullet ) ;?>";jQuery("#bullet").spectrum("set", colorString4);



																	</script> 



																<?php endif;?>



												   			   </div>	



															   



										         </div>




												 <div id="epanel-bottom" class="scollbottom">



														<?php



															// Print nonce



															wp_nonce_field( $nonce, $nonce );



							



															// Print submit button



															printf(



																'<button class="save-button" name="save" id="epanel-save">%s</button>',



																esc_attr( 'Save Settings' )



															);



														?>



											     </div><!-- #epanel-bottom -->



												



												



												<div class="epanel-box" data-type="toggle">


												<h3><b>Simple 2 step process to turn any page into a scroll page</b></h3></br>
												
												<p>1. Add any kind of section modules to the page. Select the Row setup – One Row per Section only! Design the page using Divi modules. Once your page is done add ‘fullpagesection’ CSS class to each main section module in the page. </p>
												<p>2. Assign a scroll template to the page: Hit Edit Page from admin bar. Find Page attributes box in the side bar. Under template selection drop down menu chose a Scroll page template to be used.</p></br></br>

												<b>Note: Please remove all the default widgets under Footer Area 1.</b></br></br>

															 <div class="box-title">



																<h3>Element animations </h3>



																<div class="box-descr"></div><!-- .box-descr -->																                                                              </div>



																



															  <div class="">



															  This child theme is fully compatible with <a href="https://github.com/matthieua/WOW" target="_blank">WOW animation </a> effects. These create CSS animations as you scroll down a page. You can animate any Divi module with these effects.



																		 <br/> <br/>		



																



																



																<b>Note :



If you want to use default Divi builder animations them first remove WOW animation classes assigned in modules.<br/><br/>







Works best with Rows and Modules.</b><br/><br/>



																<b>How to use WOW Animation </b> <br/> <br/>



																Add class "wow" with below classes into Row or Section or a Module. <br/><br/> 		



																Example : "wow bounce" , "wow swing" , "wow bounceInDown" etc..<br/><br/>



																



																



																	bounce<br/>flash<br/>pulse<br/>rubberBand<br/>shake<br/>headShake<br/>



																	swing<br/>tada<br/>wobble<br/>jello<br/>bounceIn<br/>bounceInDown<br/>



																	bounceInLeft<br/>bounceInRight<br/>bounceInUp<br/>bounceOut<br/>



																	bounceOutDown<br/>bounceOutLeft<br/>bounceOutRight<br/>bounceOutUp<br/>



																	fadeIn<br/>fadeInDown<br/>fadeInDownBig<br/>fadeInLeft<br/>fadeInLeftBig<br/>



																	fadeInRight<br/>fadeInRightBig<br/>fadeInUp<br/>fadeInUpBig<br/>



																	fadeOut<br/>fadeOutDown<br/>fadeOutDownBig<br/>fadeOutLeft<br/>



																	fadeOutLeftBig<br/>fadeOutRight<br/>fadeOutRightBig<br/>fadeOutUp<br/>



																	fadeOutUpBig<br/>flipInX<br/>flipInY<br/>flipOutX<br/>flipOutY<br/>



																	lightSpeedIn<br/>lightSpeedOut<br/>rotateIn<br/>rotateInDownLeft<br/>rotateInDownRight<br/>



																	rotateInUpLeft<br/>rotateInUpRight<br/>rotateOut<br/>rotateOutDownLeft<br/>rotateOutDownRight<br/>



																	rotateOutUpLeft<br/>rotateOutUpRight<br/>hinge<br/>rollIn<br/>rollOut<br/>zoomIn<br/>zoomInDown<br/>



																	zoomInLeft<br/>zoomInRight<br/>zoomInUp<br/>zoomOut<br/>zoomOutDown<br/>zoomOutLeft<br/>



																	zoomOutRight<br/>zoomOutUp<br/>slideInDown<br/>slideInLeft<br/>slideInRight<br/>slideInUp<br/>



																	slideOutDown<br/>slideOutLeft<br/>slideOutRight<br/>slideOutUp<br/><br/>



																	



																		 



																	  



																	  All of these CSS classes are working in custom HTML code, Text Module and Code Module<br/>







Advanced settings you can use with WOW Animation classes,<br/>



-	data-wow-duration: Change the animation duration<br/>



-	data-wow-delay: Delay before the animation starts<br/>



-	data-wow-offset: Distance to start the animation (related to the browser bottom)<br/>



data-wow-iteration: Number of times the animation is repeated<br/><br/>



 <b>Source:</b> 



																	  <a href="https://github.com/matthieua/WOW" target="_blank">  https://github.com/matthieua/WOW</a>



																	  <br/>







																</p>



												   			   </div>	



															   



										         </div>



												 



											</div>



										 </div>







										</div><!-- #epanel-header -->



										



									</form>	



									</div><!-- #epanel-content -->



								</div><!-- #epanel-content-wrap -->



							</div><!-- #epanel -->



						</div><!-- #epanel-wrapper -->



				</div><!-- #panel-wrap -->



</div>







<?php







}



















function ocdi_import_files() {



    return array(



		array(



            'import_file_name'           => 'Demo Import Divi Scroll All',



            'import_file_url'            => 'http://divibuilderaddons.com/DemoImportDiviScroll/all.xml',



            'import_widget_file_url'     => '',



            'import_customizer_file_url' => '',



            'import_preview_image_url'   => 'http://divibuilderaddons.com/DemoImportDiviScroll/screenshot.jpg',



            'import_notice'              => '',



        ),



     



    );



}



add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );







function ocdi_after_import_setup() {



   



    // Assign front page and posts page (blog page).



    $front_page_id = get_page_by_title( 'Home' );







    update_option( 'show_on_front', 'page' );



    update_option( 'page_on_front', $front_page_id->ID );



	



	$main_menu  = get_term_by( 'name', 'Main Menu', 'nav_menu' );



	set_theme_mod( 'nav_menu_locations', array(



		'primary-menu'   	=>  $main_menu->term_id



		));







}



add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );



wp_delete_post(1);







require get_stylesheet_directory() .'/class-tgm-plugin-activation.php';







/**



 * TGM Init Class



 */



add_action( 'tgmpa_register', 'onepage_register_required_plugins' );



/**



 * Register the required plugins for this theme.



 *



 * In this example, we register two plugins - one included with the TGMPA library



 * and one from the .org repo.



 *



 * The variable passed to tgmpa_register_plugins() should be an array of plugin



 * arrays.



 *



 * This function is hooked into tgmpa_init, which is fired within the



 * TGM_Plugin_Activation class constructor.



 */



function onepage_register_required_plugins() {



	/**



	 * Array of plugin arrays. Required keys are name and slug.



	 * If the source is NOT from the .org repo, then source is also required.



	 */



	$plugins = array(



		array(



			'name'     => esc_html__('One Click Demo Import','divi'),



			'slug'     => 'one-click-demo-import',



			'required' => true,



		));



		



	/**



	 * Array of configuration settings. Amend each line as needed.



	 * If you want the default strings to be available under your own theme domain,



	 * leave the strings uncommented.



	 * Some of the strings are added into a sprintf, so see the comments at the



	 * end of each line for what each argument will be.



	 */



	$config = array(



		'default_path' => '',



		// Default absolute path to pre-packaged plugins.



		'menu'         => 'tgmpa-install-plugins',



		// Menu slug.



		'has_notices'  => true,



		// Show admin notices or not.



		'dismissable'  => true,



		// If false, a user cannot dismiss the nag message.



		'dismiss_msg'  => '',



		// If 'dismissable' is false, this message will be output at top of nag.



		'is_automatic' => false,



		// Automatically activate plugins after installation or not.



		'message'      => '',



		// Message to output right before the plugins table.



		'strings'      => array(



			'page_title'                      => esc_html__( 'Install Required Plugins', 'divi' ),



			'menu_title'                      => esc_html__( 'Install Plugins', 'divi' ),



			'installing'                      => esc_html__( 'Installing Plugin: %s', 'divi' ),



			// %s = plugin name.



			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'divi' ),



			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'divi'  ),



			// %1$s = plugin name(s).



			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'divi'  ),



			// %1$s = plugin name(s).



			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'divi'  ),



			// %1$s = plugin name(s).



			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'divi'  ),



			// %1$s = plugin name(s).



			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'divi'  ),



			// %1$s = plugin name(s).



			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'divi'  ),



			// %1$s = plugin name(s).



			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'divi'  ),



			// %1$s = plugin name(s).



			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' , 'divi' ),



			// %1$s = plugin name(s).



			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'divi'  ),



			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'divi'  ),



			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'divi' ),



			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'divi' ),



			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'divi' ),



			// %s = dashboard link.



			'nag_type'                        => 'updated'



			// Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.



		)



	);



	tgmpa( $plugins, $config );



}





add_action('wp_ajax_removeslide', 'removeslide');



add_action('wp_ajax_nopriv_removeslide', 'removeslide');







function removeslide()

{

$width= isset( $_REQUEST["width"] ) ? $_REQUEST["width"] : ''; //phpcs:ignore

$sld=get_option('slidingeffect');

$position = get_option('scrollingposition');

if($position == 'off'){

  $position = 'left';

} else {

  $position = 'right';

}



if($sld=='on')

{

$md=get_option('mediaquery');



$res1[]=array("sliding"=>'on',"mediaquery"=>$md, "position"=>$position);

}

else

{

$res1[]=array("sliding"=>'off', "position"=>$position);

}

echo wp_json_encode($res1);

die();

}







?>