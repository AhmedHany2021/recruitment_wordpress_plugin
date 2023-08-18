<?php
require_once(ABSPATH.'wp-admin/includes/user.php');

class pluginini
{
    public $recriments;
    public $employee;
    public $handlerequest;
    
    public function __construct($recriments,$employee,$handlerequest)
    {
        $this->recriments = $recriments;
        $this->employee = $employee;
        $this->handlerequest = $handlerequest;

        add_action( 'init',[$this,'requestLasttStep']);
        add_action( 'init',[$this,'requestRemove']);
        add_action( 'init',[$this,'requestempstatus']);
        add_action( 'init',[$this,'addrequestcomment']);
        add_action( 'init',[$this,'editEmployee']);
        add_action( 'init',[$this,'addEmployee']);
        add_action( 'init',[$this,'deleteuser']);
        add_action( 'init',[$this,'updateuserpassword']);
        add_action('wp_footer' , [$this ,'addreservedaction']);
        
        add_action('check_admin_referer', [$this , 'logout_without_confirm'], 10, 2);
        add_action( 'wp_login_failed', [$this , 'my_front_end_login_fail'] );  

    }
    
    public function requestLasttStep()
    {
        if((isset( $_GET['post_id'] ) && !empty( sanitize_text_field( $_GET['post_id'] ) ) ) && (isset( $_POST['employee'] ) && !empty( sanitize_text_field( $_POST['employee'] ) ) )){
            $str = ( pll_current_language() == 'en' ) ? '/my-account/' : '/حسابي/';
            $str = $str  . 'currentrequest/';
            $requests = get_posts(array('post_type' => 'customer-requests'));
            foreach($requests as $request)
            {
                $request_meta = get_post_meta($request->ID);
                if($request_meta['customer-id'][0] == get_current_user_id() && $request_meta['status'][0] != 5)
                {
                    $str = $str . '?resrved=true';
                    wp_redirect( home_url( $str ) );
        			exit();
                }
            }
            $this->handlerequest-> addRequest(get_current_user_id(),$_POST['employee'], $_GET['post_id']);
            
            wp_redirect( home_url( $str ) );
			exit();
            
        }
	    
    }
    
    public function requestRemove()
    {
         if(isset( $_GET['remove_request'] ) && !empty( sanitize_text_field( $_GET['remove_request'] ) ) ){
            
            $this->handlerequest->remove_request($_GET['remove_request']);
            
            $str = ( pll_current_language() == 'en' ) ? '/my-account/' : '/حسابي';
            wp_redirect( home_url( $str ) );
			exit();
             
         }
    }
    
    public function requestempstatus()
    {
            if(isset( $_POST['request_id'] ) && isset( $_POST['status'] ) ){
                if($_POST['status'] != 0  && $_POST['status'] != 5){
                    update_post_meta($_POST['request_id'] ,'status',$_POST['status']);
                    wp_redirect( home_url('/en/employeecontrol/?request_id='.$_POST['request_id'] ) );
    		        exit();
                }
                elseif($_POST['status'] == 5 )
                {
                    update_post_meta($_POST['request_id'] ,'status',$_POST['status']);
                    $this->handlerequest->deliver_request($_POST['request_id']);
                    wp_redirect( home_url('/en/employeecontrol/'));
    		        exit();
                }
                else
                {
                    $this->handlerequest->remove_request($_POST['request_id']);
                    wp_redirect( home_url('/en/employeecontrol/'));
    		        exit();
                }
             
            }
    }
    
    public function addrequestcomment()
    {
            if(isset( $_POST['request_id'] ) && isset( $_POST['comment'] ) ){
                update_post_meta($_POST['request_id'] ,'comment',$_POST['comment']);
            }
    }
    
    public function logout_without_confirm($action, $result)
    {
        /**
         * Allow logout without confirmation
         */
        if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
            $redirect_to = 'https://al-rhal.com/';
            $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));
            header("Location: $location");
            die;
        }
    }
    public function my_front_end_login_fail( $username ) {
      $referrer = $_SERVER['HTTP_REFERER'];  
      if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
          wp_redirect( $referrer . '?login=failed' );  
          exit;
      }
    }
    
    public function editEmployee()
    {
        if(isset($_POST['user_id']) && isset($_POST['en-name']) && isset($_POST['ar-name']) && isset($_POST['phone']) && isset($_POST['whatsapp']))
        {
            $user = get_user_by('id',$_GET['user_id']);
            if($user)
            {
                // update_field('english_name', $_POST['en-name'], 'user_'.['user_id'].'');
                update_user_meta($_GET['user_id'],'english_name',$_POST['en-name']);
                update_user_meta($_GET['user_id'],'arabic_name',$_POST['ar-name']);
                update_user_meta($_GET['user_id'],'number',$_POST['phone']);
                update_user_meta($_GET['user_id'],'whatsapp',$_POST['whatsapp']);
            }
        }
    }
    
    public function updateuserpassword()
    {
        if(isset($_POST['user_id']) && isset($_POST['new_pass']))
        {
            wp_set_password( $_POST['new_pass'], $_POST['user_id'] );
        }
    }
    
    public function addEmployee()
    {
        if(isset($_POST['action']) && $_POST['action'] == 'addemp' && isset($_POST['en-name']) && isset($_POST['ar-name']) && isset($_POST['phone']) && isset($_POST['whatsapp'])  && isset($_POST['login-name']) && isset($_POST['email'])  && isset($_POST['password']))
        {
            $user_data = array(
                    
                    'user_pass' => $_POST['password'],
                    'user_login' => $_POST['login-name'],
                    'user_email' => $_POST['email'],
                    'role' => 'employee',
                    
                );
            $user = wp_insert_user($user_data);
            if($user)
            {
                update_user_meta($user,'english_name',$_POST['en-name']);
                update_user_meta($user,'arabic_name',$_POST['ar-name']);
                update_user_meta($user,'number',$_POST['phone']);
                update_user_meta($user,'whatsapp',$_POST['whatsapp']);
                wp_redirect( home_url('/en/employeeadminrequests/?user_id=' .$user.'&action=edit'));
    	        exit();
            }
        }
        else
        {
        //     wp_redirect( home_url('/en/employeeadminrequests/?error=dfsg'));
	       // exit();
        }
    }
    
    public function deleteuser()
    {
        if(isset($_GET['user_id']) && isset($_GET['action']) && $_GET['action'] == 'delete')
        {
            $user = get_user_by('id',$_GET['user_id']);
            if($user)
            {
                $del_bool = wp_delete_user($_GET['user_id'],1); 
            //     if($del_bool)
            //     {
            //         wp_redirect( home_url('/en/employeeadminrequests/?status=sucessdelete'));
            //         exit();
            //     }
            //     else
            //     {
            //         wp_redirect( home_url('/en/employeeadminrequests/?status=faildelete'));
            //         exit();
            //     }
            }
        }
        
    }
    
    public function addreservedaction()
    {
        if(isset($_GET['resrved']) && $_GET['resrved'] == 'true'){
            if(pll_current_language() == 'en')
            {
            echo "
			<script>
    		    alert('You Can\'t reserve two applications at the same time');
			</script>
            
            ";                
            }
            else
            {
            echo "
			<script>
    		    alert('لا يمكن تسجيل اكثر من طلب');
			</script>
            
            ";                
            }

        }
    }

    
}