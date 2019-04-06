<?php

class User extends CI_Controller {


        public function __construct()
                {
 
                parent::__construct();
                $this->load->helper('url');
                $this->load->model('user_model');
                $this->load->library('session');
                 $this->load->library('form_validation');

 
                } 

        public function index()
                {
                $this->load->view("register.php");
                }

///////////////////////////////////////

public function register_user(){

$this->form_validation->set_rules('user_name','user name','required|alpha');
$this->form_validation->set_rules('user_email','Email','required');
$this->form_validation->set_rules('user_password','Password','required|min_length[8]');
$this->form_validation->set_rules('con_password','confirm password','required|matches[user_password]');

if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('register');
        }
        else
        {
            
        

 
                      $user=array(
                      'user_name'=>$this->input->post('user_name'),
                      'user_email'=>$this->input->post('user_email'),
                      'user_password'=>md5($this->input->post('user_password')),
                      //'con_password'=>$this->input->post('con_password'),
                        );
                        
                  $this->user_model->register_user($user);
                  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
                  redirect('user/login_view');
                 
                
                 
                }
}                 

        public function login_view(){
 
                $this->load->view("register");
                 
                } 

        function login_user(){

                  $user_login=array(
                 
                  'user_email'=>$this->input->post('user_email'),
                  'user_password'=>md5($this->input->post('user_password'))
                 
                    );
                 
                    $data=$this->user_model->login_user($user_login['user_email'],$user_login['user_password']);
                      if($data)
                      {
                        $this->session->set_userdata('user_id',$data['user_id']);
                        $this->session->set_userdata('user_email',$data['user_email']);
                        $this->session->set_userdata('user_name',$data['user_name']);
                 
                        redirect('user/all_posts', 'refresh');
                 
                      }
                      else{
                        $this->session->set_flashdata('error_msg', 'Pleas check your Email and Password.');
                        $this->load->view("register.php");
                 
                      }
              
}
       /* function user_profile(){
 
                $this->load->view('user_profile.php');
                 
                } */
        public function user_logout(){
 
                  $this->session->sess_destroy();
                  redirect('user/login_view', 'refresh');
                }
        public function go_add_post(){$this->load->view("add_post.php");}
        public function go_all_posts(){$this->load->view("all_posts.php");}



        public function add_like(){
     
                      $p_l=$this->input->post('like');
                      $p_id=$this->input->post('p_id');
                      
                  $this->user_model->add_like_data($p_id , $p_l);
                  redirect('user/all_posts');
        }
/////////////add post/////////////////////////////
        public function add_post(){
          $this->form_validation->set_rules('posty','post','required');

          if ($this->form_validation->run() == FALSE)
            {
                      redirect('user/all_posts');
            }
            else
            {
                      $post=array(
                      'title'=>$this->input->post('title'),
                       'post'=>$this->input->post('posty'),
                      'created_at'=>date("Y-m-d h:i:sa"),
                      'updated_at'=>date("Y-m-d h:i:sa"),
                      'id_user'=>$this->session->userdata('user_id'),
                      'like'=>0
                        );                         
                  $this->user_model->data_post($post);
                  //$this->session->set_flashdata('success_msg', 'your post is added.');
                  redirect('user/all_posts');
        }
    }

        public function all_posts(){


          $all_data=$this->user_model->add_data_post();
          $this->session->set_userdata('all_data',$all_data);
          redirect('user/all_comments');
           // $this->load->view('all_posts.php', $all_data );
          }
        public function all_comments(){
            
           
          $all_comm=$this->user_model->add_data_comm();

          $this->session->set_userdata('all_comm', $all_comm);
          $this->load->view('all_posts.php');
          }
        public function delete_post(){
     
                      $p_id=$this->input->post('p_id');
                      
                  $this->user_model->delete_post_data($p_id);
                  redirect('user/all_posts');
        }
/////////////add comment /////////////////////////////
        public function add_comm(){
          $this->form_validation->set_rules('comment','Comment','required'); 

          if ($this->form_validation->run() == FALSE)
            {
                      redirect('user/all_posts');
            }
            else
            {         
                      $comm=array(
                      'comment'=>$this->input->post('comment'),
                      'id_post'=>$this->input->post('post_id'),
                      'id_user'=>$this->session->userdata('user_id')
                        );                         
                  $this->user_model->data_comm($comm);
                  redirect('user/all_comments');
        }
    }

}


?>