<section class="content">
    <div class="container-fluid">
       <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>PROFIL</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Advanced Validation -->
        <form id="form_advanced_validation" action="<?=base_url('admin/profil/aksi_update')?>" method="POST" enctype="multipart/form-data">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="message">
                      <?php 
                         echo $this->session->flashdata('message');
                      ?>
                    </div>
                    <div class="card">
                        <div class="header" style="text-align: center;">
                            <h2>FORM UBAH PROFIL</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="form-label">Name </label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input style="text-transform: uppercase;" type="hidden" value="<?=$ad->id_admin?>" name="id_admin" class="form-control" required placeholder="Name">
                                            <input style="text-transform: uppercase;" type="text" value="<?=$ad->namalengkap?>" name="namalengkap" class="form-control" required placeholder="Name">
                                        </div>
                                    </div>
                                    <label class="form-label">User login</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input style="text-transform: uppercase;" type="text" class="form-control" placeholder="User Login" name="username" value="<?=$ad->username?>">
                                        </div>
                                    </div>
                                    <label class="form-label">Password</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="password" class="form-control" placeholder="User Login" name="password" value="<?=$ad->password?>">
                                        </div>
                                    </div>
                                    <label class="form-label">Email C</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input style="text-transform: uppercase;" type="email" class="form-control" placeholder="Email " name="email" value="<?=$ad->email?>">
                                        </div>
                                    </div>
                                   <label class="form-label">No Handphone</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input  type="text" class="form-control" placeholder="No Handphone" name="no_hp" value="<?=$ad->no_hp?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Foto </label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="file" accept="image/*" name="file" class="dropify" data-height="300" data-default-file="<?=base_url('assets/upload/images/'.$ad->foto)?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?=base_url('ader/profil')?>" class="btn btn-danger waves-effect" type="submit">Batal</a>
                            <button class="btn btn-primary waves-effect" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Validation -->
        </form>
    </div>
</section>
<script type="text/javascript">
     function time() {
        $("#message").fadeOut();
        }
     setInterval(time,5000);
</script>