<?php
class User_model extends CI_model{
 
 
     
    public function register_user($user){
     
     
    $this->db->insert('user', $user);
     
    }
     
    public function login_user($email,$pass){
     
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('user_email',$email);
      $this->db->where('user_password',$pass);
     
      if($query=$this->db->get())
      {
          return $query->row_array();
      }
      else{
        return false;
      }
     
     
    }
    public function email_check($email){
     
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('user_email',$email);
      $query=$this->db->get();
     
      if($query->num_rows()>0){
        return false;
      }else{
        return true;
      }
     
    }

    public function data_post($post){

      $this->db->insert('posts', $post);
     
    }
  public function data_comm($com){

      $this->db->insert('comments', $com);
    }

    public function add_data_post(){

    return $this->db->query("
            SELECT 
            user.user_name,
            posts.post_id ,
            posts.title,
            posts.post,
            posts.created_at AS pos_time ,
            posts.updated_at AS pos_up_time ,
            posts.like
            from user
            join posts on user.user_id = posts.id_user
            ORDER BY posts.like DESC ;
      ")->result_array();
    
     
    }

    public function add_data_comm(){

    return $this->db->query("
            SELECT 
            user.user_name,
            posts.post_id ,
            comments.id_post,
            posts.title,
            posts.post,
            posts.created_at AS pos_time ,
            posts.updated_at AS pos_up_time ,
            posts.like,
            comments.comment
            from comments
            join posts on comments.id_post = posts.post_id
            join user on comments.id_user = user.user_id
            ORDER BY posts.like DESC ;
      ")->result_array();
    
     
    }


    public function add_like_data($id,$l){

      $l= $l + 1;
        $this->db->query("
            UPDATE posts
            SET posts.like = $l , updated_at= now()
            WHERE post_id = $id ;
      ");
    }


    public function delete_post_data($id){
      $this->db->query("
            DELETE from posts
            WHERE post_id = $id ;
      ");
    }






}
 
 
?>