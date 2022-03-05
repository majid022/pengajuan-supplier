 <section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><?= $lisa['title_h'] ?></h2>
                    </div>
                    <div class="body">
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
                        <?php if($this->session->sidebar == 'admin') { ?>
                            <a href="javascript:window.history.back();" class="btn btn-primary">Kembali</a>
                        <?php } else { ?>
                            <a href="javascript:window.history.back();" class="btn btn-primary">Kembali</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
