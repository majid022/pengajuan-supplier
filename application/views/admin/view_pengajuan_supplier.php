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
                             DATA PENGAJUAN SUPPLIER
                            </h2>
                           <!--  <ul class="header-dropdown m-r--5">
                                 <li class="dropdown">
                                    <div class="button" style="margin-top: -17px">
                                        <a href="<?=base_url('admin/supplier/cetak_excel')?>" class="btn  bg-pink btn-circle-lg waves-effect waves-circle waves-float" data-toggle="modal" ><i class="material-icons">print</i></a>
                                    </div>
                                </li>
                            </ul> -->
                        </div>
                        <form action="<?=base_url('admin/supplier/multipel_supplier')?>" method="post">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input style="padding: 5px" type="submit" name="setuju" value="Setujui" class="btn btn-success ">
                                    <input style="padding: 5px" name="tidak" value="Tidak Setuju" type="submit" class="btn btn-danger ">
                                    <input style="padding: 5px" name="cetak" value="Cetak"  type="submit" class="btn bg-pink ">
                                </div>
                            </div>
                            <div class="">
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
                                            <th>Tanggal Daftar</th>
                                            <th>Kategori Supplier</th>
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
                                            <th>Tanggal Daftar</th>
                                            <th>Kategori Supplier</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $no=1;
                                    $ik=1;
                                    $ip=1;
                                        foreach($suplier as $s){
                                    ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td>
                                                <input type="checkbox" id="basic_checkbox_<?=$ik++?>" name="pengajuan[]" value="<?=$s->id_pengajuan?>" class="filled-in">
                                                <label for="basic_checkbox_<?=$ip++?>"></label>
                                                </form>
                                            </td>
                                            <td>
                                                    <?php if ($s->status=='1') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                         <?php } ?>
                                                         <?php if ($s->status=='0') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                         <?php } ?>
                                                          <?php if ($s->status=='2') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                         <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($s->status_finance=='1') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                         <?php } ?>
                                                         <?php if ($s->status_finance=='0') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                         <?php } ?>
                                                          <?php if ($s->status_finance=='2') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                         <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($s->status_procurement=='1') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                         <?php } ?>
                                                         <?php if ($s->status_procurement=='0') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                         <?php } ?>
                                                          <?php if ($s->status_procurement=='2') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                         <?php } ?>
                                                </td>
                                                <td>
                                                    <?= $s->nama_requester ?>
                                                </td>
                                                <td>
                                                    <?= $s->asal_sbu ?>
                                                </td>
                                                <td>
                                                    <?= $s->tgl_pembuatan ?>
                                                </td>
                                                <td>
                                                    <?= $s->kategori ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('admin/supplier/detailSuplier/'.$s->id_pengajuan) ?>" class="btn btn-success ">
                                                        Detail
                                                    </a>
                                                </td>
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
     function hapus(id_pengajuan){
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
                    url:  "<?php echo site_url('admin/supplier/hapus') ?>",
                    type: "post",
                    data: {
                        id_pengajuan:id_pengajuan
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
