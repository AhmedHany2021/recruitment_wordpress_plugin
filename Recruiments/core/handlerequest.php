<?php

class handlerequest
{
    public $recriments;
    public $employee;
     
    public function __construct($recriments,$employee)
    {
        $this->recruiments = $recriments;
        $this->employee = $employee;

    }
    
    public function FirstStep()
    {
    	if( ! isset( $_GET['post_id'] ) && empty( sanitize_text_field( $_GET['post_id'] ) ) ) {
	    	echo "Please select a CV first.";
	    	return;
    	}
    	$employess = $this->employee->get_all_employee();
        ob_start();
        include  WP_PLUGIN_DIR  . '/custom plugin/templates/requestfirststep.php';
        $out1 = ob_get_clean();
        echo $out1;
    	
    	
    }
    
    public function addRequest($c_id,$s_id,$r_id)
    {
        $customer = get_userdata(get_current_user_id());
        $employee = get_userdata($s_id);

    	$args = array(
		'post_title' 	=>  $employee->user_login . ' - ' .$customer->user_login,
		'post_status' 	=> 'publish',
		'post_type' 	=> 'customer-requests',
		'meta_input' 	=> array(
			'support-id' 	=> $s_id,
			'time'		=> current_time('timestamp'),
			'recruiment-id'		=> $r_id,
			'customer-id' => $c_id,
			'code' => 500,
			'status' => 1,
		    )
    	);
    	
    	$request_id  = wp_insert_post($args);
    	add_user_meta( get_current_user_id(), 'request_customer', $request_id );
    	update_user_meta( get_current_user_id(), 'request_customer', $request_id );
    	update_post_meta($r_id,'available','false');
    	
    	$r_lang = pll_get_post_language($r_id);
    	if($r_lang == 'en')
    	{
            $r_invert_id = pll_get_post( $r_id, 'ar' );   
            update_post_meta($r_invert_id,'available','false');
    	}
    	else 
    	{
            $r_invert_id = pll_get_post( $r_id, 'en' );   
            update_post_meta($r_invert_id,'available','false');
    	}
    	
    }
    
    public function remove_request($id)
    {
        $request = get_post($id);
        $request_meta = get_post_meta($id);
        delete_user_meta($request_meta["customer-id"][0], 'request_customer');
        update_post_meta($request_meta["recruiment-id"][0],'available','true');
        
    	$r_lang = pll_get_post_language($request_meta["recruiment-id"][0]);
    	if($r_lang == 'en')
    	{
            $r_invert_id = pll_get_post( $request_meta["recruiment-id"][0], 'ar' );   
            update_post_meta($r_invert_id,'available','true');
    	}
    	else 
    	{
            $r_invert_id = pll_get_post( $request_meta["recruiment-id"][0], 'en' );   
            update_post_meta($r_invert_id,'available','true');
    	}
    	
        wp_delete_post( $id);
        

    }
    
    public function deliver_request($id)
    {
        $request = get_post($id);
        $request_meta = get_post_meta($id);
        delete_user_meta($request_meta["customer-id"][0], 'request_customer');

    }
    
}