

<?php
 $kode_sup = $_GET['kode_sup'];
 $sql2 = $koneksi->query("select * from suplier where kode_sup = '$kode_sup'");
 $tampil = $sql2->fetch_assoc();

?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Supplier</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">ID Suplier</label>
                            <div class="form-group">
                               <div class="form-line">
                             <input type="text" name="kode_sup" class="form-control" id="kode_sup" value="<?php echo $tampil['kode_sup']; ?>" readonly/>
							</div>
                            </div>
							
							
							<label for="">Nama Suplier</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_sup" class="form-control"value="<?php echo $tampil['nama_sup']; ?> "/>	 
							</div>
                            </div>

					
							<label for="">Alamat</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="alamat" class="form-control"value="<?php echo $tampil['alamat']; ?> "/>
                          	 	</div>
                            </div>
					
							
							<label for="">Telepon</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="tlp" class="form-control" value="<?php echo $tampil['tlp']; ?>"/>	 
							</div>
                            </div>
								<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

								<input type="submit" name="batal" value="Batal" class="btn btn-primary">
							
							</form>
						
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								$kode_sup= $_POST['kode_sup'];
								$nama_sup= $_POST['nama_sup'];
								$tlp= $_POST['tlp'];
								$alamat= $_POST['alamat'];
			
								
								$sql = $koneksi->query("UPDATE suplier set nama_sup='$nama_sup',alamat='$alamat',tlp='$tlp' where kode_sup='$kode_sup'");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=suplier";
										</script>
										
										<?php
								}
								else {
									?>
									
										<script type="text/javascript">
										alert("Data Batal Ditambahkan");
										window.location.href="?page=suplier";
										</script>
										
										<?php
								}
									
								}
							
							
							?>