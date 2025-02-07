<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;?>

<?php 


/*
3/5/2017
remove footer in all blank & full page
*/


  if ( is_page_template( 'page-template-blank.php' ) || is_page_template( 'page-template-blank-fullpage.php' ) || is_page_template( 'page-template-fullpage-hidden-footer.php' )  ) : ?>





</div> <!-- #et-main-area -->


</div> <!-- #page-container -->





<?php wp_footer();?>


</body>


</html>


<?php return; endif; ?>

<?php

if ( ! is_page_template( 'page-template-blank.php' ) || !is_page_template( 'page-template-blank-fullpage.php' ) || !is_page_template( 'page-template-fullpage.php' ) ) : ?>





			<footer id="main-footer">


				<?php get_sidebar( 'footer' ); ?>








		<?php


			if ( has_nav_menu( 'footer-menu' ) ) : ?>





				<div id="et-footer-nav">


					<div class="container">


						<?php


							wp_nav_menu( array(


								'theme_location' => 'footer-menu',


								'depth'          => '1',


								'menu_class'     => 'bottom-nav',


								'container'      => '',


								'fallback_cb'    => '',


							) );


						?>


					</div>


				</div> <!-- #et-footer-nav -->





			<?php endif; ?>





				


					<div id="footer-bottom">


					<div class="container clearfix">


				<?php


					if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {


						get_template_part( 'includes/social_icons', 'footer' );


					}


					


					echo et_get_footer_credits(); //phpcs:ignore


				?>





						


					</div>	<!-- .container -->


				</div>


				


				


			</footer> <!-- #main-footer -->


		</div> <!-- #et-main-area -->





<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>








<?php echo '<input type="hidden" name="siteurl" id="siteurl" value="'.get_site_url().'"/>'; //phpcs:ignore


?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>

</body>

</html>