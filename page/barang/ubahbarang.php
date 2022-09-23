<?php
 $kode_barang = $_GET['kode_barang'];
 $sql2 = $koneksi->query("select * from barang where kode_barang = '$kode_barang'");
 $tampil = $sql2->fetch_assoc();
  
 ?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Barang </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kode Barang </label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="idbrg_keluar" value="<?php echo $tampil['kode_barang']; ?>" class="form-control" readonly/>	 
							</div>
                            </div>
      
                            <label for="">Nama Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_barang" class="form-control" />
                          	 
								</div>
                            </div>

                          
                            <label for="">Harga Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="harga" class="form-control" />
                          	 
								</div>
                            </div>
                            <label for="">Warna Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="warna" class="form-control" />
                          	 
								</div>
                            </div>
                            <label for="">jenis Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="jenis_barang" class="form-control" />
                          	 
								</div>
                            </div>
                            <label for="">Satuan Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="satuan_barang" class="form-control" />
                          	 
								</div>
                            </div>
<label for="">Stock Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="stok_barang" class="form-control" />
                          	 
								</div>
</div>
							</div>

                            </div>
                            <label for="">Keterangan</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="keterangan" class="form-control" />
                          	 
								</div>

</div>
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								

                            	$kode_barang= $_POST['kode_barang'];
								$nama_barang= $_POST['nama_barang'];
								$warna= $_POST['warna'];
								$harga= $_POST['harga'];
								$satuan_barang= $_POST['satuan_barang'];
                                $jenis_barang= $_POST['jenis_barang'];
                                $keterangan= $_POST['keterangan'];
                                $stok_barang= $_POST['stok_barang'];
								
								
								$sql = $koneksi->query("update barang set  nama_barang='$nama_barang',satuan_barang='$satuan_barang' ,jenis_barang= '$jenis_barang', keterangan='$keterangan',warna='$warna',stok_barang='$stok_barang',harga='$harga' where kode_barang='$kode_barang'"); 

								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="?page=barang";
										</script>
										
										<?php
								}
							
							}
							
							if (isset($_POST['batal'])) {
								?>
									
									<script type="text/javascript">
									alert("Data Batal Diubah");
									window.location.href="?page=barang";
									</script>
										
								<?php
								}	
							?>
										
										
										
								
								
								
								
								
