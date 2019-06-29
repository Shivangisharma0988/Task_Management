<?php
class Usersmodel extends CI_Model
{
    public function getusers()
    {
        $this->load->database();
        $q=$this->db->get("adduser");
        $result=$q->result();
        return $result;
        //print_r($result);
        
    }
  
    public function gettask()
    {
        $this->load->database();
        $q=$this->db->get("usertask");
        $result=$q->result();
        return $result;
    
    }
    public function usertask()
    {
        $this->load->database();
        $q=$this->db->query("select	u.id,sender_id,a.name as reciever_id,title,description,u.created_at,priority,u.designation
         from adduser a,usertask u  where a.id=u.reciever_id");
        $result=$q->result();
        return $result;
    
    }
    public function user_notification()
    {
        $this->load->database();
       // $this->load->db->order_by('usertask.id','DESC')   
        $q=$this->db->get('notification');
        $result=$q->result();
        return $result;
    }

    public function mytask()
    {
        $this->load->database();
       // $this->load->db->order_by('usertask.id','DESC');
       $s=0;
        $this->db->where('status',$s)
                 ->join('usertask', 'usertask.sender_id = adduser.id');
        $q=$this->db->get('adduser');
        $result=$q->result();
        return $result;
    }
public function find($id)
{
   $q= $this->db->where('id',$id)->get('usertask');
if ($q->num_rows())
    return $q->row();
return false;
}

public function find_task($article_id)
{
    $q=$this->db->select(['id','title','description','priority','designation','reciever_id'])
    ->where('id',$article_id)
    ->get('usertask');

     return $q->row();
}
    public function update_task($article_id,$article)
{
    return $this->db->where('id',$article_id)->update('usertask',$article);
}
    public function delete_task($article_id)
{   
    return $this->db->delete('usertask',['id'=>$article_id]);
}
public function add_task($array,$user_id)
{   
    return $this->db->insert('usertask',$array);

}
public function get_reciever(){
    $user_id=$this->session->userdata('user_id');
    $q = $this->db->select(['id','name'])->where('id !=', $user_id)
             ->get('adduser');
             return $q->result();
}
public function get_designation(){
    $q = $this->db->select(['id','dname'])
             ->get('designation');
             return $q->result();
} 

public function complete_task(){
    $article_id=$this->session->userdata('user_id');
    $var=['status'=>'1','reciever_id'=>$article_id];
    $q = $this->db->where($var)
    ->get('usertask');
    return $q->result();
}

public function update_progress($id){
    $status = $this->input->post("progress");
    if($status == 1){
        $set = 1;
    $this->db->update('usertask',['status'=>$set],['id'=>$id]);
    }
    else{
        $set = 10;
        $this->db->update('usertask',['status'=>$set],['id'=>$id]);
    }
}
}
?>