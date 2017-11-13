<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login CIMOL</title>
      <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
      <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
      <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
  <div class="login-form">
     <h1>Cimols Trial</h1>
	 <form action="<?php echo base_url('login/masuk')?>" method="post">
     <div class="form-group ">
     
       <input type="text" class="form-control" placeholder="Username " id="username" name="username">
       <!-- <i class="fa fa-user"></i> -->
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" placeholder="Password" id="password" name="password">
       <!-- <i class="fa fa-lock"></i> -->
     </div>
     <div>
     <button type="submit" class="log-btn">Log in</button>
    </div>
    <br>
     <font size="2" color="red">
     Note :</br>
     Username : cafeimers@gmail.com</br>
     Password : cafeimers </font>
   
   </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="<?php echo base_url('assets/js/index.js'); ?>"></script>

</body>
</html>
