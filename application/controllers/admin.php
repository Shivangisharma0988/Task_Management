<?php 
class Admin extends MY_Controller
{
    public function dashboard($offset=0)
   
    {
        $this->load->view('admin/dashboard');
    }
    public function home_user()
    {
    $this->load->view('public/home_user');
    }
    public function home_article()
    {
    $this->load->view('admin/home_article');
    }
  public function add_article()
    { $this->load->model('articlesmodel');
       $result = $this->articlesmodel->get_designation();
    $this->load->view('admin/add_article',['result'=>$result]);
    }
    public function add_designation()
    {
        if(!empty($this->session->userdata('error'))){
            $error=$this->session->userdata('error');
            $this->session->unset_userdata('error');
            
        }
        else{
            $error="";
        }
    $this->load->view('admin/add_designation',['error'=>$error]);
    } 
    public function add_notification()
    {
        if(!empty($this->session->userdata('error'))){
            $error=$this->session->userdata('error');
            $this->session->unset_userdata('error');
            
        }
        else{
            $error="";
        }
    $this->load->view('admin/add_notification',['error'=>$error]);
    } 
   
    public function store_article()
    {
       $this->load->library('form_validation');
  
       if($this->form_validation->run('add_articles_rules') )
       {
        $post=$this->input->post();
        unset($post['id']);
        unset($post['submit']);
         //  unset($post['userfile']);
        $this->load->model('articlesmodel','articles');
        if( $this->articles->add_article($post))
         {
          //insert
          $this->session->set_flashdata('feedback','Data Inserted Succesfully!!');
          return redirect('admin/user_dash');
         }
         else{
        //failed
            $this->session->set_flashdata('feedback','Data Not Inserted .Plz try Again!!');
         }
           
            return redirect('admin/dashboard');
       }
       else{
           $this->load->view('admin/add_article');
       }
    }
    public function store_designation()
    {
       $this->load->library('form_validation');
       
    //    $post=$this->input->post();
    //    print_r($post);
       $this->form_validation->set_rules('dname','Designation','required|is_unique[designation.dname]');
       if($this->form_validation->run()==TRUE)
       {
        $post=$this->input->post();
        unset($post['id']);
        unset($post['submit']);
         //  unset($post['userfile']);
        $this->load->model('articlesmodel','articles');
        if( $this->articles->add_designation($post))
         {
//insert
          $this->session->set_flashdata('feedback','Data Inserted Succesfully!!');
          return redirect('admin/des_dash');
          
         }
         else{
//failed
            $this->session->set_flashdata('feedback','Data Not Inserted .Plz try Again!!');
         }
           
            return redirect('admin/des_dash');
       }
       else{       

           $error = $this->form_validation->error_array();
           $this->load->library('session');
           //print_r($error);
           $this->session->set_userdata('error',$error);
           redirect('admin/add_designation');
       }
    }
    public function store_notification()
    {
       $this->load->library('form_validation');
       
    //    $post=$this->input->post();
    //    print_r($post);
       $this->form_validation->set_rules('title','Title','required');
       $this->form_validation->set_rules('message','Message','required');
       if($this->form_validation->run()==TRUE)
       {
        $post=$this->input->post();
        unset($post['id']);
        unset($post['submit']);
         //  unset($post['userfile']);
        $this->load->model('articlesmodel','articles');
        if( $this->articles->add_notification($post))
         {
//insert
          $this->session->set_flashdata('feedback','Data Inserted Succesfully!!');
          return redirect('admin/notification_dash');
          
         }
         else{
//failed
            $this->session->set_flashdata('feedback','Data Not Inserted .Plz try Again!!');
         }
           
            return redirect('admin/notification_dash');
       
    }
       else{       

           $error = $this->form_validation->error_array();
           $this->load->library('session');
           //print_r($error);
           $this->session->set_userdata('error',$error);
           redirect('admin/add_notification');
       }
    }
    public function user_dash()
    {   $this->load->model('usersmodel');
        $articles = $this->usersmodel->getusers();
        $this->load->view('admin/user_dash',['articles'=>$articles]);
    }
    public function des_dash()
    {   $this->load->model('articlesmodel');
        $articles = $this->articlesmodel->designation();
        $this->load->view('admin/des_dash',['articles'=>$articles]);
    }
    public function notification_dash()
    {   $this->load->model('articlesmodel');
        $articles = $this->articlesmodel->notification();
        $this->load->view('admin/notification_dash',['articles'=>$articles]);
    }
    public function task_dash()
    {   $this->load->model('usersmodel');
        $articles = $this->usersmodel->gettask();
        $this->load->view('admin/task_dash',['articles'=>$articles]);
    }
    public function edit_article($article_id)
    {
        
        $this->load->model('articlesmodel','articles');
        $article=$this->articles->findarticle($article_id);
        $this->load->view('admin/edit_article',['article'=>$article]);
    }
    
