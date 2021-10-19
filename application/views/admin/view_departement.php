 <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                             DATA DEPARTEMENT
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                 <li class="dropdown">
                                    <div class="button" style="margin-top: -17px">
                                        <button type="button" class="btn  bg-green btn-circle-lg waves-effect waves-circle waves-float" data-toggle="modal" onclick="tambah_departement()"><i class="material-icons">add</i></button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama Department</th>
                                            <th>Kode Department</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama Department</th>
                                            <th>Kode Department</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $no=1;
                                        foreach($departement as $d){
                                    ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$d->nama_departement?></td>
                                            <td><?=$d->kode_departement?></td>
                                            <td><?=$d->tgl?></td>
                                            <td align="center">
                                                <button type="button" onclick="edit(<?=$d->id_departement?>)" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float">
                                                   <i class="material-icons">edit</i>
                                               </button>
                                                <button type="button" onclick="hapus(<?=$d->id_departement?>)" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                   <i class="material-icons">delete</i>
                                               </button>

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
    <!-- ============ MODAL ADD Produk ===============-->
<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" style="margin-top: 80px;margin-left: 15%">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title" id="defaultModalLabel">Tambah </h4>
            </div>
            <div class="modal-body">
                <form action="#" id="form">
                    <label for="email_address">Nama Department</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="hidden" name="id_departement" class="form-control" >
                            <input type="text" name="nama_departement" class="form-control" placeholder="Masukkan Nama Department">
                        </div>
                    </div>
                    <label for="password">Kode Department</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="kode_departement" class="form-control" placeholder="Masukkan Kode Department">
                        </div>
                    </div>
                </form>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-red btn-link waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="simpan()"  class="btn bg-blue btn-link waves-effect">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!--END MODAL ADD Produk-->
<script type="text/javascript">
    var save_method;
    var table;

   function tambah_departement(){
        save_method ='tambah';
        $('#form')[0].reset();
        $('#defaultModal').modal('show');
        $('.modal-title').text('Tambah Data');
    }
    function simpan(){
        var url;
        if(save_method == 'tambah'){
            url = "<?php echo base_url('admin/departement/tambah')?>";
        }
        else
        {
            url = "<?php echo site_url('admin/departement/update') ?>";
        }
        //memasukkan ajax ke dalam database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            datatype: "JSON",
            success: function (data)
            {
                $('#modal_form').modal('hide');
                var a = JSON.parse(data);
                if(a.respon.execute){
                   swal("Berhasil!", a.respon.message , "success").
                    then((value)=>{
                        if(value){
                            location.reload();
                        }else{

                        }
                    });
                }
                else{
                    swal("Error!", a.respon.message, "warning").
                    then((value)=>{
                        if(value){
                            location.reload();
                        }else{

                        }
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error Menambah / Update Data')
            }
        });
    }
     function edit(id_departement)
    {
        save_method = 'update';
        $('#form')[0].reset();
        $('.help-block').empty();
        $('.form-group-inner').removeClass('has-error'); // reset form on modals
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('admin/departement/edit') ?>/" + id_departement,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                $('[name="id_departement"]').val(data.id_departement);
                $('[name="nama_departement"]').val(data.nama_departement);
                $('[name="kode_departement"]').val(data.kode_departement);
               
                $('#defaultModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
    function hapus(id_departement){
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
                    url:  "<?php echo site_url('admin/departement/hapus') ?>",
                    type: "post",
                    data: {
                        id_departement:id_departement
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