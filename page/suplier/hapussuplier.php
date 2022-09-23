 <?php
 
 $kode_sup = $_GET['kode_sup'];
 $sql = $koneksi->query("delete from suplier where kode_sup = '$kode_sup'");

 if ($sql) {
 
 ?>
 
 
	<script type="text/javascript">
	alert("Data Berhasil Dihapus");
	window.location.href="?page=suplier";
	</script>
	
 <?php
 
 }
 
 ?>