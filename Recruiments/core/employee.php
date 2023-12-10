<?php 

class employee
{
    
    public function __construct()
    {
        
    }
    /*
     * get all employees
      */

    public function get_all_employee()
    {
        $args = array(
            'role'    => 'employee',
            'orderby' => 'user_nicename',
            'order'   => 'ASC'
        );
        $users = get_users( $args );
        return $users;
    }
    
    public function get_employee_byid($id)
    {
        $user = get_user_meta($id);
        return $user;
    }
    
}