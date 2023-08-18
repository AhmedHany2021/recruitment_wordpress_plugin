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

				<?php 
    				
    				if(pll_current_language() == 'en')
    				{
    				    echo "<h2>choose one of our customer support</h2>";
    				}
    				
    				else
    				{
    				    echo "<h2>اختر ممثل خدمة العملاء</h2>";
    				}
				
				?>
				<?php 
				
    				if(pll_current_language() == 'en')
    				{
    				    echo "<p>Please select a customer service representative to continue completing the contract and complete the recruitment process</p>";
    				}
    				
    				else
    				{
    				    echo "<h2>يرجى اختيار احد ممثلي خدمة العملاء للاستمرار في استكمال العقد وإتمام عملية التوظيف</h2>";
    				}
				
				?>
			</div>

			<div class="choose-cr">
			    <?php foreach($employess as $employee):  ?>
					<div class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
						<input type="radio" class="btn-check" name="employee" id="<?php echo $employee->id ?>" value="<?php echo $employee->id ?>" required="">
						  <label class="btn btn-outline" for="<?php echo $employee->id ?>">
							  <img src="https://al-rhal.com/wp-content/uploads/2023/05/avater2.webp"></img>
				    	        <span>
				    	            <?php
	                				if(pll_current_language() == 'en')
                    				{
                                        echo get_user_meta($employee->id)['english_name'][0];                 				}
                    				
                    				else
                    				{
                    				    echo get_user_meta($employee->id)['arabic_name'][0];
                    				}
                    				?>
			                    </span>
						  </label>
				  	</div>
			  	<?php endforeach ?>
			</div>
		  	<div class="cta-btn">
		  		<button type="submit" name="submit-service" class="defaultBtn"> 
      	            <?php
    				if(pll_current_language() == 'en')
    				{
                        echo "complete";                 				}
    				
    				else
    				{
    				    echo "أتمام";
    				}
    				?>
		  		</button>
		  	</div>

	  </form>
