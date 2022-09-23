<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <script src="vendor/jquery-3.4.1.js"></script>
    <script src="datepicker/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="datepicker/css/datepicker.css">
</head>
<body>
<div class="container">
    <br>
    <h4>Laporan Daftar Barang Masuk</h4>
    <form action="<?php echo $_SERVER["REMOTE_HOST"];?>" method="post">

<div class="form-group">
    <label>Tanggal Awal</label>
    <div class="input-group date">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
        <input id="tgl_mulai" placeholder="masukkan tanggal Awal" type="date" class="form-control datepicker" name="tgl_awal"  value="<?php if (isset($_POST['tgl_awal'])) echo $_POST['tgl_awal'];?>" >
    </div>
</div>
<div class="form-group">
    <label>Tanggal Akhir</label>
    <div class="input-group date">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
        <input id="tgl_akhir" placeholder="masukkan tanggal Akhir" type="date" class="form-control datepicker" name="tgl_akhir" value="<?php if (isset($_POST['tgl_akhir'])) echo $_POST['tgl_akhir'];?>">
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: false,
        });
        $("#tgl_mulai").on('changeDate', function(selected) {
            var startDate = new Date(selected.date.valueOf());
            $("#tgl_akhir").datepicker('setStartDate', startDate);
            if($("#tgl_mulai").val() > $("#tgl_akhir").val()){
                $("#tgl_akhir").val($("#tgl_mulai").val());
            }
        });
    });
</script>
    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Cari">
    </div>
    </form>

    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
        <th>No</th>
                                  <th>Tanggal Masuk</th>
                                  <th>ID Barang Masuk</th>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>
                                  <th>Jumlah Masuk</th>
                                  <th>Nama Suplier</th>
                               
        </tr>
        </thead>
        <?php


$kon= mysqli_connect("localhost","root","","dazel");
if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

          $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
          $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));

            $sql="select * from barang_masuk where tanggal between '".$tgl_awal."' and '".$tgl_akhir."' order by idbrg_masuk asc";

        }else {
            $sql="select * from barang_masuk  k, barang s where s.kode_barang =k.kode_barang order by idbrg_masuk asc";
        }

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
            <tr>
            <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['tanggal'] ?></td>
                                  <td><?php echo $data['idbrg_masuk'] ?></td>
                                  <td><?php echo $data['kode_barang'] ?></td>
                                  <td><?php echo $data['nama_barang'] ?></td>
                                  <td><?php echo $data['jumlah_masuk'] ?></td>
                                  <td><?php echo $data['suplaier'] ?></td>
                                
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>