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
                            <ul class="header-dropdown m-r--5">
                                 <li class="dropdown">
                                    <div class="button" style="margin-top: -17px">
                                        <a href="<?=base_url('user/suplier/tambah_suplier')?>" class="btn  bg-green btn-circle-lg waves-effect waves-circle waves-float" data-toggle="modal" ><i class="material-icons">add</i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <form action="<?=base_url('user/suplier/multipel_supplier')?>" method="post">
                        <div class="body">
                            
                            <div class="">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th></th>
                                            <th>Status</th>
                                            <th>Nama Requester</th>
                                            <th>Asal SBU</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Kategori Supplier</th>
                                            <th>Alternate Name</th>
                                            <th>Nama Supplier</th>
                                            <th>Aksi</th>
                                            <th>Jenis Usaha</th>
                                            <th>Kode Jenis Usaha</th>
                                            <th>Nomor KTP</th>
                                            <th>Nomor NPWP</th>
                                            <th>Alamat</th>
                                            <th>Nama</th>
                                            <th>Nomor Telephone kantor</th>
                                            <th>Nomor Telephone</th>
                                            <th>Email</th>
                                            <th>Liability Distribution</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>NO</th>
                                            <th></th>
                                            <th>Status</th>
                                            <th>Nama Requester</th>
                                            <th>Asal SBU</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Kategori Supplier</th>
                                            <th>Alternate Name</th>
                                            <th>Nama Supplier</th>
                                            <th>Aksi</th>
                                            <th>Jenis Usaha</th>
                                            <th>Kode Jenis Usaha</th>
                                            <th>Nomor KTP</th>
                                            <th>Nomor NPWP</th>
                                            <th>Alamat</th>
                                            <th>Nama</th>
                                            <th>Nomor Telephone kantor</th>
                                            <th>Nomor Telephone</th>
                                            <th>Email</th>
                                            <th>Liability Distribution</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $no=1;$ak=1;$ik=1;
                                        foreach($suplier as $s){
                                    ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td>
                                                <?php if ($s->status=='1'){?>
                                                    <input type="checkbox" id="basic_checkbox_<?=$ak++?>" name="pengajuan[]" value="<?=$s->id_pengajuan?>" class="filled-in">
                                                    <label for="basic_checkbox_<?=$ik++?>"></label>
                                                <?php }?>
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
                                            <td><?=strtoupper($s->nama_requester)?></td>
                                            <td><?=strtoupper($s->asal_sbu)?></td>
                                            <td><?=$s->tgl_pembuatan?></td>
                                            <td><?=strtoupper($s->kategori_nama )?></td>
                                            <td><?=strtoupper($s->alternate )?></td>
                                            <td><?=strtoupper($s->nama_suplier) ?></td>
                                            <td align="center">
                                                <a href="<?=base_url('user/suplier/edit_suplier/'.$s->id_pengajuan)?>" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float">
                                                   <i class="material-icons">edit</i>
                                               </a>
                                                <button type="button" onclick="hapus(<?=$s->id_pengajuan?>)" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                   <i class="material-icons">delete</i>
                                               </button>
                                            <td><?=strtoupper($s->jenis_usaha )?></td>
                                            <td><?=strtoupper($s->kode_usaha )?></td>
                                            <td><?=strtoupper($s->nomor_ktp)?></td>
                                            <td><?=strtoupper($s->nomor_npwp) ?></td>
                                            <td><?=strtoupper($s->alamat )?></td>
                                            <td><?=strtoupper($s->nama_kontak) ?></td>
                                            <td><?=strtoupper($s->nomor_kantor) ?></td>
                                            <td><?=strtoupper($s->nomor_handphone) ?></td>
                                            <td><?=strtoupper($s->email) ?></td>
                                            <td><?=$s->nomor_liability?></td>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
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
     setInterval(time,4000);
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
                    url:  "<?php echo site_url('user/suplier/hapus') ?>",
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