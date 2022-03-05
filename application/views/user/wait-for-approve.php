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
                        <?php 
                            if (!$allow_approved) {
                                $url = base_url('user/approval/approve_multi/1');
                            }
                            else {
                                $url = base_url('user/approval/approve_multi');   
                            }
                        ?>
                        <form action="<?=$url?>" method="post">
                        <div class="body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if($allow_approved) : ?>
                                            <input style="padding: 5px" type="submit" name="setuju" value="Setujui" class="btn btn-success ">
                                        <?php endif ?>
                                        <input style="padding: 5px" name="tidak" value="Tidak Setuju" type="submit" class="btn btn-danger ">
                                    </div>
                                </div>
                            <div class="">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th></th>
                                            <th>Status by Admin</th>
                                            <th>Status by Procurement</th>
                                            <th>Status by Finance</th>
                                            <th>Nama Requester</th>
                                            <th>Asal SBU</th>
                                            <th>Kategori Supplier</th>
                                            <th>Detail</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th></th>
                                            <th>Status by Admin</th>
                                            <th>Status by Procurement</th>
                                            <th>Status by Finance</th>
                                            <th>Nama Requester</th>
                                            <th>Asal SBU</th>
                                            <th>Kategori Supplier</th>
                                            <th>Detail</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $no=1;
                                    $ik=1;
                                    $ip=1;
                                        foreach($suplier as $s){
                                    ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td>
                                                <input type="checkbox" id="basic_checkbox_<?=$ik++?>" name="pengajuan[]" value="<?=$s->id_pengajuan?>" class="filled-in">
                                                <label for="basic_checkbox_<?=$ip++?>"></label>
                                                </form>
                                            </td>
                                                <td>
                                                    <?php if ($s->status_finance=='1') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                         <?php } ?>
                                                         <?php if ($s->status_finance=='0') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                         <?php } ?>
                                                          <?php if ($s->status_finance=='2') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                         <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($s->status=='1') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                         <?php } ?>
                                                         <?php if ($s->status=='0') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                         <?php } ?>
                                                          <?php if ($s->status=='2') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                         <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($s->status_procurement=='1') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                         <?php } ?>
                                                         <?php if ($s->status_procurement=='0') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                         <?php } ?>
                                                          <?php if ($s->status_procurement=='2') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                         <?php } ?>
                                                </td>
                                                <td>
                                                    <?= $s->nama_requester ?>
                                                </td>
                                                <td>
                                                    <?= $s->asal_sbu ?>
                                                </td>
                                                <td>
                                                    <?= $s->kategori ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('user/suplier/detailSuplier/'.$s->id_pengajuan) ?>" class="btn btn-success ">
                                                        Detail
                                                    </a>
                                                </td>
                                                <td></td>
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