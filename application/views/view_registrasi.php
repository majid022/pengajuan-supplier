<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Resgistrasi</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/dropify/dropify.min.css'?>">
    <!-- Custom Css -->
    <link href="<?php echo base_url ('assets')?>/css/style.css" rel="stylesheet">
</head>

<body class="login-page" style="max-width: 500px">
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
                <form action="<?=base_url('registrasi/aksi_registrasi')?>" method="POST" enctype="multipart/form-data">
                    <div class="msg">Silahkan Registrasi Untuk Mengajukan Supplier dan Item</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">business</i>
                        </span>
                        <div class="form-line">
                            <input  type="text" style="text-transform: uppercase;"  name="namalengkap" class="form-control"  placeholder="BISNIS UNIT" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">business</i>
                        </span>
                        <div class="form-line">
                            <input  type="text" style="text-transform: uppercase;" name="departement" class="form-control"  placeholder="Departement Name" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">branding_watermark</i>
                        </span>
                        <div class="form-line">
                            <input  type="text" style="text-transform: uppercase;" name="branch" class="form-control"  placeholder="Branch" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input  type="text" style="text-transform: uppercase;" name="first_name" class="form-control"  placeholder="First name" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input  type="text" style="text-transform: uppercase;"  name="last_name" class="form-control"  placeholder="Last Name" autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Corporate KallaGroup" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">call</i>
                        </span>
                        <div class="form-line">
                            <input type="text" name="no_hp" class="form-control" name="no_hp" placeholder="Nomor Handphone" required>
                        </div>
                    </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">chat</i>
                        </span>
                        <div class="form-line">
                            <input type="text" name="no_wa" class="form-control" name="no_hp" placeholder="Nomor Whatsapp" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">location_on</i>
                        </span>
                        <div class="form-line">
                            <textarea type="text" style="text-transform: uppercase;" name="alamat" class="form-control"  placeholder="Alamat" required></textarea>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" name="username" class="form-control"  placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                        </span>
                        <div class="form-line">
                             <input type="file" accept="image/*" name="file" class="dropify" data-height="300">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                             <div class="col-xs-6">
                                <a href="<?=base_url('login')?>" class="btn btn-block bg-blue waves-effect">Login</a>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Daftar</button>
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
    <script type="text/javascript" src="<?php echo base_url().'assets/dropify/dropify.min.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.dropify').dropify({
                messages: {
                    default: 'Drag atau drop untuk memilih gambar',
                    replace: 'Ganti',
                    remove:  'Hapus',
                    error:   'error'
                }
            });
        });
        
    </script>
</body>

</html>
<script type="text/javascript">
     function time() {
     $("#message").fadeOut();
 }
  setInterval(time,3000);
  
</script>
