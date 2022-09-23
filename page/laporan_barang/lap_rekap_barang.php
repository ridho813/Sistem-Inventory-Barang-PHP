 
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Rekap Barang </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Tahun </th>
                                  <th>Jumlah Barang </th>
                                  <th>Jumlah Stok</th>
                                  <th>Total Harga </th>
                                 <th></th>
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                         
                          $no = 1;
                          $sql = $koneksi->query(" SELECT year(tgl_catat) AS tahun, sum(stok_barang) as jumlah, sum(harga) as hargatot,COUNT(kode_barang) AS total FROM barang GROUP BY year(tgl_catat)");
                          while ($data = $sql->fetch_assoc()) {
                            $kode_barang[] = $data['total']; $total_blm = array_sum($kode_barang);
                            $data[] = $data['hargatot']; $totalharga = array_sum($data);
                            $stok_barang[] = $data['jumlah']; $totalstok = array_sum($stok_barang);
                          ?>
                          
                          <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['tahun'] ?></td>
                                  <td><?php echo $data['total'] ?></td>
                               <td></td>
                               <td></td>
                               <td></td>
                              
                              </tr> 
                              <tr>
         <th></th>
         <th>Total Keseluruhan</th>
         <th><?php  echo $total_blm; ?></td>
         <th><?php  echo $totalstok; ?></td>
         <th><?php  echo $data['hargatot']; ?></td>
		<?php }?>
       
      </tr>      
                      
                    
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>





