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
                        </div>
                        <form action="<?=base_url('user/approval/approve_multi')?>" method="post">
                        <div class="body">
                            <?php if($allow_approved) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input style="padding: 5px" type="submit" name="setuju" value="Setujui" class="btn btn-success ">
                                    </div>
                                </div>
                            <?php endif ?>
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
                                                <?php if($allow_approved && $s->status == '0') : ?>
                                                    <input type="checkbox" id="basic_checkbox_<?=$ak++?>" name="pengajuan[]" value="<?=$s->id_pengajuan?>" class="filled-in">
                                                    <label for="basic_checkbox_<?=$ik++?>"></label>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?php if ($s->status=='1') : ?>
                                                    <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI
                                                    </button>

                                                <?php elseif($s->status == '0') : ?>
                                                    <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                <?php elseif($s->status == '2') : ?>
                                                    <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                <?php endif ?>
                                            </td>
                                            <td><?=strtoupper($s->nama_requester)?></td>
                                            <td><?=strtoupper($s->asal_sbu)?></td>
                                            <td><?=$s->tgl_pembuatan?></td>
                                            <td><?=strtoupper($s->kategori_nama )?></td>
                                            <td><?=strtoupper($s->alternate )?></td>
                                            <td><?=strtoupper($s->nama_suplier) ?></td>
                                            <td align="center">
                                                <a href="<?=base_url('user/approval/detail/'.$s->id_pengajuan)?>" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float">
                                                   <i class="material-icons">edit</i>
                                               </a>
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
</script>