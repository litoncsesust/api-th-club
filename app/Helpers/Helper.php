<?php 

namespace App\Helpers;

class Helper
{
    public static function name(string $type)
    {
        if($type == 3){
            $user_type = 'Super Admin'; 
        }elseif($type == 2){
            $user_type = 'Customer'; 
        }else{
            $user_type = 'Club Admin'; 
        }
        return strtoupper($user_type);
    }

    public static function setUserType()
    {
        $user_type = [];
        $user_type[1] = 'Club Admin';
        $user_type[2] = 'Customer';
        $user_type[3] = 'Super Admin';
        
        return $user_type;
    }

    public static function orderStatus()
    {
        $order_status = [];
        $order_status[0] = 'Ny ordre';
        $order_status[1] = 'Onhold';
        $order_status[2] = 'Processing';
        $order_status[3] = 'Cancel';
        $order_status[4] = 'Completed';
        $order_status[5] = 'Refund';
               
        return $order_status;
    }
}