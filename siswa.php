<?php
// membuat instance
$dataSiswa=NEW Siswa;
// aksi tampil data
if($_GET['aksi']=='tampil'){
// aksi untuk tampil data
$html = null;
$html .='<center><h3>Daftar Siswa</h3>';
$html .='<p>Berikut ini data siswa rpl 3</p>';
$html .='<table class="table table-dark table-striped">
<thead>
<a href="index.php?file=siswa&aksi=tambah" class="btn btn-outline-dark">Tambah Data Siswa</a>
<a target="_blank" class="btn btn-dark btn-sm" href="cetak.php">PRINT</a>

<th>No.</th>
<th>NIS</th>
<th>Nama</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>L/P</th>
<th>Alamat</th>
<th>Aksi</th>
</thead>
<tbody>';
// variabel $data menyimpan hasil return
$data = $dataSiswa->tampil();
$no=null;
if(isset($data)){
foreach($data as $barisSiswa)

{
$no++;
$html .='<tr>
<td>'.$no.'</td>
<td>'.$barisSiswa->nis.'</td>
<td>'.$barisSiswa->nama.'</td>
<td>'.$barisSiswa->tempat_lahir.'</td>
<td>'.$barisSiswa->tanggal_lahir.'</td>
<td>'.$barisSiswa->jenis_kelamin.'</td>
<td>'.$barisSiswa->alamat.'</td>
<td>
<a class="btn btn-outline-success"
href="index.php?file=siswa&aksi=edit&nis='.$barisSiswa->nis.'">Edit</a>
<a class="btn btn-outline-danger"
href="index.php?file=siswa&aksi=hapus&nis='.$barisSiswa->nis.'">Hapus</a>
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
action="index.php?file=siswa&aksi=simpan">';
$html .='<p>Nomor Induk Siswa<br/>';
$html .='<input type="text" name="txtNis"
placeholder="Masukan No. Induk" autofocus/></p>';
$html .='<p>Nama Lengkap<br/>';
$html .='<input type="text" name="txtNama"
placeholder="Masukan Nama Lengkap" size="30" required/></p>';
$html .='<p>Tempat, Tanggal Lahir<br/>';
$html .='<input type="text" name="txtTempatLahir"
placeholder="Masukan Tempat Lahir" size="30" required/>,';
$html .='<input type="date" name="txtTanggalLahir"
required/></p>';
$html .='<p>Jenis Kelamin<br/>';
$html .='<input type="radio" name="txtJenisKelamin"
value="L"> Laki-laki';
$html .='<input type="radio" name="txtJenisKelamin"
value="P"> Perempuan</p>';
$html .='<p>Alamat Lengkap<br/>';
$html .='<textarea name="txtAlamat" placeholder="Masukan
alamat lengkap" cols="50" rows="5" required></textarea></p>';
$html .='<p><input type="submit" name="tombolSimpan"
value="Simpan"/></p></center>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='simpan') {
$data=array(
'nis'=>$_POST['txtNis'],
'nama'=>$_POST['txtNama'],
'tempat_lahir'=>$_POST['txtTempatLahir'],
'tanggal_lahir'=>$_POST['txtTanggalLahir'],
'jenis_kelamin'=>$_POST['txtJenisKelamin'],
'alamat'=>$_POST['txtAlamat']
);
// simpan siswa dengan menjalankan method simpan
$dataSiswa->simpan($data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=siswa&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='edit') {
// ambil data siswa
$siswa=$dataSiswa->detail($_GET['nis']);
if($siswa->jenis_kelamin =='L') { $pilihL='checked';
    $pilihP =null; }
    else {
    $pilihP='checked'; $pilihL =null; }
    $html =null;
    $html .='<h3>Form Tambah</h3>';
    $html .='<p>Silahkan masukan form </p>';
    $html .='<form method="POST"
    action="index.php?file=siswa&aksi=update">';
    $html .='<p>Nomor Induk Siswa<br/>';
    $html .='<input type="text" name="txtNis"
    value="'.$siswa->nis.'" placeholder="Masukan No. Induk"
    readonly/></p>';
    $html .='<p>Nama Lengkap<br/>';
    $html .='<input type="text" name="txtNama"
    value="'.$siswa->nama.'" placeholder="Masukan Nama Lengkap"
    size="30" required autofocus/></p>';
    $html .='<p>Tempat, Tanggal Lahir<br/>';
    $html .='<input type="text" name="txtTempatLahir"
    value="'.$siswa->tempat_lahir .'" placeholder="Masukan Tempat
    Lahir" size="30" required/>,';
    $html .='<input type="date" name="txtTanggalLahir"
    value="'.$siswa->tanggal_lahir.'" required/></p>';
    $html .='<p>Jenis Kelamin<br/>';
    $html .='<input type="radio" name="txtJenisKelamin"
    value="L" '.$pilihL.'> Laki-laki';
    $html .='<input type="radio" name="txtJenisKelamin"
    value="P" '.$pilihP.'> Perempuan</p>';
    $html .='<p>Alamat Lengkap<br/>';
    $html .='<textarea name="txtAlamat" placeholder="Masukan
    alamat lengkap" cols="50" rows="5"
    required>'.$siswa->alamat.'</textarea></p>';
    $html .='<p><input type="submit" name="tombolSimpan"
    value="Simpan"/></p></center>';
    $html .='</form>';
    echo $html;
    }
    // aksi tambah data
    else if ($_GET['aksi']=='update') {
    $data=array(
        'nama'=>$_POST['txtNama'],
'tempat_lahir'=>$_POST['txtTempatLahir'],
'tanggal_lahir'=>$_POST['txtTanggalLahir'],
'jenis_kelamin'=>$_POST['txtJenisKelamin'],
'alamat'=>$_POST['txtAlamat']
);
$dataSiswa->update($_POST['txtNis'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=siswa&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='hapus') {
$dataSiswa->hapus($_GET['nis']);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=siswa&aksi=tampil">';
}
// aksi tidak terdaftar
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
?>