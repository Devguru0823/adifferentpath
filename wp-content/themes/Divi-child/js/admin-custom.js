jQuery(function ($) {

    
	
	var $form  = $('.et-divi-onepagescroll-form');

	// Loop each option
	$form.find('.epanel-box').each(function(){
		var $field = $(this),
			type = $field.attr('data-type'),
			$input;
		switch( type ) {
			
			
			case "toggle":
				var $input       = $field.find( 'select' ),
					$toggle      = $field.find( '.et_pb_yes_no_button' );

				$toggle.on( 'click', '.et_pb_value_text, .et_pb_button_slider', function(){
					var input_value  = $input.find('option:selected').val() === 'on' ? 'on' : 'off',
						toggle_state = input_value === 'on',
						toggle_new_state = toggle_state ? false : true,
						input_new_value  = toggle_new_state ? 'on' : 'off',
						toggle_state_class = 'et_pb_' + input_new_value + '_state';

					$input.val( input_new_value );
					$toggle.removeClass('et_pb_on_state et_pb_off_state').addClass( toggle_state_class );
				});

				break;
		}
	});
	
	

 });