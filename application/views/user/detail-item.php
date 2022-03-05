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
                                    <?= ucwords(strtolower($model->nama_re)) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Asal SBU</th>
                                <td>
                                    <?= $model->asal_sbu ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengajuan</th>
                                <td>
                                    <?= $model->tgl_pe ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi ITEM</th>
                                <td>
                                    <?= $model->des_item ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis ITEM</th>
                                <td>
                                    <?= $model->jenis_item ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Satuan</th>
                                <td>
                                    <?= $model->satuan ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Harga ITEM</th>
                                <td>
                                    Rp. <?=$model->harga ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi COA</th>
                                <td>
                                    <?= $model->nama_account ?>
                                </td>
                            </tr>
                            <tr>
                                <th>COA</th>
                                <td>
                                    <?= $model->coa ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis ITEM COA</th>
                                <td>
                                    <?= $model->jenis_item_coa ?>
                                </td>
                            </tr>
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