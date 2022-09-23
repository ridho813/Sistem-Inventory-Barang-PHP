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
    <h4>Pencarian Data Berdasarkan Tanggal</h4>
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
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>
                                  <th>warna</th>
                                  <th>Harga</th>
                                  <th>Jenis Barang</th>
                                  <th>Satuan</th>
                                  <th>Stock Barang</th>
                                  <th>Keterangan Barang</th>
                                  <th>Tanggal Barang</th>
        </tr>
        </thead>
        <?php


$kon= mysqli_connect("localhost","root","","dazel");
if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

          $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
          $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));

            $sql="select * from barang where tgl_catat between '".$tgl_awal."' and '".$tgl_akhir."' order by kode_barang asc";

        }else {
            $sql="select * from barang order by kode_barang asc";
        }

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
            <tr>
            <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['kode_barang'] ?></td>
                                  <td><?php echo $data['nama_barang'] ?></td>
                                  <td><?php echo $data['warna'] ?></td>
                                  <td><?php echo $data['harga'] ?></td>
                                  <td><?php echo $data['jenis_barang'] ?></td>
                                  <td><?php echo $data['satuan_barang'] ?></td>
                                  <td><?php echo $data['stok_barang'] ?></td>
                                  <td><?php echo $data['keterangan'] ?></td>
                                  <td><?php echo $data['tgl_catat'] ?></td>
               
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>