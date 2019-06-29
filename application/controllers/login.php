<?php
class Login extends CI_Controller
{
public function index()
{ 
   $this->load->view('public/my_main');
}
public function admin()
{
    if($this->session->userdata('user_id'))
    return redirect('admin/home_article');
    //loading view
    $this->load->view('public/admin_login');
}
public function suggest()
{
    $this->load->view('public/suggest');
}
public function user()
{
    $this->load->view('public/user_login');
}

public function user_login()
{
    $this->load->library('session');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
   
    if($this->form_validation->run())
    {
        $name=$this->input->post('name');
        $password=$this->input->post('password');
        
       $this->load->model('loginmodel');
       $login_id=$this->loginmodel->user_login_valid($name,$password);
    
       if($login_id)
       {
          
        $this->session->set_userdata('user_id',$login_id);
        
        return redirect('admin/home_user');
         
       }
       else{
           $this->session->set_flashdata('login_failed','Incorrect name/Password.');
       // return redirect('login/user_login');
        $this->load->view('public/user_login');
       }
   
    }
    else{
        //failed
        
        $error = $this->form_validation->error_array();
        
        $this->load->view('public/user_login',['error'=>$error]);
    }
}

public function admin_login()
{
    $this->load->library('session');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
    if($this->form_validation->run('add_login_rules'))
    {
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        
       $this->load->model('loginmodel');
       $login_id=$this->loginmodel->login_valid($username,$password);
    
       if($login_id)
       {
          
        $this->session->set_userdata('user_id',$login_id);
        
        return redirect('admin/home_article');
         
       }
       else{
           $this->session->set_flashdata('login_failed','Incorrect Username/Password.');
        return redirect('login');
       }
   
    }
    else{
        //failed
        $error = $this->form_validation->error_array();
        
        $this->load->view('public/admin_login',['error'=>$error]);
    }
}
public function user_logout()
{
    $this->session->unset_userdata('user_id',$login_id);
    return redirect('login/user');

}
public function logout()
{
    $this->session->unset_userdata('user_id',$login_id);
    return redirect('login');

}
}
?>