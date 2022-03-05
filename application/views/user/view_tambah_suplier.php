<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>TAMBAH PENGAJUAN SUPPLIER</h2>
                        <ul class="header-dropdown m-r--5">
                            <div class="button" style="margin-top: -17px">
                                <a href="<?=base_url('user/suplier')?>" class="btn  bg-red btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">keyboard_backspace</i></a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body table-responsive">
                        <table width="100%" border="1" style="text-align: center; " >
                            <tr>
                                <td><b>SUMBER INFORMASI</b></td>
                                <td><b>AUTHORIZED</b></td>
                                <td rowspan="2">
                                    <img src="<?php echo base_url('assets/images/logokalla.png')?>" height="120px" width="250px"
                                </td>
                            </tr>
                            <tr>
                                <td>INTEGRATED SYSTEM AND CHANGE MANAGEMENT DIVISION</td>
                                <td>MASTER DATA ANALYST</td>
                            </tr>
                            <tr>
                                <td colspan="2">INTEGRATED SYSTEM DEPARTMENT</td>
                                <td rowspan="3"><b>PT HAKA SARANA INVESTAMA</b></td>
                            </tr>
                            <tr>
                                <td colspan="2">E-FORM PENGAJUAN MASTER DATA SUPPLIER</td>
                            </tr>
                            <tr>
                                <td><b>TANGGAL BERLAKU : 30 MEI 2019</b></td>
                                <td><b>Versi 2</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation -->
        <!-- Advanced Validation -->
        <form id="form_advanced_validation" action="<?=base_url('user/suplier/aksi_tambah')?>" enctype="multipart/form-data" method="POST">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="text-align: center;">
                            <h2>FORM PENGAJUAN SUPPLIER</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-4">
                                     <label class="form-label">Nama requester<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" style="text-transform: uppercase;" class="form-control" name="nama_requester" placeholder="Masukkan Nama Requester" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Asal SBU<small> *</small></label>
                                      <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="asal_sbu"  class="form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih SBU --</option>
                                                <?php foreach($sbu as $s){?>
                                                <option value="<?=$s->nama_sbu?>"><?=$s->nama_sbu?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                   <label class="form-label">Tanggal Pengajuan<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="date" class="form-control" placeholder="Ex: 30/07/2016" name="tgl_pengajuan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                     <label class="form-label">Sign By<small> *</small></label>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="sign1" style="text-transform: uppercase;" required="" type="text" class="form-control" placeholder="Masukkan Nama Lengkap">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="sign2" style="text-transform: uppercase;" required="" type="text" class="form-control" placeholder="Masukkan Nama Lengkap">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="sign3" style="text-transform: uppercase;" required="" type="text" class="form-control" placeholder="Masukkan Nama Lengkap">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                     <label class="form-label">Posision<small> *</small></label>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="pos1" style="text-transform: uppercase;" required="" type="text" class="form-control" placeholder="Masukkan Nama Jabatan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="pos2" style="text-transform: uppercase;" required="" type="text" class="form-control" placeholder="Masukkan Nama Jabatan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="pos3" style="text-transform: uppercase;" required="" type="text" class="form-control" placeholder="Masukkan Nama Jabatan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                     <label class="form-label">Signature<small> *</small></label>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="sig1" style="text-transform: uppercase;" type="text" class="form-control" placeholder="Tanda Tangan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="sig2" style="text-transform: uppercase;" type="text" class="form-control" placeholder="Tanda Tangan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="sig3" style="text-transform: uppercase;" type="text" class="form-control" placeholder="Tanda Tangan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                     <label class="form-label">Date Of Sign<small> *</small></label>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="dos1" required="" type="date" class="form-control" placeholder="Tanda Tangan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="dos2" required="" type="date" class="form-control" placeholder="Tanda Tangan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="dos3" required="" type="date" class="form-control" placeholder="Tanda Tangan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Validation -->
           <!-- Advanced Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="text-align: center;">
                            <h2>DATA SUPPLIER</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-label">Kategori Supplier<small> *</small></label>
                                      <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="kategori" id="kategori" class="form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih Kategori --</option>
                                                <?php foreach($kategori as $k){?>
                                                <option value="<?=$k->id_kategori?>"><?=$k->kategori_nama?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <label class="form-label">Alternate Name<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input id="alternate" style="text-transform: uppercase;" name="alternate" type="text" class="form-control"  readonly="" required placeholder="Otomatis terisi ">
                                        </div>
                                    </div>
                                     <label class="form-label">Jenis Usaha<small> *</small></label>
                                      <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="usaha" id="usaha" class="form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih Jenis Usaha --</option>
                                                <?php foreach($usaha as $u){?>
                                                <option value="<?=$u->kode_usaha?>"><?=$u->jenis_usaha?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <label class="form-label">Kode Usaha<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input id="kode_usaha" style="text-transform: uppercase;" name="kode_usaha" type="text" class="form-control"  readonly="" required placeholder="Otomatis terisi ">
                                        </div>
                                    </div>
                                    <label class="form-label">Masukkan Nama Supplier<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="nama_suplier" style="text-transform: uppercase;" type="text" class="form-control"  maxlength="20" minlength="3" required placeholder="Masukkan Nama Supplier">
                                        </div>
                                        <div class="help-info">Min. 3 characters</div>
                                    </div>
                                    <label class="form-label">Masukkan Nomor KTP<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="nomor_ktp" type="text" class="form-control"  maxlength="16" minlength="16" required placeholder="Masukkan Nomor KTP">
                                        </div>
                                        <div class="help-info">16 Digit</div>
                                    </div>
                                    <label class="form-label">Masukkan Nomor NPWP<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="nomor_npwp" type="text" class="form-control"  maxlength="15" minlength="15" required placeholder="Masukkan Nomor NPWP">
                                        </div>
                                        <div class="help-info">15 Digit</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Alamat Lengkap<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="alamat" style="text-transform: uppercase;" type="text" class="form-control"   minlength="3" required placeholder="Otomatis Terisi" readonly="">
                                        </div>
                                    </div>
                                    <label class="form-label">Nama Gedung<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="nama_gedung" id="nama_gedung" style="text-transform: uppercase;" type="text" class="nama_gedung form-control"  required placeholder="Masukkan Nama Gedung ">
                                        </div>
                                        <div class="help-info">Jika Kosong isi -</div>
                                    </div>
                                     <label class="form-label">Nama Jalan<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="nama_jalan" style="text-transform: uppercase;" type="text" class="nama_jalan form-control"  required placeholder="Masukkan Nama Jalan ">
                                        </div>
                                    </div>
                                    <label class="form-label">Kelurahan<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="kel" style="text-transform: uppercase;" type="text" class="kel form-control"  required placeholder="Masukkan Nama Kelurahan ">
                                        </div>
                                        <div class="help-info">Jika Kosong isi -</div>
                                    </div>
                                    <label class="form-label">Kecamatan<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="kec" style="text-transform: uppercase;" type="text" class="kec form-control"  required placeholder="Masukkan Nama Kecamatan ">
                                        </div>
                                        <div class="help-info">Jika Kosong isi -</div>
                                    </div>
                                    <label class="form-label">Kota<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="kota" style="text-transform: uppercase;" type="text" class="kota form-control"  required placeholder="Masukkan Nama Kota ">
                                        </div>
                                    </div>
                                    <label class="form-label">Kode Pos<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="kode_pos" style="text-transform: uppercase;"  type="text" class="kode_pos form-control"  required placeholder="Masukkan Nama Kode Pos ">
                                        </div>
                                        <div class="help-info">Jika Kosong isi -</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="text-align: center;">
                            <h2>KONTAK PERSON</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-label">Nama<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="nama_kontak" type="text" class="nama_kontak form-control " style="text-transform: uppercase;" required placeholder="Masukkan Nama ">
                                        </div>
                                    </div>
                                    <label class="form-label">Nomor Kantor<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="nomor_kantor"  type="text" class="form-control" style="text-transform: uppercase;" maxlength="10" minlength="6" required placeholder="Masukkan Nomor Kantor">
                                        </div>
                                        <div class="help-info">Min. 6 & Max 10 characters</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Nomor Handphone<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="nomor_hanphone" type="number" class="form-control" maxlength="13" minlength="11" style="text-transform: uppercase;" required placeholder="Masukkan Nomor Handphone ">
                                        </div>
                                        <div class="help-info">Min. 11 & Max. 13 characters</div>
                                    </div>
                                    <label class="form-label">Email<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="email" style="text-transform: uppercase;" type="email" class="form-control"  required placeholder="Masukkan Nama Email ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="text-align: center;">
                            <h2>LIABILITY DISTRIBUTION</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="form-label">Comppany<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select id="company"  name="company" class=" form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih Company --</option>
                                                <?php foreach($company as $c){?>
                                                <option value="<?=$c->kode_company?>"><?=$c->nama_company?></option>
                                                <?php }?>
                                            </select>
                                            <input id="kode_company" name="company" type="text" class="form-control" required readonly="" placeholder="Otomatis Terisi">
                                        </div>
                                    </div>
                                    <label class="form-label">Departement<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="nama_departement" id="nama_departement" class="form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih Departement --</option>
                                                 <?php foreach($departement as $d){?>
                                                 <option value="<?=$d->kode_departement?>"><?=$d->nama_departement?></option>
                                                <?php }?>
                                            </select>
                                            <input id="kode_departement" name="departement" type="text" class="form-control"  required readonly="" placeholder="Otomatis Terisi">
                                        </div>
                                    </div>
                                    <label class="form-label">Intercompany<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="nama_intercompany" id="nama_intercompany" class="form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih Intercompany --</option>
                                                <?php foreach($intercompany as $i){?>
                                                 <option value="<?=$i->kode_intercompany?>"><?=$i->nama_intercompany?></option>
                                                <?php }?>
                                            </select>
                                            <input id="kode_intercompany" name="intercompany" type="text" class="form-control"  required readonly="" placeholder="Otomatis Terisi">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Product<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="nama_produk" id="nama_produk" class="form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih Product --</option>
                                                <?php foreach($produk as $p){?>
                                                <option value="<?=$p->kode_produk?>"><?=$p->nama_produk?></option>
                                                <?php }?>
                                            </select>
                                            <input name="produk" id="kode_produk" type="text" class="form-control"  required readonly="" placeholder="Otomatis Terisi">
                                        </div>
                                    </div>
                                    <label class="form-label">Account<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="nama_account" id="nama_account" class="form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih Account --</option>
                                                <?php foreach($account as $ca){?>
                                                <option value="<?=$ca->kode_account?>"><?=$ca->nama_account?></option>
                                                <?php }?>
                                            </select>
                                            <input name="account" id="kode_account" type="text" class="form-control"  required readonly="" placeholder="Otomatis Terisi">
                                        </div>
                                    </div>
                                    <label class="form-label">Future<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="nama_future" id="nama_future" class="form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih Future --</option>
                                                 <?php foreach($future as $f){?>
                                                 <option value="<?=$f->kode_future?>"><?=$f->nama_future?></option>
                                                <?php }?>
                                            </select>
                                            <input id="kode_future" name="future" type="text" class="form-control"  required readonly="" placeholder="Otomatis Terisi">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Location<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="nama_location" id="nama_location" class="form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih Location --</option>
                                                <?php foreach($location as $lo){?>
                                                 <option value="<?=$lo->kode_location?>"><?=$lo->nama_location?></option>
                                                <?php }?>
                                            </select>
                                            <input id="kode_location" name="location" type="text" class="form-control"  required readonly="" placeholder="Otomatis Terisi">
                                        </div>
                                    </div>
                                    <label class="form-label">Project<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select id="nama_project" name="nama_project" class="form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih Project --</option>
                                                <?php foreach($project as $po){?>
                                                 <option value="<?=$po->kode_project?>"><?=$po->nama_project?></option>
                                                <?php }?>
                                            </select>
                                            <input id="kode_project" name="project"  type="text" class="form-control" required readonly="" placeholder="Otomatis Terisi">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a id="tekan">GENERATE LIABILITY DISTRIBUTION</a>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input name="liability" id="liability" type="text" class="form-control" required readonly="" placeholder="Setelah Melengkapi Data Maka Liability Distribution Otomatis Terisi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-danger waves-effect" href="<?=base_url('user/suplier')?>">Batal</a>
                            <button class="btn btn-primary waves-effect" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script type="text/javascript">

    function generate_alamat() {
        $('input[name=alamat]').val('');
        var nama_gedung = '';
        var nama_jalan = '';
        var kel = '';
        var kec = '';
        var kota = '';
        var kode_pos = '';
        if ($('.nama_gedung').val() != '' && $('.nama_gedung').val() != '-') {
            nama_gedung = $('.nama_gedung').val()+', ';
        }
        if ($('.nama_jalan').val() != '' && $('.nama_jalan').val() != '-' )  {
            nama_jalan = $('.nama_jalan').val()+', ';
        }
        if ($('.kel').val() != '' && $('.kel').val() != '-')  {
            kel = $('.kel').val()+', ';
        }
        if ($('.kec').val() != '' && $('.kec').val() != '-')  {
            kec = $('.kec').val()+', ';
        }
        if ($('.kota').val() != '' && $('.kota').val() != '-')  {
            kota = $('.kota').val()+', ';
        }
        if ($('.kode_pos').val() != '' && $('.kode_pos').val() != '-') {
            kode_pos = $('.kode_pos').val();
        }
        $('input[name=alamat]').val(nama_gedung+nama_jalan+kel+kec+kota+kode_pos);
    }

    $(document).ready(function(){
        $('#kategori').change(function(){
            var id = $(this).val();
            $.ajax({
                url  : '<?=base_url('user/suplier/get_alternate/')?>'+id,
                type : 'GET',
                datatype : 'JSON',
                success :function(data){
                    var a = JSON.parse(data);
                    if(a.respon.execute){
                        $('#alternate').val(a.respon.message.alternate)
                    }
                    else{
                        alert(a.respon.message);
                    }
                },
                error : function(data,h,k){
                    alert('not');
                }
            })
        });
        $('input[name=nama_gedung]').on('blur',function(){
            generate_alamat();
        })
        $('input[name=nama_jalan]').on('blur',function(){
            generate_alamat();
        })
        $('input[name=kel]').on('blur',function() {
            generate_alamat();
        });
        $('input[name=kec]').on('blur',function() {
            generate_alamat();
        });
        $('input[name=kota]').on('blur',function() {
            generate_alamat();
        });
        $('input[name=kode_pos]').on('blur',function() {
            generate_alamat();
        });
      
    })
    $(document).ready(function(){
        $('#company').change(function(){
            var id = $(this).val();
            $.ajax({
                url  : '<?=base_url('user/suplier/get_company/')?>'+id,
                type : 'GET',
                datatype : 'JSON',
                success :function(data){
                    var a = JSON.parse(data);
                    if(a.respon.execute){
                        $('#kode_company').val(a.respon.message.kode_company)
                    }
                    else{
                        alert(a.respon.message);
                    }
                },
                error : function(data,h,k){
                    alert('not');
                }
            })
        })
    })
    $(document).ready(function(){
        $('#nama_produk').change(function(){
            var id = $(this).val();
            $.ajax({
                url  : '<?=base_url('user/suplier/get_produk/')?>'+id,
                type : 'GET',
                datatype : 'JSON',
                success :function(data){
                    var a = JSON.parse(data);
                    if(a.respon.execute){
                        $('#kode_produk').val(a.respon.message.kode_produk)
                    }
                    else{
                        alert(a.respon.message);
                    }
                },
                error : function(data,h,k){
                    alert('not');
                }
            })
        })
    })
    $(document).ready(function(){
        $('#nama_location').change(function(){
            var id = $(this).val();
            $.ajax({
                url  : '<?=base_url('user/suplier/get_location/')?>'+id,
                type : 'GET',
                datatype : 'JSON',
                success :function(data){
                    var a = JSON.parse(data);
                    if(a.respon.execute){
                        $('#kode_location').val(a.respon.message.kode_location)
                    }
                    else{
                        alert(a.respon.message);
                    }
                },
                error : function(data,h,k){
                    alert('not');
                }
            })
        })
    })
    $(document).ready(function(){
        $('#nama_departement').change(function(){
            var id = $(this).val();
            $.ajax({
                url  : '<?=base_url('user/suplier/get_departement/')?>'+id,
                type : 'GET',
                datatype : 'JSON',
                success :function(data){
                    var a = JSON.parse(data);
                    if(a.respon.execute){
                        $('#kode_departement').val(a.respon.message.kode_departement)
                    }
                    else{
                        alert(a.respon.message);
                    }
                },
                error : function(data,h,k){
                    alert('not');
                }
            })
        })
    })
    $(document).ready(function(){
        $('#nama_account').change(function(){
            var id = $(this).val();
            $.ajax({
                url  : '<?=base_url('user/suplier/get_account/')?>'+id,
                type : 'GET',
                datatype : 'JSON',
                success :function(data){
                    var a = JSON.parse(data);
                    if(a.respon.execute){
                        $('#kode_account').val(a.respon.message.kode_account)
                    }
                    else{
                        alert(a.respon.message);
                    }
                },
                error : function(data,h,k){
                    alert('not');
                }
            })
        })
        $('#usaha').change(function(){
            var id = $(this).val();
            $.ajax({
                url  : '<?=base_url('user/suplier/get_usaha/')?>'+id,
                type : 'GET',
                datatype : 'JSON',
                success :function(data){
                    var a = JSON.parse(data);
                    if(a.respon.execute){
                        $('#kode_usaha').val(a.respon.message.kode_usaha)
                    }
                    else{
                        alert(a.respon.message);
                    }
                },
                error : function(data,h,k){
                    alert('not');
                }
            })
        })
    })
    $(document).ready(function(){
        $('#nama_project').change(function(){
            var id = $(this).val();
            $.ajax({
                url  : '<?=base_url('user/suplier/get_project/')?>'+id,
                type : 'GET',
                datatype : 'JSON',
                success :function(data){
                    var a = JSON.parse(data);
                    if(a.respon.execute){
                        $('#kode_project').val(a.respon.message.kode_project)
                    }
                    else{
                        alert(a.respon.message);
                    }
                },
                error : function(data,h,k){
                    alert('not');
                }
            })
        })
    })
     $(document).ready(function(){
        $('#nama_intercompany').change(function(){
            var id = $(this).val();
            $.ajax({
                url  : '<?=base_url('user/suplier/get_intercompany/')?>'+id,
                type : 'GET',
                datatype : 'JSON',
                success :function(data){
                    var a = JSON.parse(data);
                    if(a.respon.execute){
                        $('#kode_intercompany').val(a.respon.message.kode_intercompany)
                    }
                    else{
                        alert(a.respon.message);
                    }
                },
                error : function(data,h,k){
                    alert('not');
                }
            })
        })
    })
    $(document).ready(function(){
        $('#nama_future').change(function(){
            var id = $(this).val();
            $.ajax({
                url  : '<?=base_url('user/suplier/get_future/')?>'+id,
                type : 'GET',
                datatype : 'JSON',
                success :function(data){
                    var a = JSON.parse(data);
                    if(a.respon.execute){
                        $('#kode_future').val(a.respon.message.kode_future)
                    }
                    else{
                        alert(a.respon.message);
                    }
                },
                error : function(data,h,k){
                    alert('not');
                }
            })
        })
        $('#tekan').click(function(){
            var liability = $('#kode_company').val() +'.'+ $('#kode_produk').val() +'.'+ $('#kode_location').val() +'.'+ $('#kode_departement').val() +'.'+ $('#kode_account').val() +'.'+ $('#kode_project').val() +'.'+ $('#kode_intercompany').val() +'.'+ $('#kode_future').val() ;
            $('input[name=liability]').val(liability)
        })
    })
     
</script>