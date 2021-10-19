<?php
header("Content-type: application/vnd-ms-excel");
$tgl=date("d/m/Y h:i:s");
header("Content-Disposition: attachment; filename=data_pengajuan-$tgl.xls");

?>

<h3 align="center">DATA PENGAJUAN SUPPLIER</h3>
    
<table border="1" cellpadding="5">
  <thead>
    <tr style="background-color: yellow">
      <th width="50">No</th>
      <th width="200">Nama Requester</th>
      <th width="200">Asal SBU</th>
      <th width="100">Tanggal Pengajuan</th>
      <th width="300">Kategori Supplier</th>
      <th width="200">Alternate Name</th>
      <th width="100">Nama Supplier</th>
      <th width="150">Nomor KTP</th>
      <th width="150">Nomor NPWP</th>
      <th width="350">Alamat</th>
      <th width="150">Nama</th>
      <th width="200">Nomor Telephone kantor</th>
      <th width="200">Nomor Telephone</th>
      <th width="200">Email</th>
      <th width="300">Nomor lialibity</th>
    </tr>
  </thead>
  <tbody>
  <?php $no=1; ?>
  <?php
    foreach ($pengajuan as $p) {

        ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo strtoupper($p->nama_requester )?></td>
          <td><?php echo strtoupper($p->asal_sbu) ?></td>
          <td><?php echo $p->tgl_pembuatan ?></td>
          <td><?php echo strtoupper($p->kategori_nama) ?></td>
          <td><?php echo strtoupper($p->alternate) ?></td>
          <td><?php echo strtoupper($p->nama_suplier) ?></td>
          <td><?php echo "'".$p->nomor_ktp?></td>
          <td><?php echo "'".$p->nomor_npwp ?></td>
          <td><?php echo strtoupper($p->alamat) ?></td>
          <td><?php echo strtoupper($p->nama_kontak) ?></td>
          <td><?php echo "'".$p->nomor_kantor ?></td>
          <td><?php echo "'".$p->nomor_handphone ?></td>
          <td><?php echo strtoupper($p->email) ?></td>
          <td><?php echo $p->nomor_liability ?></td>
        </tr>
      <?php
    }
  ?>
  </tbody>
</table> 
