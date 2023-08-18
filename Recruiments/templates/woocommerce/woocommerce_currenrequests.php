

    	    <div id="progress">
              <div id="progress-bar"></div>
              <?php if($request_atatus!= 0): ?>
                  <ul id="progress-num">
                    <?php foreach($statuses as $order => $status): ?>
                        <li class="step <?php if((int)$request_atatus > $order){ echo "active"; } ?>"><?php echo $status ?></li>
                    <?php endforeach ?>
                  </ul>
              <?php else: echo   ( pll_current_language() == 'en' ) ? 'Order Cancelled' : 'تم الغاء الطلب'; ?>
              <?php endif ?>
            </div>
                <br>
            <div style = "margin-top:40px !important;">
			<?php
    			echo $recruiment_image; 
			?>
			</div>
            <div style = "margin-top:20px !important;">
            <span style="font-size:22px;color:green;">
			<?php
    			echo $request_meta['comment'][0]; 
			?>
			</span>
			</div>
				<div id="chattytrigger" class="customerOption col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
				      <input type="radio" class="btn-check" name="staff_name" id="option2" value="002" required="">
				      <label class="btn btn-outline" for="option2">
				          <img src = "https://al-rhal.com/wp-content/uploads/2023/05/avater2.webp"></img>
				          <span><?php if(pll_current_language() == 'ar'){echo $employee['arabic_name'][0];}else{echo $employee['english_name'][0];} ?></span>
				      </label>
				      <br />
			      <!-- <i>Click the customer support person button to chat with the customer representative.</i> -->
				  </div>
				  <div class="chatty-cta">
				  	<a class="ha-creative-btn ha-stl--estilo ha-eft--slide-right" href="tel:<?php echo $employee['number'][0];  ?>" rel="nofollow"><?php if(pll_current_language() == 'ar'){echo "هاتف";}else{echo "phone";} ?></a>
				  	<a class="ha-creative-btn ha-stl--estilo ha-eft--slide-right" target="_blank" href="https://wa.me/<?php echo $employee['whatsapp'][0]; ?>" rel="nofollow"><?php if(pll_current_language() == 'ar'){echo "واتس اب";}else{echo "whatsapp";} ?></a>
				  </div>
	              <div style='margin-bottom: 20px !important;margin-top: 20px !important;'>
                    <a style='background: #1c284e; color: white; padding: 7px 12px; border-radius: 5px; text-decoration: none;' href='?remove_request=<?php echo $request_id; ?>'>
                        <?php 
                            if(pll_current_language() == 'en')
                            {
                                echo "Cancle Request";
                            }
                            else
                            {
                                echo "ألغاء الحجز";
                            }
                        
                        ?>
        		    </a>
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
				
				#progress {
                  position: relative;
                  margin-bottom: 30px;   
                }
                
                #progress-bar {
                  position: absolute;
                  background: lightseagreen;
                  height: 5px;
                  width: 0%;
                  top: 50%;
                  left: 0;
                }
                
                #progress-num {
                  margin: 0;
                  padding: 0;
                  list-style: none;
                  display: flex;
                  justify-content: space-between;
                }
                
                #progress-num::before {
                  content: "";
                  background-color: lightgray;
                  position: absolute;
                  top: 50%;
                  left: 0;
                  height: 5px;
                  width: 100%;
                  z-index: -1;
                }
                
                #progress-num .step {
                  border: 3px solid lightgray;
                  border-radius: 100%;
                  width: 25px;
                  height: 25px;
                  line-height: 25px;
                  text-align: center;
                  background-color: #fff;
                  font-family: sans-serif;
                  font-size: 14px;    
                  position: relative;
                  z-index: 1;
                  padding-top:5%;
                }
                
                #progress-num .step.active {
                  border-color: lightseagreen;
                  background-color: lightseagreen;
                }
                
                
			</style>
