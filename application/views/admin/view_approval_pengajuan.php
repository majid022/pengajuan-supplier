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
                             DATA APPROVAL PENGAJUAN SUPPLIER
                         </h2>
                     </div>
                     <form action="<?=base_url('admin/supplier/multipel_supplier/1')?>" method="post">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input style="padding: 5px" name="tidak" value="Tidak Setuju" type="submit" class="btn btn-danger ">
                                    <input style="padding: 5px" name="cetak" value="Cetak"  type="submit" class="btn bg-pink ">
                                </div>
                            </div>
                            <div class="">
                                <div class="table-responsive">
                                     <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                         <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th></th>
                                                    <th>Status by Admin</th>
                                                    <th>Status by Finance</th>
                                                    <th>Status by Procurement</th>
                                                    <th>Nama Requester</th>
                                                    <th>Asal SBU</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>NO</th>
                                                    <th></th>
                                                    <th>Status by Admin</th>
                                                    <th>Status by Finance</th>
                                                    <th>Status by Procurement</th>
                                                    <th>Nama Requester</th>
                                                    <th>Asal SBU</th>
                                                    <th></th>
                                                    
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php 
                                                    $i = 1;
                                                    $ik=1;
                                                    $ip=1;
                                                ?>

                                                <?php foreach ($pengajuan as $key) : ?>
                                                    <tr>
                                                        
                                                        <td><?= $i ?></td>
                                                        <td>
                                                            <input type="checkbox" id="basic_checkbox_<?=$ik++?>" name="pengajuan[]" value="<?=$key->id_pengajuan?>" class="filled-in">
                                                            <label for="basic_checkbox_<?=$ip++?>"></label>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <?php if ($key->status=='1') { ?>
                                                                 <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                                 <?php } ?>
                                                                 <?php if ($key->status=='0') { ?>
                                                                 <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                                 <?php } ?>
                                                                  <?php if ($key->status=='2') { ?>
                                                                 <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                                 <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($key->status_finance=='1') { ?>
                                                                 <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                                 <?php } ?>
                                                                 <?php if ($key->status_finance=='0') { ?>
                                                                 <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                                 <?php } ?>
                                                                  <?php if ($key->status_finance=='2') { ?>
                                                                 <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                                 <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($key->status_procurement=='1') { ?>
                                                                 <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                                 <?php } ?>
                                                                 <?php if ($key->status_procurement=='0') { ?>
                                                                 <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                                 <?php } ?>
                                                                  <?php if ($key->status_procurement=='2') { ?>
                                                                 <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                                 <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?= $key->nama_requester ?>
                                                        </td>
                                                        <td>
                                                            <?= $key->asal_sbu ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('admin/approval_supplier/detailSuplier/'.$key->id_pengajuan) ?>" class="btn btn-success ">
                                                                Detail
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php $i++; ?>
                                                <?php endforeach ?>
                                            </tbody>
                                     </table>
                                 </div>
                            </div>
                     </div>
                     </form>
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
     setInterval(time, 4000);

     function hapus(id_app_sup) {
         swal({
             title: "Apa anda yakin ??",
             text: "Data yang di hapus tidak akan kembali !",
             type: "warning",
             showCancelButton: true,
             confirmButtonColor: '#17c0eb',
             confirmButtonText: 'Ya !',
             cancelButtonText: "Batal !"
         }).then((result) => {
             if (result.value) {
                 $.ajax({
                     url: "<?php echo site_url('user/approved/hapus') ?>",
                     type: "post",
                     data: {
                         id_app_sup: id_app_sup
                     },
                     success: function() {
                         swal("Berhasil!", "Data Telah Dihapus !", "success", ).
                         then((value) => {
                             if (value) {
                                 location.reload();
                             } else {
                                 alert('Gagal Menghapus Data');
                             }
                         });

                         //  departement.reload();
                     },
                     error: function() {
                         alert('Gagal Menghapus Data');
                     }
                 });
             } else {

             }
         });
     }
 </script>