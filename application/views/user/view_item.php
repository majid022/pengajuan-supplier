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
                             DATA PENGAJUAN ITEM
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                 <li class="dropdown">
                                    <div class="button" style="margin-top: -17px">
                                        <a href="<?=base_url('user/item/tambah_item')?>" class="btn  bg-green btn-circle-lg waves-effect waves-circle waves-float" data-toggle="modal" ><i class="material-icons">add</i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <form action="<?=base_url('user/item/multipel_item')?>" method="post">
                        <div class="body">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th></th>
                                            <th>Status</th>
                                            <th>Nama Requester</th>
                                            <th>Asal SBU</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Deskripsi ITEM</th>
                                            <th>Jenis ITEM</th>
                                            <th>Satuan</th>
                                            <th>Aksi</th>
                                            <th>Harga ITEM</th>
                                            <th>Deskripsi COA</th>
                                            <th>COA</th>
                                            <th>Jenis ITEM COA</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th></th>
                                            <th>Status</th>
                                            <th>Nama Requester</th>
                                            <th>Asal SBU</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Deskripsi ITEM</th>
                                            <th>Jenis ITEM</th>
                                            <th>Satuan</th>
                                            <th>Aksi</th>
                                            <th>Harga ITEM</th>
                                            <th>Deskripsi COA</th>
                                            <th>COA</th>
                                            <th>Jenis ITEM COA</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $no=1;$ik=1;$ip=1;
                                        foreach($item as $i){
                                    ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td>
                                                <?php if ($i->status=='1') { ?>
                                                 <input type="checkbox" id="basic_checkbox_<?=$ik++?>" name="item[]" value="<?=$i->id_item?>" class="filled-in">
                                                <label for="basic_checkbox_<?=$ip++?>"></label>
                                                <?php }?>
                                            </td>
                                            <td>
                                                 <?php if ($i->status=='1') { ?>
                                                 <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                <?php } else if ($i->status=='2') { ?>
                                                 <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                 <?php } else { ?>
                                                 <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRESS</button>
                                                 <?php } ?>
                                            </td>
                                            <td><?=strtoupper($i->nama_re)?></td>
                                            <td><?=$i->asal_sbu?></td>
                                            <td><?=$i->tgl_pe?></td>
                                            <td><?=$i->des_item ?></td>
                                            <td><?=$i->jenis_item ?></td>
                                            <td><?=$i->satuan ?></td>
                                            <td align="center">
                                                <a type="button" href="<?=base_url('user/item/edit_item/'.$i->id_item)?>" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float">
                                                   <i class="material-icons">edit</i>
                                               </a>
                                                <button type="button" onclick="hapus(<?=$i->id_item?>)" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                   <i class="material-icons">delete</i>
                                               </button>
                                            </td>
                                            <td><?=$i->harga ?></td>
                                            <td><?=$i->nama_account ?></td>
                                            <td><?=$i->coa ?></td>
                                            <td><?=$i->jenis_item_coa ?></td>
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
     function hapus(id_item){
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
                    url:  "<?php echo site_url('user/item/hapus') ?>",
                    type: "post",
                    data: {
                        id_item:id_item
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