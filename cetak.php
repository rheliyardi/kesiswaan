<!DOCTYPE html>
<html>
<head>
 <title>Panduancode Cetak laporan PDF Di PHP Dan MySQLi</title>
</head>
<body>
 <style type="text/css">
 body{
 font-family: sans-serif;
 }
 table{
 margin: 20px auto;
 border-collapse: collapse;
 }
 table th,
 table td{
 border: 1px solid #3c3c3c;
 padding: 3px 8px;

 }
 a{
 background: blue;
 color: #fff;
 padding: 8px 10px;
 text-decoration: none;
 border-radius: 2px;
 }

    .tengah{
        text-align: center;
    }
 </style>
 <table>
 <tr>   
 <th>NIS</th>
 <th>Nama</th>
 <th>Tempat Lahir</th>
 <th>Tanggal Lahir</th>
 <th>Jenis Kelamin</th>
 <th>Alamat</th> 
 </tr>
 <?php 
 // koneksi database
 $koneksi = mysqli_connect("localhost","root","","db_kesiswaan");

 // menampilkan data pegawai
 $data = mysqli_query($koneksi,"select * from siswa");
 while($d = mysqli_fetch_array($data)){
 ?>
 <tr>
 <td style='text-align: center;'><?php echo $d['nis'] ?></td>
 <td><?php echo $d['nama']; ?></td>
 <td><?php echo $d['tempat_lahir']; ?></td>
 <td><?php echo $d['tanggal_lahir']; ?></td>
 <td><?php echo $d['jenis_kelamin']; ?></td>
 <td><?php echo $d['alamat']; ?> </td>
 </tr>
 <?php 
 }
 ?>
    </table>
    <script>
 window.print();
 </script>
</body>
</html>