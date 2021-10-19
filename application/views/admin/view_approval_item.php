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
                             DATA APPROVAL PENGAJUAN ITEM
                         </h2>
                     </div>
                     <div class="body">
                         <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Status</th>
                                         <th>Nama</th>
                                         <th>Branch</th>
                                         <th>File Bukti Approval</th>
                                         <th>Tanggal Pengajuan</th>
                                         <th>File Bukti Penyelesaian Approval</th>
                                         <th>Tanggal Penyelesaikan</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tfoot>
                                     <tr>
                                         <th>No</th>
                                         <th>Status</th>
                                         <th>Nama</th>
                                         <th>Branch</th>
                                         <th>File Bukti Approval</th>
                                         <th>Tanggal Pengajuan</th>
                                         <th>File Bukti Penyelesaian Approval</th>
                                         <th>Tanggal Penyelesaian</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </tfoot>
                                 <tbody>
                                     <?php $no = 1;
                                        foreach ($item as $i) {
                                        ?>
                                         <tr>
                                             <td><?= $no++ ?></td>
                                             <td>
                                                 <?php if ($i->status1 == '1') { ?>
                                                     <button style=" padding : 5px !important" href="" type="submit" class="btn btn-success ">Proses selesai</button>
                                                 <?php } else { ?>
                                                     <button style=" padding : 5px !important" href="" type="submit" class="btn btn-warning ">Menunggu proses</button>
                                                 <?php } ?>
                                             </td>
                                             <td><?= $i->first_name ?> <?= $i->last_name ?></td>
                                             <td><?= $i->branch ?></td>
                                             <td>
                                                 <?php $ext = pathinfo($i->file_diajukan, PATHINFO_EXTENSION) ?>
                                                 <?php if ($ext == 'pdf') { ?>
                                                     <a class="nav-link" href="<?= base_url('assets/upload/pengajuan/' . $i->file_diajukan) ?>" target="blank">
                                                         <i class="fa fa-file" style="font-size: 30px"></i>
                                                     </a>
                                                 <?php } else { ?>
                                                     <a class="nav-link" href="<?= base_url('assets/upload/pengajuan/' . $i->file_diajukan) ?>" target="blank">
                                                         <i class="fa fa-file-picture-o" style="font-size: 30px"></i>
                                                     </a>
                                                 <?php } ?>
                                             </td>
                                             <td><?= $i->tgl_pengajuan ?> </td>
                                             <td>
                                                 <?php if ($i->status1 == '1') { ?>
                                                     <a class="nav-link" href="<?= base_url('assets/upload/finish/' . $i->file_acc) ?>" target="blank">
                                                         <i class="fa fa-file-excel-o" style="font-size: 30px"></i>
                                                     </a>
                                                 <?php } else { ?>
                                                     <i class="fa fa-clock-o" style="font-size: 30px"></i>
                                                 <?php } ?>
                                             </td>
                                             <td><?= $i->tgl_acc ?> </td>
                                             <td align="center">
                                                 <a type="button" href="<?= base_url('admin/approval_item/edit/' . $i->id_app_item) ?>" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float">
                                                     <i class="material-icons">add</i>
                                                 </a>
                                                 <button type="button" onclick="hapus(<?= $i->id_app_item ?>)" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                     <i class="material-icons">delete</i>
                                                 </button>

                                             </td>
                                         </tr>
                                     <?php } ?>
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