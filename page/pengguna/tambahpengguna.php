<?php
	session_start();
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$koneksi = new mysqli("localhost","root","","dazel");

	
?>
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Pengguna</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
											
							<label for="">Nama Lengkap Pengguna</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama" class="form-control" />	 
							</div>
                            </div>
							<label for="">Nomor Petugas/Karyawan</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="nip" class="form-control" />
                          	 
								</div>
                            </div>
					
							<label for="">Username</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="username" class="form-control" />
                          	 
								</div>
                            </div>
							
							<label for="">Password</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="password" name="password" class="form-control" />
							</div>
						</div>
						<label for="">No Tlp</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="no_tlp" class="form-control" />
                          	 
								</div>
                            </div>
						<label for="">Jabatan</label>
							 <div class="form-group">
                               <div class="form-line">
                                    <select name="jabatan" class="form-control show-tick">
                                        <option value="">-- Pilih Jabatan --</option>
										 <option value="karyawan">karyawan</option>
                                        <option value="admin">admin</option>
                                        <option value="staf administasi">staf administrasi</option>
                     			
                                    </select>
                            </div>
							</div>
							<label for="">Foto</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="file" name="foto" class="form-control" />
									 
							</div>
                            </div>
							
						
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
					
								$nama= $_POST['nama'];
								$username= $_POST['username'];
								$password= $_POST['password'];
								$no_tlp= $_POST['no_tlp'];
								$nip= $_POST['nip'];
								$jabatan= $_POST['jabatan'];
							
								$foto= $_FILES['foto']['name'];
								$lokasi= $_FILES['foto']['tmp_name'];
								$upload= move_uploaded_file($lokasi, "img/".$foto);
								
								if ($upload) {
								
								$sql = $koneksi->query("insert into user ( nama, nip, username, password, jabatan, no_tlp, foto) values('$nama','$nip','$username','$password','$jabatan','$no_tlp','$foto')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=pengguna";
										</script>
										
										<?php
									}
								}
							if (isset($_POST['batal'])) {
								?>
									
										<script type="text/javascript">
										alert("Data Batal Ditambahkan");
										window.location.href="?page=pengguna";
										</script>
										
										<?php
									}

							}
							?>
										
										
										
								
								
								
								
								
