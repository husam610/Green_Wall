<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> >> Your wall << </title>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  </head>
  <body>
    <div class="container">
      
    <div style="margin-top: 15px;">
        <div class="login-panel panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><a href="<?php echo base_url('user/user_logout');?>">Log out</a></h3>
            </div>
            
          <div style="margin-top: 20px;" class="col-md-3">
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                    <?php 
                    $the_name=$this->session->userdata('user_name');
                    if($the_name){
                    echo "<h2>$the_name</h2>";}
                    else{ redirect('user/user_logout');}
                  $error_msg= $this->session->flashdata('error_msg');
                  if($error_msg){
                      echo "<br>";
                      echo $error_msg; }
                 
                   ?>

                      <h3 class="panel-title">Add New Post</h3>
                  </div>
                  <div class="panel-body">

                      <form role="form" method="post" action="<?php echo base_url('user/add_post'); ?>">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="The Title" name="title" type="text" autofocus>
                              </div>

                              <div class="form-group">
                <textarea class="form-control" style="height: 200px;" placeholder="What's on your mind ...!?" type="text" name="posty" ></textarea>
                              </div>
                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Add Post "  >

                          </fieldset>
                      </form>
                      
                  </div>
              </div>
          </div>
            

        </div>
    </div>



<div class="col-md-8 ">

        <?php
          $all_data=$this->session->userdata('all_data');
          if($all_data){
          foreach ($all_data as $value)
          {//echo $value['post_id'];

            $this->session->set_userdata('posty_id', $value['post_id']);

        ?>
  <div class="login-panel panel panel-success">
      <div class="panel-heading">
        <div style="display: inline-block;">
          <?php
            echo "<h3><b>".$value['user_name']."</b></h3>  at:".$value['pos_time'];
          ?>
        </div>
        <div class="container-fluid" style="display: inline-block;vertical-align: top;">
          <button class="btn btn-default navbar-btn">Button</button>

          <form style="display: inline-block;" role="form" method="post" action="<?php echo base_url('user/delete_post'); ?>">
            <input name="p_id" type="hidden" value="<?php echo $value['post_id']; ?>">
            <input style="width: 100px;" class="btn btn-danger navbar-btn"  type="submit" value="Delete"  >
          </form>

          <form class="navbar-form navbar-left" method="post" action="<?php echo base_url('user/add_comm'); ?>">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Add comment..." name="comment">
              <input type="hidden"  name="post_id" value="<?php echo $value['post_id']; ?>">

            </div>
            <button type="submit" class="btn btn-success"> ↓ </button>
          </form>

        </div>
      </div>
    <div class="panel-body">
      <?php
      echo "<br> "."<br> <b> The title is: ".$value['title']." </b><br>".$value['post'];
      ?>
      <br>
      <div style="display: inline-block;width: 100%; text-align: right; ">
        <?php
        $con_like=$value['like'];
        echo "this post have $con_like upvote";
        ?>
        <form style="display: inline-block;" role="form" method="post" action="<?php echo base_url('user/add_like'); ?>">
          <input name="like" type="hidden" value="<?php echo $value['like']; ?>">
          <input name="p_id" type="hidden" value="<?php echo $value['post_id']; ?>">
          <input style="width: 100px;" class="btn btn-success btn-block"  type="submit" value="Upvote ♥"  >
        </form>
      </div>
    </div>
    <div class="panel-footer">
      <h4 style="color: #cccccc; font-style: italic;">the comments:</h4>
      <?php

          $all_comm=$this->session->userdata('all_comm');
          if($all_comm){
          foreach ($all_comm as $val)
          {
            if($val['id_post']==$value['post_id']){
           echo $val['user_name']." : " .$val['comment']."<hr>"; }
          }  }
        ?>
      <br>
    </div>

   </div>
      <?php
      } 
      }
      ?>
</div>

</body>
</html>