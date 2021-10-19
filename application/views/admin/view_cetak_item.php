<?php
header("Content-type: application/vnd-ms-excel");
$tgl=date("d/m/Y h:i:s");
header("Content-Disposition: attachment; filename=data_item-$tgl.xls");
?>

<h3 align="center">DATA PENGAJUAN ITEM</h3>
    
<table border="1" cellpadding="5">
  <thead>
    <tr style="background-color: green">
      <th width="50">NO</th>
      <th width="200">NAMA REQUESTER</th>
      <th width="200">Asal SBU</th>
      <th width="100">TANGGAL PENGAJUAN</th>
      <th width="200">DESKRIPSI ITEM</th>
      <th width="200">JENIS ITEM</th>
      <th width="100">SATUAN</th>
      <th width="100">HARGA ITEM</th>
      <th width="150">DESKRIPSI COA</th>
      <th width="200">COA</th>
      <th width="100">JENIS ITEM COA</th>
    </tr>
  </thead>
  <tbody>
  <?php $no=1; ?>
  <?php
  foreach ($item as $p) {
    $nama_re      = strtoupper($p->nama_re);
    $asal_sbu     = strtoupper($p->asal_sbu);
    $des_item     = strtoupper($p->des_item);
  ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $nama_re ?></td>
      <td><?php echo $asal_sbu ?></td>
      <td><?php echo $p->tgl_pe ?></td>
      <td><?php echo $des_item ?></td>
      <td><?php echo $p->jenis_item ?></td>
      <td><?php echo $p->satuan ?></td>
      <td><?php echo $p->harga ?></td>
      <td><?php echo $p->nama_account ?></td>
      <td><?php echo $p->coa ?></td>
      <td><?php echo $p->jenis_item_coa ?></td>
    </tr>
  <?php } 

  ?>
  </tbody>
</table> 