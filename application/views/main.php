<?php $this->load->view('head')?>

<body class="theme-red">
     <!-- Jquery Core Js -->
    <!-- <script src="<?php echo base_url('assets') ?>/plugins/jquery/jquery.min.js"></script> -->
    <script src="<?php echo base_url('assets') ?>/plugins/jquery/jquery-3.1.0.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/datetimepicker/datepicker.js"></script>
    <script src="<?php echo base_url('assets') ?>/calender/calender.js"></script>
    <script src="<?php echo base_url('assets') ?>/chart/highcharts.js"></script>
    <script src="<?php echo base_url('assets') ?>/barchart/morris.js"></script>
    <script src="<?php echo base_url('assets') ?>/barchart/raphael-min.js"></script>
    <script src="<?php echo base_url('assets') ?>/chart/exporting.js"></script>
    <script src="<?php echo base_url('assets') ?>/barchart/Chart.min.js"></script>
    <link href="<?php echo base_url('assets/js/selek') ?>/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url('assets/js/selek') ?>/select2.min.js"></script>
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#">INTEGRATED SYSTEM DEPARTMENT</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Notifications -->
                    <?php if($this->session->userdata('sidebar')=="admin"){  ?>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">
                                <?php 
                                    $sql = "SELECT notif FROM tb_pengajuan where notif='1' ";
                                    $query = $this->db->query($sql)->num_rows('notif');

                                    $sql_itm = "SELECT * FROM tb_item where status='0' ";
                                    $query_itm = $this->db->query($sql_itm)->num_rows('status');

                                    echo $query + $query_itm;
                                ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a  href="<?php echo base_url('admin/supplier/')?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><?php echo $query;?> Pengajuan Supplier Baru</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 
                                                    <?php
                                                        $sql1 = "SELECT tgl_pembuatan FROM tb_pengajuan where notif='1' ";
                                                        $query1 = $this->db->query($sql1)->row('tgl_pembuatan');

                                                        $waktuawal  = date_create($query1); //waktu di setting

                                                        $waktuakhir = date_create(); //2019-02-21 09:35 waktu sekarang

                                                        $diff  = date_diff($waktuawal, $waktuakhir);

                                                        echo 'Dikirim: ';
                                                        if ( $diff->d==0) {
                                                             echo  'Hari Ini';
                                                        }else{
                                                             echo $diff->d .' Hari Lalu';
                                                        }

                                                        ?>
                                                </p>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a  href="<?php echo base_url('admin/item/')?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><?php echo $query_itm;?> Pengajuan Item Baru</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 
                                                    <?php
                                                        $sql1 = "SELECT tgl_pe FROM tb_item where status='0' ";
                                                        $query1 = $this->db->query($sql1)->row('tgl_pe');

                                                        $waktuawal  = date_create($query1); //waktu di setting

                                                        $waktuakhir = date_create(); //2019-02-21 09:35 waktu sekarang

                                                        $diff  = date_diff($waktuawal, $waktuakhir);

                                                        echo 'Dikirim: ';
                                                        if ( $diff->d==0) {
                                                             echo  'Hari Ini';
                                                        }else{
                                                             echo $diff->d .' Hari Lalu';
                                                        }

                                                        ?>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                 
                    <?php }?>

                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <?php $this->load->view('sidebar')?>

    <?=$content?>

<?php $this->load->view('js')?>
