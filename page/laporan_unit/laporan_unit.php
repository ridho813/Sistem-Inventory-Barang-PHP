




 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DAFTAR UNIT</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
                                        <tr>
											<th>No</th>
											<th>ID Unit</th>
											<th>Nama Unit</th>
                      <th>Nama Supervisor</th>
                      <th>Keterangan</th>
											<th>Aksi</th>
                                         
                                        </tr>
										</thead>
										
               
                  <tbody>
                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("select * from unit");
									while ($data = $sql->fetch_assoc()) {
										
									?>
									
                                        <tr>
                      <td><?php echo $no++; ?></td>
											<td><?php echo $data['idunit'] ?></td>
											<td><?php echo $data['nama_unit'] ?></td>
                      <td><?php echo $data['nama_supervisor'] ?></td>                  
                      <td><?php echo $data['keterangan'] ?></td>
										
                                        </tr>
									<?php }?>

										   </tbody>
                                
                      </table>
                      <a href="page/laporan/export_laporan_suplier_excel.php"  class="btn btn-primary" style="margin-top:8 px"><i class="fa fa-print"></i>ExportToExcel</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>












