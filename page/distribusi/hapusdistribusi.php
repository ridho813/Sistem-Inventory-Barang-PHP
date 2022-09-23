
<?php

//delete barang masuk
if(isset($_POST['delete'])){
    $idb = $_POST['idb'];
    $qty = $_POST['kty'];
    $idm = $_POST['idm'];

    $getdatastock= mysqli_query($conn,"SELECT * FROM barang where idbarang='$idb' ");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];

    $selisih=$stock-$qty;

    $update =mysqli_query($conn,"UPDATE barang SET stock='$selisih' where idbarang='$idb' ");
    $hapus =mysqli_query($conn," DELETE FROM barang_masuk WHERE idmasuk ='$idm' ");

    if($update&&$hapus){
        header('location:masuk.php');
    }else{
       header('location:masuk.php');
    }


};

?>