    public function edit_designation($article_id)
    {  // $article_id = $this->session->set_userdata('article_id');
     
        $this->load->model('articlesmodel','articles');
        //print_r($article_id);
        $article=$this->articles->find_designation($article_id);
        //print_r($article);die;
        $this->load->view('admin/edit_designation',['article'=>$article]);
    }
    public function edit_notification($article_id)
    {  // $article_id = $this->session->set_userdata('article_id');
        $this->load->model('articlesmodel','articles');
        
        $article=$this->articles->find_notification($article_id);
        //print_r($article);die;
        $this->load->view('admin/edit_notification',['article'=>$article]);
    }
    public function update_article($article_id)
    {
        // $article_id=$this->input->post('article_id');
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('gender','Gender','required');
        $this->form_validation->set_rules('designation','Designation','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run())
        {
            
            $post=$this->input->post();
            
            unset($post['submit']);
            unset($post['user_id']);
            
           $this->load->model('articlesmodel','articles');
          if( $this->articles->update_article($article_id,$post))
          {if(!empty('feedback'))
            {
 //insert
           $this->session->set_flashdata('feedback','Data updated Succesfully!!');
           return redirect('admin/user_dash');
            }
          }
          else{
 //failed
 $this->session->set_flashdata('feedback','Data Not updated .Plz try Again!!');
          }
            
 return redirect('admin/edit_article');
        }
        else{
            return redirect('admin/user_dash');
        }
     }
     public function update_designation($article_id)
    {
   
        $this->load->library('form_validation');
        $this->form_validation->set_rules('dname','Designation Name','required');
        if($this->form_validation->run())
        {
            
           $post=$this->input->post();
            unset($post['submit']);
            unset($post['user_id']);
                     
           $this->load->model('articlesmodel','articles');
          if( $this->articles->update_designation($article_id,$post))
          {
 //insert
           $this->session->set_flashdata('feedback','Data updated Succesfully!!');
           return redirect('admin/des_dash');
         
          }
          else{
 //failed
 $this->session->set_flashdata('feedback','Data Not updated .Plz try Again!!');
          }
            
 return redirect('admin/des_dash');
        }
        else{
          
            redirect('admin/edit_designation');
        }
     }
     public function update_notification($article_id)
     {
    
         $this->load->library('form_validation');
         $this->form_validation->set_rules('title','Title','required');
         $this->form_validation->set_rules('message','Message','required');
         if($this->form_validation->run())
         {
             
            $post=$this->input->post();
             unset($post['submit']);
             unset($post['user_id']);
                      
            // print_r($article_id);die;
            $this->load->model('articlesmodel','articles');
           if( $this->articles->update_notification($article_id,$post))
           {
  //insert
            $this->session->set_flashdata('feedback','Data updated Succesfully!!');
            return redirect('admin/notification_dash');
          
           }
           else{
  //failed
  $this->session->set_flashdata('feedback','Data Not updated .Plz try Again!!');
           }
             
  return redirect('admin/notification_dash');
         }
         else{
           
             redirect('admin/edit_notification');
         }
      }
     public function delete_des()
     {
         //$post = $this->input->post();
         $this->load->library('session');
         $article_id=$this->input->post('article_id');
         $this->load->model('articlesmodel','articles');
         
           if( $this->articles->delete_des($article_id))
           {
  //insert
            $this->session->set_flashdata('feedback','Data deleted Succesfully!!');
            return redirect('admin/des_dash');
           }
           else{
  //failed
  $this->session->set_flashdata('feedback','Data Not deleted.Plz try Again!!');
  return redirect('admin/des_dash');
           }
             
  return redirect('admin/des_dash');
         }
        
         public function delete_note()
         {
             //$post = $this->input->post();
             $this->load->library('session');
             $article_id=$this->input->post('article_id');
             $this->load->model('articlesmodel','articles');
             
               if( $this->articles->delete_note($article_id))
               {
      //insert
                $this->session->set_flashdata('feedback','Data deleted Succesfully!!');
                return redirect('admin/notification_dash');
               }
               else{
      //failed
      $this->session->set_flashdata('feedback','Data Not deleted.Plz try Again!!');
      return redirect('admin/notification_dash');
               }
                 
      return redirect('admin/notification_dash');
             }
            
    public function delete_article()
    {
        //$post = $this->input->post();
        $this->load->library('session');
        $article_id=$this->input->post('article_id');
        $this->load->model('articlesmodel','articles');
        
          if( $this->articles->delete_article($article_id))
          {
 //insert
           $this->session->set_flashdata('feedback','Data deleted Succesfully!!');
           return redirect('admin/user_dash');
          }
          else{
 //failed
 $this->session->set_flashdata('feedback','Data Not deleted.Plz try Again!!');
 return redirect('admin/user_dash');
          }
            
 return redirect('admin/user_dash');
        }
       
     
    public function _construct()
    {
        parent::_construct();
        if(!$this->session->userdata['user_id'])
        return redirect('login');
    }
}

?>