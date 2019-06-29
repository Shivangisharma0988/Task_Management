<?php 
class Articlesmodel extends CI_Model
{
    public function count_all_articles()
    {
        $user_id = $this->session->userdata('user_id');
        $query= $this->db->select(['name','id'])
                           ->from('adduser')
                           ->get();
                           
         return $query->num_rows();

    }
    public function num_rows()
    {
       $user_id = $this->session->userdata('user_id');
        $query= $this->db->select(['name','id'])
                           ->from('adduser')
                           ->where('user_id',$user_id)
                           ->get();
             return $query->num_rows();
    }
    
    public function all_articles_list($limit,$offset)
    {
      
       $query= $this->db->select(['name','id','email','password','designation','gender'])
                          ->from('adduser')
                          ->order_by('created_at','DESC')
                          ->limit($limit,$offset)
                          ->get();
                          
        return $query->result();
    }
    public function articles_list($limit,$offset)
    {
       $user_id = $this->session->userdata('user_id');
       $query= $this->db->select(['name','id'])
                          ->from('adduser')
                          ->where('user_id',$user_id)
                          ->limit($limit,$offset)
                          ->get();
                          
        return $query->result();
    }
    public function add_article($array)
    {   
        return $this->db->insert('adduser',$array);

    }
    public function add_designation($array)
    {  // print_r($array);die;
        return $this->db->insert('designation',$array);

    }
    public function add_notification($array)
    {  // print_r($array);die;
        return $this->db->insert('notification',$array);

    }
    public function findarticle($article_id)
{
    $q=$this->db->select(['id','name','email','password','gender','designation'])
    ->where('id',$article_id)
    ->get('adduser');

return $q->row();
}
public function find_notification($article_id)
{
    $q=$this->db->select(['id','title','message'])
    ->where('id',$article_id)
    ->get('notification');

return $q->row();
}
public function find_designation($article_id)
{
    $q=$this->db->select(['id','dname'])
    ->where('id',$article_id)
    ->get('designation');

return $q->row();
}
public function get_designation(){
    $q = $this->db->select(['id','dname'])
             ->get('designation');
             return $q->result();
} 
public function update_designation($article_id,$article)
{
    return $this->db->where('id',$article_id)->update('designation',$article);
}
public function update_notification($article_id,$article)
{
    return $this->db->where('id',$article_id)->update('notification',$article);
}
public function update_article($article_id,Array $article)
{
    return $this->db->where('id',$article_id)->update('adduser',$article);
}
public function search($query,$limit,$offset)
{
$q=$this->db->like('name',$query)->limit($limit,$offset)->get('adduser');
return $q->result();
}
public function count_search_results($query)
{
$q=$this->db->from('adduser')->like('name',$query)->get();
return $q->num_rows();
}
public function find($id)
{
   $q= $this->db->from('adduser')->where('id',$id)->get();
if ($q->num_rows())
    return $q->row();
return false;
}
public function delete_article($article_id)
{   
    return $this->db->delete('adduser',['id'=>$article_id]);
}
public function delete_des($article_id)
{   
    return $this->db->delete('designation',['id'=>$article_id]);
}
public function delete_note($article_id)
{   
    return $this->db->delete('notification',['id'=>$article_id]);
}
public function designation()
    {
        $this->load->database();
        $q=$this->db->get("designation");
        $result=$q->result();
        return $result;
    }
    public function notification()
    {
        $this->load->database();
        $q=$this->db->get("notification");
        $result=$q->result();
        return $result;
    }
}
?>