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
                           <!--  <ul class="header-dropdown m-r--5">
                                 <li class="dropdown">
                                    <div class="button" style="margin-top: -17px">
                                        <a href="<?=base_url('admin/item/cetak')?>" class="btn  bg-green btn-circle-lg waves-effect waves-circle waves-float" data-toggle="modal" ><i class="material-icons">print</i></a>
                                    </div>
                                </li>
                            </ul> -->
                        </div>
                        <?php 
                            if (!$allow_approved) {
                                $url = base_url('user/suplier/multipel_supplier/1');
                            }
                            else {
                                $url = base_url('user/suplier/multipel_supplier');   
                            }
                        ?>
                        <form action="<?=$url?>" method="post">
                        <div class="body">
                             <div class="row">
                                <div class="col-md-12">
                                    <!-- <?php if($allow_approved) : ?>
                                        <input style="padding: 5px" type="submit" name="setuju" value="Setujui" class="btn btn-success ">
                                    <?php endif ?>
                                    <input style="padding: 5px" name="tidak" value="Tidak Setuju" type="submit" class="btn btn-danger ">
                                    <input style="padding: 5px" name="cetak" value="Cetak"  type="submit" class="btn bg-pink "> -->
                                </div>
                            </div>
                            <div class="">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <!-- <th></th> -->
                                            <th>Status by Admin</th>
                                            <th>Status by Finance</th>
                                            <th>Status by Procurement</th>
                                            <th>Nama Requester</th>
                                            <th>Asal SBU</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <!-- <th></th> -->
                                            <th>Status by Admin</th>
                                            <th>Status by Finance</th>
                                            <th>Status by Procurement</th>
                                            <th>Nama Requester</th>
                                            <th>Asal SBU</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                   <?php $no=1;$ik=1;$ip=1;
                                        foreach($item as $i){
                                    ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <!-- <td>
                                                <input type="checkbox" id="basic_checkbox_<?=$ik++?>" name="item[]" value="<?=$i->id_item?>" class="filled-in">
                                                <label for="basic_checkbox_<?=$ip++?>"></label>
                                                </form>
                                            </td> -->
                                            <td>
                                                    <?php if ($i->status=='1') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                         <?php } ?>
                                                         <?php if ($i->status=='0') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                         <?php } ?>
                                                          <?php if ($i->status=='2') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                         <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($i->status_finance=='1') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                         <?php } ?>
                                                         <?php if ($i->status_finance=='0') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                         <?php } ?>
                                                          <?php if ($i->status_finance=='2') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                         <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($i->status_procurement=='1') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-success ">DISETUJUI</button>
                                                         <?php } ?>
                                                         <?php if ($i->status_procurement=='0') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-warning ">PROGRES</button>
                                                         <?php } ?>
                                                          <?php if ($i->status_procurement=='2') { ?>
                                                         <button style=" padding : 5px !important" href="" type="button" class="btn btn-danger ">TIDAK DISETUJUI</button>
                                                         <?php } ?>
                                                </td>
                                                <td>
                                                    <?= $i->nama_re ?>
                                                </td>
                                                <td>
                                                    <?= $i->asal_sbu ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('user/suplier/detailItem/'.$i->id_item) ?>" class="btn btn-success ">
                                                        Detail
                                                    </a>
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
<script type="text/javascript">
     function time() {
        $("#message").fadeOut();
        }
     setInterval(time,5000);
</script>