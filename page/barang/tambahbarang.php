<div class="container-fluid">


  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Barang </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kode Barang </label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="kode_barang" class="form-control" required />	 
							</div>
                            </div>

							<label for="">Nama Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_barang" class="form-control" />
                          	 
								</div>
                            </div>
                            <label for="color">Nama Toko</label>
                            <div class="form-group">
                               <div class="form-line">
                               <select name="kode_toko" id="kode_toko"class="form-control" />
							   <option value="">-- Pilih Toko --</option>
								<?php
								
								$sql = $koneksi -> query("select * from  toko order by kode_toko");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[kode_toko]'> $data[nama_toko] </option>";
								}
								?>
								</select> 
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
                                $kode_toko= $_POST['kode_toko'];
								$nama_barang= $_POST['nama_barang'];
								$warna= $_POST['warna'];
								$harga= $_POST['harga'];
								$satuan_barang= $_POST['satuan_barang'];
                                $jenis_barang= $_POST['jenis_barang'];
                                $keterangan= $_POST['keterangan'];
                                $stok_barang= $_POST['stok_barang'];
                              
                                
								$sql = $koneksi->query("insert into barang (kode_barang, kode_toko, nama_barang,satuan_barang, jenis_barang, keterangan,warna,stok_barang,harga) values
								('$kode_barang','$kode_toko,'$nama_barang','$satuan_barang','$jenis_barang', '$keterangan','$warna','$stok_barang', '$harga')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=barang";
										</script>
										
										<?php
									}
								}
							if (isset($_POST['batal'])) {
								?>
									
										<script type="text/javascript">
										alert("Data Batal Ditambahkan");
										window.location.href="?page=barangmasuk";
										</script>
										
										<?php
									}

							
							?>
										
										
										
								
								
								
								
								
