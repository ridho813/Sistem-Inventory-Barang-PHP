 <?php
 
 $id = $_GET['id_user'];
 $sql = $koneksi->query("delete from user where id_user = '$id'");

 if ($sql) {
 
 ?>
 
 
	<script type="text/javascript">
	alert("Data Berhasil Dihapus");
	window.location.href="?page=pengguna";
	</script>
	
 <?php
 
 }
 
 ?>