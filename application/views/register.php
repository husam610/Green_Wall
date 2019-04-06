<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration-CI Login Registration</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">


  </head>
  <body >

 <div class="container">
    <div class="col-md">
      <div  style="width: 100%; text-align: center;" class="login-panel panel panel-success panel-heading">
        <h1 style="color: green;">Welcome on Green Wall</h1>
      </div>
    </div>
    <div class="col-md">
        <div class="login-panel panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Login</h3>
            </div>
            <div class=" alert-danger">
                <?php
                  $error_msg= $this->session->flashdata('error_msg');
                  if($error_msg){echo $error_msg; }
                ?>

            </div>
 
            <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('user/login_user'); ?>">
                            <div style="display: inline-block;" class="form-group"  >
                                <input class="form-control" placeholder="E-mail" name="user_email" type="email" autofocus>
                            </div>
                            <div style="display: inline-block;" class="form-group">
                                <input class="form-control" placeholder="Password" name="user_password" type="password" value="">
                            </div>
                                <input  class="btn btn-me btn-success " type="submit" value="login" name="login" >
                    </form>   
             </div>
            </div>
        </div>
          <div class="col-md-4 ">
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">Registration</h3>
                      <?php
                        if($this->session->userdata('success_msg'))
                          {echo "<h3 class='panel-title'>".$this->session->userdata('success_msg')."</h3>";}
                      ?>
                  </div>
                  <div class="panel-body">

                  
                  <div class=" alert-danger">
                   <?php echo validation_errors(); ?>
                  </div>
                      <form role="form" method="post" action="<?php echo base_url('user/register_user'); ?>">
                              <div class="form-group">
                                  <input class="form-control" placeholder="Name" name="user_name" type="text" autofocus>
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="E-mail" name="user_email" type="email" autofocus>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Password" name="user_password" type="password" value="">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="confirm password" name="con_password" type="password" value="">
                              </div>

                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >

                      </form>
                  </div>
              </div>
          </div>
      </div>
  


  </body>
</html>