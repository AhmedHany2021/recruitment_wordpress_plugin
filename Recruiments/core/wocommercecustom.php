<?php 

class wocommercecustom
{
    public $recruiments;
    public $employee;
    public $handlerequest;
    

    public function __construct($recruiments,$employee,$handlerequest)
    {
        
        $this->recruiments =$recruiments;
        $this->employee = $employee;
        $this->handlerequest = $handlerequest;
        
        add_action( 'woocommerce_register_form_start',[$this,'woocommerce_register_form_start']);
        add_action( 'woocommerce_edit_account_form_start',[$this,'woocommerce_edit_account_form']);
        add_action( 'woocommerce_save_account_details',[$this,'woocommerce_save_account_details']);
        add_action( 'woocommerce_created_customer',[$this,'woocommerce_created_customer']);
        
        
        add_filter('woocommerce_account_menu_items', [$this , 'unsetAllTabs'],999);
        add_filter('woocommerce_account_menu_items', [$this ,'addNewCustomerTabs']);
        add_action( 'init',[$this,'register_new_item_endpoint']);
        add_filter( 'query_vars', [$this , 'new_item_query_vars'] );
        add_action( 'woocommerce_account_content',[$this,'currentRequestTabContent']);
        add_action( 'woocommerce_account_currentrequest_endpoint', [$this , 'add_new_item_currentrequest'] );
        
    
    
    
        add_action( 'wp_head',[$this,'addMainStyle']);
        
    }
    


    
    public function unsetAllTabs($items)
    {
    	
        unset($items['orders']);
        unset($items['downloads']);
        unset($items['edit-address']);
        unset($items['payment-methods']);
        return $items;
        
    }
    
    public function addNewCustomerTabs( $items ) {
    	$new = array( 
    
    		'currentrequest' => ( pll_current_language() == 'en' )
    		? 'Recriments Requests' : 'طلبات التوظيف',
    		
    // 		'requests' => ( pll_current_language() == 'en' )
    // 		? 'Requests History' : 'سجل الطلبيات',
    		
    		
    // 		'compliments' => ( pll_current_language() == 'en' )
    // 		? 'Complaints' : 'الشكاوى',
    		
    	);
        return array_slice($items, 0, 1, true) + $new + array_slice($items, 1, NULL, true);
    }
    
    public function currentRequestTabContent()
    {
        ob_start();
        include  WP_PLUGIN_DIR  . '/custom plugin/templates/woocommerce/currentrequests.php';
        $out1 = ob_get_clean();
        echo $out1;
    }
    
    public function addMainStyle()
    {
        ob_start();
        include  WP_PLUGIN_DIR  . '/custom plugin/templates/woocommerce/woocommerceMainStyle.php';
        $out1 = ob_get_clean();
        echo $out1;
    }
    
    public function woocommerce_register_form_start()
    {
        ob_start();
        include  WP_PLUGIN_DIR  . '/custom plugin/templates/woocommerce/woocommerce_register_form_start.php';
        $out1 = ob_get_clean();
        echo $out1;
    }
    
    public function woocommerce_edit_account_form()
    {
        $user = wp_get_current_user();
        ob_start();
        include  WP_PLUGIN_DIR  . '/custom plugin/templates/woocommerce/woocommerce_edit_account_form.php';
        $out1 = ob_get_clean();
        echo $out1;
    }
    
    public function woocommerce_created_customer($customer_id)
    {
        if ( isset( $_POST['billing_phone'] ) ) {
            add_user_meta( $customer_id, 'phone', sanitize_text_field( $_POST['billing_phone'] ) );
            update_user_meta( $customer_id, 'account_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    	}
    	if ( isset( $_POST['billing_first_name'] ) ) {
    		add_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
    		update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
    	}
    	if ( isset( $_POST['billing_last_name'] ) ) {
    		add_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
    		update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
    	}
    }
    
    public function woocommerce_save_account_details($user_id)
    {
        if ( isset( $_POST['account_phone'] ) ) {
            add_user_meta( $user_id, 'account_phone', sanitize_text_field( $_POST['account_phone'] ) );
            update_user_meta( $user_id, 'account_phone', sanitize_text_field( $_POST['account_phone'] ) );
    	}
        
    }

    public function register_new_item_endpoint() {
    	add_rewrite_endpoint( 'currentrequest', EP_ROOT | EP_PAGES );
    }
    
    public function new_item_query_vars( $vars ) {
    
    	$vars[] = 'currentrequest';
    	return $vars;
    }
    
    public function add_new_item_currentrequest()
    {
        if(wp_get_current_user()->roles[0] == 'administrator' || wp_get_current_user()->roles[0] =='customer' || true)
        {
                $request_id = get_user_meta( get_current_user_id(),'request_customer',true);
                if($request_id != null && $request_id != '')
                {
                     $request = get_post($request_id);
                     if($request)
                     {
                        $request_meta = get_post_meta($request_id);
                        $request_atatus = $request_meta['status'][0];
                        
                        $recruiment = $this->recruiments->getREcruimentById($request_meta["recruiment-id"][0]);
                        $recruiment_id = $request_meta["recruiment-id"][0];
                        $recruiment_image = wp_get_attachment_image(explode(',',get_post_meta($recruiment_id)['gallery'][0])[0], array('700', '500'));
                        
                        $employee_id = $request_meta["support-id"][0];
                        $employee = $this->employee->get_employee_byid($employee_id);
                        if(pll_current_language() == 'en'){
                            $statuses = ['Request Deliverd' , 'Under Revision' , 'Processing' , 'Done' , 'Deliverd'];
                        } 
                        else{
                            $statuses = [];
                            $statuses[0] = "تم استلام الطلب";
                            $statuses[1] = "يتم المراجعة";
                            $statuses[2] = "قيد التنفيذ";
                            $statuses[3] = "تم التعاقد";
                            $statuses[4] = "تم استلام الموظف";
        
                        }
                        
                        
                        // echo "<pre>";
                        // var_dump(wp_get_current_user()->roles[0]);
                        // echo "</pre>";
                        
                        ob_start();
                        include  WP_PLUGIN_DIR  . '/custom plugin/templates/woocommerce/woocommerce_currenrequests.php';
                        $out1 = ob_get_clean();
                        echo $out1;
                        
                        
                     }
    
                }
                else
                {
                        ob_start();
                        include  WP_PLUGIN_DIR  . '/custom plugin/templates/woocommerce/woocommerce_currenrequests_no.php';
                        $out1 = ob_get_clean();
                        echo $out1;                }
                }
    }
}