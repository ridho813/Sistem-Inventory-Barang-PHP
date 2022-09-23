
<?php

	
 $id_user = $_GET['id_user'];
 $sql2 = $koneksi->query("select * from user where id_user = '$id_user'");
 $tampil = $sql2->fetch_assoc();
  
?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Pengguna</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
	
							
							<label for="">Nama Lengkap Pengguna</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama"  value="<?php echo $tampil['nama']; ?>" class="form-control" />	 
							</div>
                            </div>
							<label for="">Nomor Petugas/Karyawan</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="nip"   value="<?php echo $tampil['nip']; ?>"class="form-control" />
                          	 
								</div>
                            </div>
					
							<label for="">Username</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="username"  value="<?php echo $tampil['username']; ?>" class="form-control" />
                          	 
								</div>
                            </div>
							
							<label for="">Password</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="password" name="password"  value="<?php echo $tampil['password']; ?>"class="form-control" />
							</div>
						</div>
						<label for="">No Tlp</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="no_tlp"  value="<?php echo $tampil['no_tlp']; ?>" class="form-control" />
                          	 
								</div>
                            </div>
						<label for="">Jabatan</label>
							 <div class="form-group">
                               <div class="form-line">
                                    <select name="jabatan" class="form-control show-tick">
                                        <option value="">-- Pilih Jabatan --</option>
										 <option value="karyawan">karyawan</option>
                                        <option value="admin" >admin</option>
                                        <option value="staf administrasi">staf administrasi</option>
                     			
                                    </select>
                            </div>
							</div>
							
							
						
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" >
							<input type="submit" name="batal" value="Batal" class="btn btn-primary" >
							</form>
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								$id_user= $_POST['id_user'];
								$nama= $_POST['nama'];
								$username= $_POST['username'];
								$password= $_POST['password'];
								$no_tlp= $_POST['no_tlp'];
								$nip= $_POST['nip'];
								$jabatan= $_POST['jabatan'];
							
								
							
								
								$sql = $koneksi->query("UPDATE user SET  nama='$nama', nip='$nip' ,jabatan='$jabatan' ,username= '$username', password= '$password' , no_tlp= '$no_tlp'  where id_user='$id_user' ");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=pengguna";
										</script>
										
										<?php
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