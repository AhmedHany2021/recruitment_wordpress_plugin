<?php

class recruiments
{
    
    public function __construct()
    {
        
    }
    
    public function getREcruimentById($id)
    {
        $recriment = get_post($id);
        return $recriment;
    }
    
    public function getREcruimentMetaById($recriment)
    {
         $meta = get_post_meta($recriment->ID);
         return $meta;
    }
    
    public function get_status($id)
    {
        $user = $this->getREcruimentById($id);
        $meta = $this->getREcruimentMetaById($user);
        return $meta['available'][0];
    }
    
    
    public function toogle_user_status($id)
    {
        $status = $this->get_status($id);
        if($status == 'true')
        {
            update_post_meta($id,'available','false');
        }
        else
        {
            update_post_meta($id,'available','true');
        }
    }
    
}