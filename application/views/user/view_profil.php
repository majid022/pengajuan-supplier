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
        <form id="form_advanced_validation" action="<?=base_url('user/profil/aksi_update')?>" method="POST" enctype="multipart/form-data">
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
                                    <label class="form-label">Bisnis Unit </label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="hidden" value="<?=$us->id_user?>" name="id_user" class="form-control" required placeholder="Name">
                                            <input type="text" value="<?=$us->namalengkap?>" name="file" class="form-control" required placeholder="Bisnis Unit">
                                        </div>
                                    </div>
                                     <label class="form-label">Departement Name</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="text" class="form-control" placeholder="Departement Name" name="departement" value="<?=$us->departement?>">
                                        </div>
                                    </div>
                                      <label class="form-label">Branch</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="text" class="form-control" placeholder="Branch" name="branch" value="<?=$us->branch?>">
                                        </div>
                                    </div>
                                    <label class="form-label">User login</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="text" class="form-control" placeholder="User Login" name="username" value="<?=$us->username?>">
                                        </div>
                                    </div>
                                    <label class="form-label">Password</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="text" class="form-control" placeholder="User Login" name="password" value="<?=$us->password?>">
                                        </div>
                                    </div>
                                    <label class="form-label">First Name</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="text" class="form-control" placeholder="First Name" name="first_name" value="<?=$us->first_name?>">
                                        </div>
                                    </div>
                                     <label class="form-label">Last Name</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="<?=$us->last_name?>">
                                        </div>
                                    </div>
                                    <label class="form-label">Email Corporate Kallagroup</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="text" class="form-control" placeholder="Email Corporate Kallagroup" name="email" value="<?=$us->email?>">
                                        </div>
                                    </div>
                                   <label class="form-label">No Handphone</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="text" class="form-control" placeholder="No Handphone" name="no_hp" value="<?=$us->no_hp?>">
                                        </div>
                                    </div>
                                   <label class="form-label">No Whatsapp</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="text" class="form-control" placeholder="No Whatsapp" name="no_wa" value="<?=$us->no_wa?>">
                                        </div>
                                    </div>
                                    <label class="form-label">Alamat </label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?=$us->alamat_user?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Foto </label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="file" accept="image/*" name="file" class="dropify" data-height="300" data-default-file="<?=base_url('assets/upload/images/'.$us->foto)?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
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