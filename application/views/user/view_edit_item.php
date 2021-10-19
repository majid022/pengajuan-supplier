<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>EDIT PENGAJUAN ITEM</h2>
                        <ul class="header-dropdown m-r--5">
                            <div class="button" style="margin-top: -17px">
                                <a href="<?=base_url('user/item')?>" class="btn  bg-red btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">keyboard_backspace</i></a>
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
                        <table width="100%" border="1" style="text-align: center;" >
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
                                <td colspan="2">E-FORM PENGAJUAN MASTER DATA ITEM</td>
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
        <form id="form_advanced_validation" action="<?=base_url('user/item/aksi_update')?>" method="POST" enctype="multipart/form-data">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="text-align: center;">
                            <h2>FORM PENGAJUAN ITEM BARU</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-4">
                                     <label class="form-label">Nama requester<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="hidden" value="<?=$item->id_item?>" class="form-control" name="id_item" required>
                                            <input type="text" value="<?=$item->nama_re?>" class="form-control" name="nama_re" required style="text-transform: uppercase;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Asal SBU<small> *</small></label>
                                      <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="asal_sbu" class="form-control show-tick">
                                                <option value="">-- Pilih SBU --</option>
                                                <?php foreach($sbu as $s){?>
                                                <option value="<?=$s->nama_sbu?>" <?php if ($s->nama_sbu == $item->asal_sbu)  echo "selected" ?>><?=$s->nama_sbu?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                   <label class="form-label">Tanggal Pengajuan<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input type="date" value="<?=$item->tgl_pe?>" class="form-control" placeholder="Ex: 30/07/2016" name="tgl_pen">
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
                                             <input name="sign1" style="text-transform: uppercase;" value="<?=$item->sign1?>" required="" type="text" class="form-control" placeholder="Masukkan Nama Lengkap">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="sign2" style="text-transform: uppercase;" value="<?=$item->sign2?>" required="" type="text" class="form-control" placeholder="Masukkan Nama Lengkap">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="sign3" style="text-transform: uppercase;" value="<?=$item->sign3?>" required="" type="text" class="form-control" placeholder="Masukkan Nama Lengkap">
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
                                             <input name="pos1" style="text-transform: uppercase;" value="<?=$item->pos1?>" required="" type="text" class="form-control" placeholder="Masukkan Nama Jabatan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="pos2" style="text-transform: uppercase;" value="<?=$item->pos2?>" required="" type="text" class="form-control" placeholder="Masukkan Nama Jabatan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="pos3" style="text-transform: uppercase;" value="<?=$item->pos3?>" required="" type="text" class="form-control" placeholder="Masukkan Nama Jabatan">
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
                                             <input name="sig1" style="text-transform: uppercase;" value="<?=$item->sig1?>" type="text" class="form-control" placeholder="Tanda Tangan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="sig2" style="text-transform: uppercase;" value="<?=$item->sig2?>" type="text" class="form-control" placeholder="Tanda Tangan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="sig3" style="text-transform: uppercase;" value="<?=$item->sig3?>" type="text" class="form-control" placeholder="Tanda Tangan">
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
                                             <input name="dos1" value="<?=$item->dos1?>" required="" type="date" class="form-control" placeholder="Tanda Tangan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="dos2" value="<?=$item->dos2?>" required="" type="date" class="form-control" placeholder="Tanda Tangan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input name="dos3" value="<?=$item->dos3?>" required="" type="date" class="form-control" placeholder="Tanda Tangan">
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
                            <h2>ITEM PROFILE</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-6">
                                     <label class="form-label">Deskripsi Item<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input value="<?=$item->des_item?>" name="des_item" id="" type="text" class="form-control"  required placeholder="Masukkan Deskripsi Item" style="text-transform: uppercase;">
                                        </div>
                                    </div>
                                    <label class="form-label">Jenis Item<small> *</small></label>
                                      <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="jenis_item" id="kategori" class="form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih Item --</option>
                                                <option value="MATERIAL" <?php if ('MATERIAL' == $item->jenis_item)  echo "selected" ?>>MATERIAL</option>
                                                <option value="JASA" <?php if ('JASA' == $item->jenis_item)  echo "selected" ?>>JASA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <label class="form-label">Jenis Satuan<small> *</small></label>
                                      <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="satuan" class="form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih Satuan --</option>
                                                <?php foreach($satuan as $sa){?>
                                                <option value="<?=$sa->nama_uom?>" <?php if ($sa->nama_uom == $item->satuan)  echo "selected" ?>><?=$sa->nama_uom?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <label class="form-label">Harga Item<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" value="<?=$item->harga?>" class="form-control" name="harga" maxlength="20" minlength="3" required placeholder="Masukkan Harga Item" style="text-transform: uppercase;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Deskripsi COA<small> *</small></label>
                                      <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="des_coa" id="des_coa" class="form-control show-tick" data-size="10" data-live-search="true">
                                                <option value="">-- Pilih Deskripsi Coa --</option>
                                                <?php foreach($des_coa as $c){?>
                                                    <option value="<?=$c->kode_account?>"  <?php if ($c->kode_account == $item->des_coa)  echo "selected" ?>><?=$c->nama_account?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <label class="form-label">COA<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="kode_account" value="<?=$item->coa?>"  maxlength="20" id="kode_account" minlength="3" readonly="" required placeholder="Otomatis terisi" style="text-transform: uppercase;">
                                        </div>
                                    </div>
                                    <label class="form-label">Jenis Item<small> *</small></label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="jenis_item_coa" value="<?=$item->jenis_item_coa?>" id="jenis_item_coa" maxlength="20" minlength="3" readonly="" required placeholder="Otomatis terisi" style="text-transform: uppercase;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-danger waves-effect" href="<?=base_url('user/item')?>">Batal</a>
                            <button class="btn btn-primary waves-effect" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script type="text/javascript">

    $(document).ready(function(){
        $('#des_coa').change(function(){
            var id = $(this).val();
            $.ajax({
                url  : '<?=base_url('user/item/get_account/')?>'+id,
                type : 'GET',
                datatype : 'JSON',
                success :function(data){
                    var a = JSON.parse(data);
                    if(a.respon.execute){
                        $('#kode_account').val(a.respon.message.kode_account);
                        var code_acount =  String(a.respon.message.kode_account);
                        if(code_acount.length>=2){
                            var jens = code_acount[0]+''+code_acount[1];
                            console.log(jens);
                            if (jens=='11') 
                            {
                                $('#jenis_item_coa').val("LAINNYA");
                            }
                            else if(jens='6') 
                            {
                                $('#jenis_item_coa').val("OPEX");
                            }else if(jens='5') 
                            {
                                $('#jenis_item_coa').val("HPP");
                            }else if(jens='15') 
                            {
                                $('#jenis_item_coa').val("CAPEX");
                            }
                            else if(jens='13') 
                            {
                                $('#jenis_item_coa').val("INVENTORY");
                            }
                            else
                            {
                                  $('#jenis_item_coa').val("LAINNYA");
                            }
                        }
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

</script>