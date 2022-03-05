 <section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><?= $lisa['title_h'] ?></h2>
                    </div>
                    <div class="body">
                        <!-- <p>
                            <a href="<?=base_url('user/suplier/edit_suplier/'.$model->id_pengajuan)?>" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">edit</i>
                            </a>
                            <button type="button" onclick="hapus(<?=$model->id_pengajuan?>)" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">delete</i>
                            </button>
                        </p> -->
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Status by Admin</th>
                                    <td>
                                        <?php if ($model->status=='1') { ?>
                                             <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                             <?php } ?>
                                             <?php if ($model->status=='0') { ?>
                                             <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                             <?php } ?>
                                              <?php if ($model->status=='2') { ?>
                                             <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                             <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status by Finance</th>
                                    <td>
                                        <?php if ($model->status_finance=='1') { ?>
                                             <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                             <?php } ?>
                                             <?php if ($model->status_finance=='0') { ?>
                                             <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                             <?php } ?>
                                              <?php if ($model->status_finance=='2') { ?>
                                             <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                             <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status by Procurement</th>
                                    <td>
                                        <?php if ($model->status_procurement=='1') { ?>
                                             <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                             <?php } ?>
                                             <?php if ($model->status_procurement=='0') { ?>
                                             <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                             <?php } ?>
                                              <?php if ($model->status_procurement=='2') { ?>
                                             <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                             <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nama Requester</th>
                                    <td>
                                        <?= ucwords(strtolower($model->nama_requester)) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Asal SBU</th>
                                     <td><?=strtoupper($model->asal_sbu)?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Daftar</th>
                                    <td><?=$model->tgl_pembuatan?></td>
                                </tr>
                                <tr>
                                    <th>Kategori Supplier</th>
                                    <td><?=strtoupper($model->kategori )?></td>
                                </tr>
                                <tr>
                                    <th>Alternate Name</th>
                                    <td>
                                        <?=strtoupper($model->alternate )?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nama Supplier</th>
                                    <td><?= ucwords(strtolower($model->nama_suplier)) ?></td>
                                </tr>
                                <!-- <tr>
                                    <th>Jenis Usaha</th>
                                    <td><?=strtoupper($model->jenis_usaha )?></td>
                                </tr> -->
                                <tr>
                                    <th>Kode Jenis Usaha</th>
                                    <td><?=strtoupper($model->kode_usaha )?></td>
                                </tr>
                                <tr>
                                    <th>Nomor KTP</th>
                                    <td><?=strtoupper($model->nomor_ktp)?></td>
                                </tr>
                                <tr>
                                    <th>Nomor NPWP</th>
                                    <td><?=strtoupper($model->nomor_npwp) ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?= ucwords(strtolower($model->alamat)) ?></td>
                                </tr>
                                <tr>
                                    <th>Kontak</th>
                                    <td><?=strtoupper($model->nama_kontak) ?></td>
                                </tr>
                                <tr>
                                    <th>No. Kantor</th>
                                    <td><?=strtoupper($model->nomor_kantor) ?></td>
                                </tr>
                                <tr>
                                    <th>No. Hp</th>
                                    <td><?=strtoupper($model->nomor_handphone) ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat Email</th>
                                    <td><?= $model->email ?></td>
                                </tr>
                                <tr>
                                    <th>No. Liability</th>
                                    <td><?=strtoupper($model->nomor_liability) ?></td>
                                </tr>
                                <!--                                
                                <th>Nomor Telephone kantor</th>
                                <th>Nomor Telephone</th>
                                <th>Email</th>
                                <th>Liability Distribution</th>
                                <tr>
                                    <th>as</th>
                                    <th>as</th>
                                </tr> -->
                            </thead>
                        </table>
                        <a href="<?= base_url('admin/supplier/') ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
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
