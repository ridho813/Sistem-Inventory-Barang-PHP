<?php
 
 $id = $_GET['idbrg_masuk'];
 $sql = $koneksi->query("delete from barang_masuk where idbrg_masuk = '$id'");

 if ($sql) {
 
 ?>
 
 
	<script type="text/javascript">
	alert("Data Berhasil Dihapus");
	window.location.href="?page=barangmasuk";
	</script>
	
 <?php
 
 }
 
 ?>