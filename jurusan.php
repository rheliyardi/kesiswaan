<?php
// membuat instance
$dataJurusan=NEW Jurusan;
// aksi tampil data
if($_GET['aksi']=='tampil'){
// aksi untuk tampil data
$html = null;
$html .='<center><h3>Daftar Jurusan</h3>';
$html .='<p>Berikut ini data jurusan</p>';
$html .='<table class="table table-dark table-striped">
<thead>
<a href="index.php?file=jurusan&aksi=tambah" class="btn btn-outline-dark">Tambah Data Siswa</a>
<th>No.</th>
<th>Kode Jurusan</th>
<th>Nama Jurusan</th>
<th>Aksi</th>
</thead>
<tbody>';
// variabel $data menyimpan hasil return
$data = $dataJurusan->tampil();
$no=null;
if(isset($data)){
foreach($data as $barisJurusan){
$no++;
$html .='<tr>
<td>'.$no.'</td>
<td>'.$barisJurusan->kode_jurusan.'</td>
<td>'.$barisJurusan->nama_jurusan.'</td><td>
<a class="btn btn-outline-success"
href="index.php?file=jurusan&aksi=edit&kode_jurusan='.$barisJurusan->kode_jurusan.'">Edit</a>
<a class="btn btn-outline-danger"
href="index.php?file=jurusan&aksi=hapus&kode_jurusan='.$barisJurusan->kode_jurusan.'">Hapus</a>
</td>
</tr>';
}
}
$html .='</tbody>
</table>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='tambah') {
$html =null;
$html .='<center><h3>Form Tambah</h3>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST"
action="index.php?file=jurusan&aksi=simpan">';
$html .='<p>Kode Jurusan<br/>';
$html .='<input type="text" name="txtJurusan"
placeholder="Masukan Kode Jurusan" autofocus/></p>';
$html .='<p>Nama Jurusan<br/>';
$html .='<input type="text" name="txtNama"
placeholder="Masukan Nama Jurusan" size="30" required/></p>';
$html .='<p><input type="submit" name="tombolSimpan"
value="Simpan"/></p></center>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='simpan') {
$data=array(
'kode_jurusan'=>$_POST['txtJurusan'],
'nama_jurusan'=>$_POST['txtNama'],
);
// simpan siswa dengan menjalankan method simpan
$dataJurusan->simpan($data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=jurusan&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='edit') {
// ambil data siswa
$jurusan=$dataJurusan->detail($_GET['kode_jurusan']);

    $html =null;
    $html .='<center><h3>Form Tambah</h3>';
    $html .='<p>Silahkan masukan form </p>';
    $html .='<form method="POST"
    action="index.php?file=jurusan&aksi=update">';
    $html .='<p>Kode Jurusan<br/>';
    $html .='<input type="text" name="txtJurusan"
    value="'.$jurusan->kode_jurusan.'" placeholder="Masukan Kode Jurusan"
    readonly/></p>';
    $html .='<p>Nama Jurusan<br/>';
    $html .='<input type="text" name="txtNama"
    value="'.$jurusan->nama_jurusan.'" placeholder="Masukan Nama Jurusan"
    size="30" required autofocus/></p>';
    $html .='<p><input type="submit" name="tombolSimpan"
    value="Simpan"/></p></center>';
    $html .='</form>';
    echo $html;
    }
    // aksi tambah data
    else if ($_GET['aksi']=='update') {
    $data=array(
        'nama_jurusan'=>$_POST['txtNama'],
);
$dataJurusan->update($_POST['txtJurusan'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=jurusan&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='hapus') {
$dataJurusan->hapus($_GET['kode_jurusan']);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=jurusan&aksi=tampil">';
}
// aksi tidak terdaftar
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
?>