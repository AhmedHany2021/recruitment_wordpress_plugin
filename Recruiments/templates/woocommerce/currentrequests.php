	<div class=" userHeader">
	    <div class="userInfo">
	        <div class="d-flex flex-wrap align-items-center">
	            <img src="https://al-rhal.com/wp-content/uploads/2023/05/avatar.webp" alt="الرحال" class="me-3">
	            <div class="userName" style="<?php echo ( pll_current_language() == 'en' ) ? 'margin-left: 15px;' : 'margin-right: 15px;'; ?>">
	                <h3><?php echo get_userdata( get_current_user_id() )->data->user_login; ?></h3>
	                <div> <?php echo get_user_meta( get_current_user_id(), 'billing_phone', true ); ?> </div>
	            </div>
	        </div>
	        <div class="control" style="<?php echo ( pll_current_language() == 'en' ) ? 'right: 0;' : 'left:0;'; ?>">
	            <a href="<?php echo wp_logout_url( home_url() ); ?>" title="تسجبل الخروج ">
	                <i class="fas fa-power-off"></i>
	            </a>
	        </div>
	    </div>
	</div>
	<style>
		.userHeader {
		    margin: 20px 0px;
		    background-color: #ffffff;
		    color: #1c284e;
		    border-radius: 20px;
		    box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.1882352941);
		    padding: 20px;
		}

		.userHeader .userInfo {
		    position: relative;
		    margin: 0px 10px;
		}

		.align-items-center {
		    align-items: center!important;
		}
		.flex-wrap {
		    flex-wrap: wrap!important;
		}
		.d-flex {
		    display: flex!important;
		}
		.userHeader .userInfo img {
		    width: 100px;
		    height: 100px;
		    -o-object-fit: cover;
		    object-fit: cover;
		    -o-object-position: top;
		    object-position: top;
		    border-radius: 100%;
		    border: 3px solid #f5f4de;
		}

		.userHeader .userInfo .userName h3 {
		    font-weight: bold;
		    margin-bottom: 10px;
		}

		.userHeader .userInfo .control {
		    position: absolute;
		    top: 5px;
		}

		.userHeader .userInfo .control i {
		    font-size: 22px;
		    color: #ff0000;
		    cursor: pointer;
		}
		.newOrder {
		    width: 100%;
		    padding: 20px;
		    display: flex;
		    align-items: center;
		    border-radius: 8px;
		    border: 1px solid #1c284e;
		    background: #1c284e;
		    color: #f5f4de;
		    margin-bottom: 20px;
			text-decoration: none !important;
		}
		.newOrder strong {
		    color: white;
		}
		i.fas.fa-file {
		    color: white;
		    font-size: 20px;
		}
		.woocommerce {
		    margin: 70px 0 !important;
		}
		</style>


	  <style>
    	  	.chatty-cta a {
    		    display: inline-block;
    		    overflow: hidden;
    		    outline: 0;
    		    background: var(--ha-ctv-btn-bg-clr);
    		    color: var(--ha-ctv-btn-txt-clr);
    		    text-transform: uppercase;
    		    letter-spacing: 1px;
    		    font-weight: 700;
    		    text-decoration: none;
    		--ha-ctv-btn-txt-clr: #FFFFFF;
    		    --ha-ctv-btn-bg-clr: var(
    		    --e-global-color-primary );
    		    --ha-ctv-btn-border-clr: var(
    		    --e-global-color-primary );
    		    --ha-ctv-btn-txt-hvr-clr: var(
    		    --e-global-color-primary );
    		    --ha-ctv-btn-bg-hvr-clr: #FFFFFFFC;
    		    --ha-ctv-btn-border-hvr-clr: var(
    		    --e-global-color-primary );
    		    padding: 8px 15px;
    		    border-radius: 23px;
    		    margin-top: -30px;
    		}
    		.chatty-cta a:hover {
    			color: white !important;
    		}
    	  	.customerOption {
    		    padding: 5px;
    		}
    
    		.customerOption.col-md-4.wow.fadeInUp {
    		    width: 33.33333333%;
    		    height: 150px;
    		    margin: 20px 0;
    		    background-color: rgba(0, 161, 154, 0.1254901961);
    		}
    		.btn-check {
    		    position: absolute;
    		    clip: rect(0,0,0,0);
    		    pointer-events: none;
    		}
    		.customerOption .btn {
    		    padding: 8px 16px;
    		    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1882352941);
    		    box-shadow: none;
    		    background-color: #ffffff;
    		    display: flex;
    		    flex-direction: column;
    		    height: 100%;
    		    position: relative;
    		    transition: all 0.3s ease-in-out;
    		    border: 2px solid transparent;
    		    border-radius: 16px;
    		    padding: 25px;
    		    cursor: pointer;
    		}
    		.customerOption .btn img {
    		    height: 50px;
    		    min-width: 50px;
    		    margin: 0 auto 20px;
    		    -o-object-fit: contain;
    		    object-fit: contain;
    		}
    		.customerOption .btn span {
    		    text-transform: capitalize;
    		    font-size: 18px !important;
    		    text-align: center;
    		    font-weight: 600;
    		}
    		.counter-time {
    			margin-top: 40px;
    		}
    		
    		.woocommerce-MyAccount-content p
    		{
    		    /* display: none; */
    		}
		</style>
