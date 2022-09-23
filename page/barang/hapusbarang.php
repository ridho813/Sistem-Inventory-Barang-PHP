<?php
 
 $id = $_GET['kode_barang'];
 $sql = $koneksi->query("delete from barang where kode_barang = '$id'");

 if ($sql) {
 
 ?>
 
 
	<script type="text/javascript">
	alert("Data Berhasil Dihapus");
	window.location.href="?page=barang";
	</script>
	
 <?php
 
 }
 
 ?>