<?php

class shortcodes
{

    public $recriments;
    public $employee;
    public $handlerequest;
    
    
    public function __construct($recriments,$employee,$handlerequest)
    {
        $this->recruiments = $recriments;
        $this->employee = $employee;
        $this->handlerequest = $handlerequest;
        
        add_shortcode("RecruimentFirstStep",[$this,'RecruimentFirstStep']);
        
        add_shortcode("EmployeeCustomersRequests" , [$this,"EmployeeCustomersRequests"]);
        
        add_shortcode("EmployeeAdminsRequests" , [$this,"EmployeeAdminsRequests"]);

        
        add_shortcode('test1',[$this,'test1']);
        add_shortcode('test2',[$this,'test2']);
    }
	
	public function getRecruimentById()
	{
        $args = array(
            'role'    => 'employee',
            'orderby' => 'user_nicename',
            'order'   => 'ASC'
        );
        $users = get_users( $args );
        echo "<pre>";
        echo (the_field('whatsapp', 'user_12'));
        echo "</pre>";
    }

    public function test1()
    {
        $postid = get_the_ID();
        echo 'https://al-rhal.com/select-service-cv/?post_id='.(string)$postid;
    }
    
    public function test2()
    {
        $postid = get_the_ID();
        echo "https://al-rhal.com/en/select-service-cv-2/?post_id=".(string)$postid ;
    }
    
    
    public function RecruimentFirstStep()
    {
        $this->handlerequest->FirstStep();
    }
    
    public function EmployeeCustomersRequests ()
    {
        if(!is_user_logged_in())
        {
            wp_login_form(array(
                
                'redirect' => 'https://al-rhal.com/en/employeecontrol/',    
                
            ));
            return;
        }
        if(wp_get_current_user()->roles[0] != 'employee')
        {
            return;
        }
        
                            $statuses = [];
                            $statuses[0] = "الغاء الطلب";
                            $statuses[1] = "تم استلام الطلب";
                            $statuses[2] = "يتم المراجعة";
                            $statuses[3] = "قيد التنفيذ";
                            $statuses[4] = "تم التعاقد";
                            $statuses[5] = "تم استلام الموظف";
        if(isset($_GET['request_id']))
        {
            $request = get_post($_GET['request_id'],array('post_type' => 'customer-requests'));
            if(!$request)
            {
                return;
            }
            
            $data = get_post_meta($request->ID);
            
            if($data['support-id'][0] != get_current_user_id())
            {
                return;
            }
            
            $user = get_user_by('id',$data['customer-id'][0]);
            
            $recruiment = get_post_meta($data['recruiment-id'][0]);
            $recruiment_image = wp_get_attachment_image(explode(',',$recruiment['gallery'][0])[0], array('700', '500'));

            
            
            ob_start();
            include  WP_PLUGIN_DIR  . '/custom plugin/templates/employeesinglerequest.php';
            $out1 = ob_get_clean();
            echo $out1;
            
        }
        else
        {
            $requests = get_posts(array('post_type' => 'customer-requests'));
            ob_start();
            include  WP_PLUGIN_DIR  . '/custom plugin/templates/employeeallrequest.php';
            $out1 = ob_get_clean();
            echo $out1;
        }
    }
    
    public function EmployeeAdminsRequests()
    {
        if(!is_user_logged_in())
        {
            wp_login_form(array(
                
                'redirect' => 'https://al-rhal.com/en/employeeadminrequests',    
                
            ));
            return;
        }
        if(wp_get_current_user()->roles[0] != 'employeeadmin')
        {
            return;
        }
        
        $statuses = ['cancelled' , 'Request Deliverd' , 'Under Revision' , 'Processing' , 'Done' , 'Deliverd'];
        
        if(isset($_GET['request_id']))
        {
            $request = get_post($_GET['request_id'],array('post_type' => 'customer-requests'));
            if(!$request)
            {
                return;
            }
            
            $data = get_post_meta($request->ID);

            
            $user = get_user_by('id',$data['customer-id'][0]);
            
            $recruiment = get_post_meta($data['recruiment-id'][0]);
            $recruiment_image = wp_get_attachment_image(explode(',',$recruiment['gallery'][0])[0], array('700', '500'));

            $employee = $this->employee->get_employee_byid($data['support-id'][0]);
            
            ob_start();
            include  WP_PLUGIN_DIR  . '/custom plugin/templates/adminemployeesinglerequest.php';
            $out1 = ob_get_clean();
            echo $out1;
            
        }
        elseif(isset($_GET['user_id'])&&isset($_GET['user_id']) && $_GET['action'] == 'edit' )
        {
            $user = get_user_by('id',$_GET['user_id']);
            if($user)
            {
                $user = get_user_meta($user->ID);
                ob_start();
                include  WP_PLUGIN_DIR  . '/custom plugin/templates/adminemployeealledit.php';
                $out1 = ob_get_clean();
                echo $out1;
                
            }
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'addnewuser' )
        {
                $user = get_user_meta($user->ID);
                ob_start();
                include  WP_PLUGIN_DIR  . '/custom plugin/templates/adminemployeealladd.php';
                $out1 = ob_get_clean();
                echo $out1;
        }
        else
        {
            $requests = get_posts(array('post_type' => 'customer-requests'));
            $users  = get_users(array(
                    'role' => 'employee',
                ));
            ob_start();
            include  WP_PLUGIN_DIR  . '/custom plugin/templates/adminemployeeallrequest.php';
            $out1 = ob_get_clean();
            echo $out1;
            // echo '<pre>';
            // foreach($users as $user){
                
            //     $user_meta = get_user_meta($user->ID);
            //     var_dump($_GET);    
            // }
            
            // echo '</pre>';
        }
        
    }

}