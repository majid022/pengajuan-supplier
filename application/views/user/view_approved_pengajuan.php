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
                             DATA APPROVAL PENGAJUAN SUPPLIER
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                 <li class="dropdown">
                                    <div class="button" style="margin-top: -17px">
                                        <!-- <a href="<?=base_url('user/approval/tambah')?>" class="btn  bg-green btn-circle-lg waves-effect waves-circle waves-float" data-toggle="modal" ><i class="material-icons">add</i></a> -->
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Status by Admin</th>
                                            <th>Status by Finance</th>
                                            <th>Status by Procurement</th>
                                            <th>Nama Requester</th>
                                            <th>Asal SBU</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Kategori Supplier</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>Status by Admin</th>
                                            <th>Status by Finance</th>
                                            <th>Status by Procurement</th>
                                            <th>Nama Requester</th>
                                            <th>Asal SBU</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Kategori Supplier</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pengajuan as $key) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td>
                                                    <?php if ($key->status=='1') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                         <?php } ?>
                                                         <?php if ($key->status=='0') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                         <?php } ?>
                                                          <?php if ($key->status=='2') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                         <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($key->status_finance=='1') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                         <?php } ?>
                                                         <?php if ($key->status_finance=='0') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                         <?php } ?>
                                                          <?php if ($key->status_finance=='2') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                         <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($key->status_procurement=='1') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                         <?php } ?>
                                                         <?php if ($key->status_procurement=='0') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                         <?php } ?>
                                                          <?php if ($key->status_procurement=='2') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                         <?php } ?>
                                                </td>
                                                <td>
                                                    <?= $key->nama_requester ?>
                                                </td>
                                                <td>
                                                    <?= $key->asal_sbu ?>
                                                </td>
                                                <td>
                                                    <?= $key->tgl_pembuatan ?>
                                                </td>
                                                <td>
                                                    <?= $key->kategori ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('user/approval/detailSuplier/'.$key->id_pengajuan) ?>" class="btn btn-success ">
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i++; ?>
                                        <?php endforeach ?>
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
