 <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="message">
                      <?php 
                         echo $this->session->flashdata('message');
                      ?>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>
                             DATA USER
                            </h2>
                        </div>
                        <div class="body">
                            <div class="">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Departement Name</th>
                                            <th>Branch</th>
                                            <th>User login</th>
                                            <th>Fisrt Name</th>
                                            <th>Last Name</th>
                                            <th>Aksi</th>
                                            <th>Email Corporate KallaGrouo</th>
                                            <th>No. Handphone</th>
                                            <th>No. Whatsapp</th>
                                            <th>Alamat</th>
                                            <th>Date Cteated</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Departement Name</th>
                                            <th>Branch</th>
                                            <th>User login</th>
                                            <th>Fisrt Name</th>
                                            <th>Last Name</th>
                                            <th>Aksi</th>
                                            <th>Email Corporate KallaGrouo</th>
                                            <th>No. Handphone</th>
                                            <th>No. Whatsapp</th>
                                            <th>Alamat</th>
                                            <th>Date Cteated</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $no=1;
                                        foreach($user as $us){
                                    ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td>
                                                 <?php if ($us->aktif=='1') { ?>
                                                 <form action="<?php echo base_url('admin/user/status');?>" method="post">
                                                 <input type="Hidden" value="<?php echo $us->id_user ?>" name="id_user">
                                                 <button style="padding: 5px" href="" type="submit" class="btn btn-success ">AKTIF</button>
                                                 </form>
                                                 <?php } else { ?>
                                                  <form action="<?php echo base_url('admin/user/status2')?>" method="post">
                                                 <input type="Hidden" value="<?php echo $us->id_user ?>" name="id_user">
                                                 <button style="padding: 5px" href="" type="submit" class="btn btn-danger ">TIDAK AKTIF</button>
                                                 </form>
                                                 <?php } ?>
                                            </td>
                                            <td>
                                                <img width="100px" height="80px" src="<?=base_url('assets/upload/images/'.$us->foto)?>">                                               
                                            </td>
                                            <td><?=$us->namalengkap?> </td>
                                            <td><?=$us->departement?> </td>
                                            <td><?=$us->branch?> </td>
                                            <td><?=$us->username?> </td>
                                            <td><?=$us->first_name?> </td>
                                            <td><?=$us->last_name?> </td>
                                            <td align="center">
                                                <button type="button" onclick="hapus(<?=$us->id_user?>)" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                   <i class="material-icons">delete</i>
                                               </button>

                                            </td>
                                            <td><?=$us->email?> </td>
                                            <td><?=$us->no_hp?> </td>
                                            <td><?=$us->no_wa?> </td>
                                            <td><?=$us->alamat_user?> </td>
                                            <td><?=$us->tgl?> </td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
<script type="text/javascript">
     function time() {
        $("#message").fadeOut();
        }
     setInterval(time,5000);
     function hapus(id_user){
        swal({
                title: "Apa anda yakin ??",
                text: "Data yang di hapus tidak akan kembali !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#17c0eb',
                confirmButtonText: 'Ya !',
                cancelButtonText: "Batal !"
            }).then((result)=>{
                if(result.value){
                    $.ajax({
                    url:  "<?php echo site_url('admin/user/hapus') ?>",
                    type: "post",
                    data: {
                        id_user:id_user
                    },
                    success:function(){
                        swal("Berhasil!", "Data Telah Dihapus !", "success",).
                        then((value)=>{
                        if(value){
                            location.reload();
                        }else{
                           alert('Gagal Menghapus Data');
                        }
                    });

                      //  departement.reload();
                    },error:function(){
                        alert('Gagal Menghapus Data');
                    }
                });
                }else{
                     
                }
            });
    }
</script>