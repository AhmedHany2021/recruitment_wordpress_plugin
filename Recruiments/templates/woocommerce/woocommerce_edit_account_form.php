	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="account_phone"><?php echo   ( pll_current_language() == 'en' ) ? 'phone' : 'رقم الهاتف';  ?>&nbsp;<span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_phone" id="account_display_name"  placeholder = "enter your phone"   value="<?php echo esc_attr( $user->account_phone ); ?>"/> 
	</p>

