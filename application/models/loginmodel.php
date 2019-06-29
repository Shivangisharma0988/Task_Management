<?php 
class Loginmodel extends CI_Model
{

    public function login_valid($username , $password)
    {
     $q=  $this->db->where(['username'=>$username ,'password'=>$password])
     ->get('adminlogin');
        if($q->num_rows())
        {
            return $q->row()->id;
            //return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function user_login_valid($name , $password)
    {
     $q=  $this->db->where(['name'=>$name ,'password'=>$password])
     ->get('adduser');
        if($q->num_rows())
        {
            return $q->row()->id;
            //return TRUE;
        }
        else{
            return FALSE;
        }
    }
   
}
?>