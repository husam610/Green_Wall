<?php
$user_id=$this->session->userdata('user_id');
 
if(!$user_id){
 
  redirect('user/login_view');
}
 
 ?>
 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User Profile Dashboard-CodeIgniter Login Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
 
        <?php
         echo $this->session->userdata('user_name'); echo "<br>"; 
          echo $this->session->userdata('user_email'); echo "<br>";
           echo $this->session->userdata('user_id');  echo "<br>";
         ?>

<a href="<?php echo base_url('user/user_logout');?>" >  <button type="button" class="btn-primary">Logout</button></a>
</div>
  </body>
</html>