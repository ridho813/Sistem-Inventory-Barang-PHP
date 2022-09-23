 
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Rekap Barang Keluar</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Tahun </th>
                                  <th>Jumlah Barang Keluar</th>
                                  <th></th>
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                         
                          $no = 1;
                          $sql = $koneksi->query(" SELECT year(tanggal) AS tahun, COUNT(idbrg_keluar) AS total FROM barang_keluar  k, barang s where s.kode_barang =k.kode_barang GROUP BY year(tanggal)");
                          while ($data = $sql->fetch_assoc()) {
                            $idbrg_masuk[] = $data['total']; $total_blm = array_sum($idbrg_masuk);
                          ?>
                          
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['tahun'] ?></td>
                                  <td><?php echo $data['total'] ?></td>
  
                        
                              </tr> <?php }?>
                       <th></th>
                          <th>Total</th>
                          <td><?php echo $total_blm ?></td>  
                          
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>





