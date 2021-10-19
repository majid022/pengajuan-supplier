<section class="content">
    <div class="container-fluid">
       <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>TAMBAH BUKTI APPROVAL PENGAJUAN  ITEM</h2>
                        <ul class="header-dropdown m-r--5">
                            <div class="button" style="margin-top: -17px">
                                <a href="<?=base_url('user/item')?>" class="btn  bg-red btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">keyboard_backspace</i></a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Advanced Validation -->
        <form id="form_advanced_validation" action="<?=base_url('user/approval_item/aksi_tambah')?>" method="POST" enctype="multipart/form-data">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="text-align: center;">
                            <h2>FORM BUKTI APPROVAL PENGAJUAN  ITEM</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-12">
                                     <label class="form-label">File Bukti Approval Pengajuan Item <small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" name="file" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                   <label class="form-label">Tanggal Pengajuan<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="date" class="form-control" placeholder="Ex: 30/07/2016" name="tgl_pengajuan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?=base_url('user/approval_item')?>" class="btn btn-danger waves-effect" type="submit">Batal</a>
                            <button class="btn btn-primary waves-effect" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Validation -->
        </form>
    </div>
</section>
