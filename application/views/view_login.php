<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets/images/logokalla.png')?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="<?php echo base_url ('assets')?>/css/material-fonts.css" rel="stylesheet">
    <link href="<?php echo base_url ('assets')?>/css/material-icon.css" rel="stylesheet">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url ('assets')?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url ('assets')?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url ('assets')?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url ('assets')?>/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <center>
                <div  style="font-family: BrodyD; font-size: 25px;" >
                    <img src="<?php echo base_url('assets/images/logokalla.png')?>" height="150px" width="250px">
                </div>
            </center>
        </div>
        <div class="card">
            <div class="body">
                <div id="message">
                  <?php 
                     echo $this->session->flashdata('message');
                  ?>
                </div>
                <form action="<?=base_url('login/aksi_login')?>" method="POST">
                    <div class="msg">Silahkan Login</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-blue waves-effect" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url ('assets')?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url ('assets')?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url ('assets')?>/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url ('assets')?>/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url ('assets')?>/js/admin.js"></script>
    <script src="<?php echo base_url ('assets')?>/js/pages/examples/sign-in.js"></script>
</body>

</html>
<script type="text/javascript">
     function time() {
     $("#message").fadeOut();
 }
  setInterval(time,3000);
  
</script>
