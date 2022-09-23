<?php

$koneksi = new mysqli("localhost","root","","dazel");
$no = mysqli_query($koneksi, "select kode_sup from suplier order by kode_sup desc");
$idsup = mysqli_fetch_array($no);
$kode = $idsup['kode_sup'];

$urut = substr($kode,-4);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1){
	$format = "SUP"."000".$tambah;
} else if(strlen($tambah) == 2){
	$format = "SUP"."00".$tambah;	
} else{
	$format = "SUP".$tambah;
}

?>
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Suplier</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">ID Suplier</label>
                            <div class="form-group">
                               <div class="form-line">
                             <input type="text" name="kode_sup" class="form-control" id="kode_sup" value="<?php echo $format; ?>" readonly />
							</div>
                            </div>

							<label for="">Nama Suplier</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_sup" class="form-control" />	 
							</div>
                            </div>

					
							<label for="">Alamat</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="alamat" class="form-control" />
                          	 	</div>
                            </div>
					
							
							<label for="">Telepon</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="tlp" class="form-control" />	 
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
							
			
								
								$sql = $koneksi->query("insert into suplier (kode_sup, nama_sup, alamat, tlp) values ('$kode_sup','$nama_sup','$alamat','$tlp')");
								
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
										
										
										
								
								
								
								
								
