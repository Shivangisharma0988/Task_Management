<?php
class User extends MY_Controller
{
    public function index()
    {
  
    }
    public function usertask()
    {
      $data['kuchvi'] = $this->session->userdata('user_id');
      $this->load->model('Usersmodel','articles');
      $result = $this->articles->get_reciever();
      $results = $this->articles->get_designation();
     // print_r($result);die;
      $this->load->view('public/add_task', ['data' => $data,'result'=>$result,'results'=>$results]);
    }
    public function view_mytask()
    {
      $this->load->view('public/view_mytask');
    }
    public function store_usertask()
    {
      $user_id = $this->session->userdata['user_id'];
      //echo $user_id;die; 
       $this->load->library('form_validation');
       $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('priority', 'priority', 'required');
        //$this->form_validation->set_rules('sender_id', 'Sender_Id', 'required');
        $this->form_validation->set_rules('reciever_id', 'reciever_Id', 'required');  
       if($this->form_validation->run() )
       {
        $post=$this->input->post();
        
        unset($post['submit']);
         //  unset($post['userfile']);
        $this->load->model('Usersmodel','articles');
        if( $this->articles->add_task($post,$user_id))
         {
//insert
          $this->session->set_flashdata('feedback','Data Inserted Succesfully!!');
          return redirect('user/task');
         }
         else{
//failed
            $this->session->set_flashdata('feedback','Data Not Inserted .Plz try Again!!');
         }
           
            return redirect('user/task');
       }
       else{
           $this->load->view('public/task');
       }
    }
    public function edit_task($article_id)
    {
        
        $this->load->model('Usersmodel','articles');
        $article=$this->articles->find_task($article_id);
        $this->load->view('public/edit_task',['article'=>$article]);
    }
  
    public function update_task()
    {
      
        $article_id=$this->input->post('article_id');

        $this->load->library('form_validation');
         $this->form_validation->set_rules('title', 'title', 'required');
         $this->form_validation->set_rules('description', 'description', 'required');
         $this->form_validation->set_rules('priority', 'priority', 'required');
         //$this->form_validation->set_rules('sender_id', 'Sender_Id', 'required');
         $this->form_validation->set_rules('reciever_id', 'reciever_Id', 'required');  
     
        if($this->form_validation->run())
        {
            
           $post=$this->input->post();
            unset($post['submit']);
            unset($post['user_id']);
            $post['id'] = $post['article_id'];
            unset($post['article_id']);
            
           $this->load->model('Usersmodel','articles');
          if( $this->articles->update_task($article_id,$post))
          {
 //insert
           $this->session->set_flashdata('feedback','Data updated Succesfully!!');
           return redirect('user/task');
         
          }
          else{
 //failed
 $this->session->set_flashdata('feedback','Data Not updated .Plz try Again!!');
          }
            
 return redirect('user/task');
        }
        else{
          //print_r($article_id);die;
            redirect('user/edit_task/'.$article_id);
        }
     }
    public function delete_task()
     {
         //$post = $this->input->post();
         $this->load->library('session');
         $article_id=$this->input->post('article_id');
         $this->load->model('Usersmodel','articles');
         
           if( $this->articles->delete_task($article_id))
           {
  //insert
            $this->session->set_flashdata('feedback','Data deleted Succesfully!!');
            return redirect('user/task');
           }
           else{
  //failed
  $this->session->set_flashdata('feedback','Data Not deleted.Plz try Again!!');
  return redirect('user/task');
           }
            
  return redirect('public/task');
         }
         public function notification()
         {   $this->load->model('Usersmodel');
             $articles = $this->Usersmodel->user_notification();
             $this->load->view('public/notification',['articles'=>$articles]);
         }
         public function home()
         {
           $this->load->view('public/home_user');
         }
        
    public function task()
    {   $this->load->model('Usersmodel');
        $articles = $this->Usersmodel->usertask();
        $this->load->view('public/task',['articles'=>$articles]);
    }
    public function my_task()
    {   $this->load->model('Usersmodel');
        $user_id = $this->session->userdata('user_id');
        $articles = $this->Usersmodel->mytask();
        $this->load->view('public/my_task',['articles'=>$articles, 'user_id'=> $user_id]);
    }
    public function search()
    {
       $this->form_validation->set_rules('query','Query','required');
       if(!$this->form_validation->run())
        return $this->index();
       
       $query=$this->input->post('query');
       return redirect('user/search_results/'.$query);
      // $this->load->model('articlesmodel','articles');
      // $articles= $this->articles->search($query);
 //$this->load->view('public\search_results',compact('articles'));  
    }
  public function search_results($query)
  {
    $this->load->model('articlesmodel','articles');
    $this->load->library('pagination');
    $config=[
        'base_url'=> base_url("user/search_results/$query"),
        'per_page'=>5,
        'total_rows'=> $this->articles->count_search_results($query),
        'full_tag_open'=>"<ul class='pagination'>",
        'full_tag_close'=>"</ul>",
        'first_tag_open'=>'</li>',
        'first_tag_close'=>'</li>',
        'uri_segment'=>4,
        'last_tag_open'=>'</li>',
        'last_tag_close'=>'</li>',
        'next_tag_open'=>'</li>',
        'next_tag_close'=>'</li>',
        'prev_tag_open'=>'</li>',
        'prev_tag_close'=>'</li>',
        'num_tag_open'=>'</li>',
        'num_tag_close'=>'</li>',
        'cur_tag_open'=>'</li>',
        'cur_tag_close'=>'</li>',
    ];
    $this->pagination->initialize($config);
    $articles=$this->articles->search($query,$config['per_page'],$this->uri->segment(4));
    $this->load->view('admin\search_results',compact('articles'));
       
  }
  public function article($id)
  {
    $this->load->model('Usersmodel','articles');
    $article = $this->articles->find($id);
    // print_r($article);die;
    $user_id = $this->session->userdata('user_id');
    $this->load->view('public/view_mytask',['article'=>$article,'user_id'=>$user_id]);
  }
  public function complete_task($article_id=0){
    $this->load->model('Usersmodel');
    $this->Usersmodel->update_progress($article_id);
    $articles = $this->Usersmodel->complete_task();
    $this->load->view('public/complete',['articles'=>$articles]);
  }
}
?>
