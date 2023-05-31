<?php
// membuat instance
$daftarPegawai=NEW Pegawai;
// aksi tampil data
if($_GET['aksi']=='tampil'){
// aksi untuk tampil data
$html = null;
$html .='<center><h3>Daftar Pegawai</h3></center>';
$html .='<table class="table table-dark" border="1" width="100%">
<thead>
<th>No.</th>
<th>Id Pegawai</th>
<th>Nama Pegawai</th>
<th>Jabatan</th>
<th>Jenis Kelamin</th>
<th>Tanggal Rekrut</th>
<th>No. Handphone</th>
<th>Email</th>
<th>Tanggal Lahir</th>
<th>Aksi</th>
</thead>
<tbody>';
// variabel $data menyimpan hasil return
$data = $daftarPegawai->tampil();
$no=null;
if(isset($data)){
foreach($data as $barisPegawai){
$no++;
$html .='<tr>
<td>'.$no.'</td>
<td>'.$barisPegawai->id_pegawai.'</td>
<td>'.$barisPegawai->nama_pegawai.'</td>
<td>'.$barisPegawai->jabatan.'</td>
<td>'.$barisPegawai->jenis_kelamin.'</td>
<td>'.$barisPegawai->tanggal_rekrut.'</td>
<td>'.$barisPegawai->no_handphone.'</td>
<td>'.$barisPegawai->email.'</td>
<td>'.$barisPegawai->tanggal_lahir.'</td>
<td>
<a class="btn btn-success" 
href="index.php?file=pegawai&aksi=edit&id='.$barisPegawai->id_pegawai.'">Edit</a>
<a class="btn btn-danger"
href="index.php?file=pegawai&aksi=hapus&id='.$barisPegawai->id_pegawai.'">Hapus</a>
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
$html .='<h3>Form Tambah</h3>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST" action="index.php?file=pegawai&aksi=simpan">';
$html .='<p>Id Pegawai<br/>';
$html .='<input type="text" name="txtId" placeholder="Masukan Id Pegawai" autofocus/></p>';
$html .='<p>Nama Pegawai<br/>';
$html .='<input type="text" name="txtNama" placeholder="Masukan Nama Lengkap" size="30" required/></p>';
$html .='<p>Jabatan<br/>';
$html .='<input type="text" name="txtJabatan" placeholder="Masukan Jabatan" autofocus/></p>';
$html .='<p>Jenis Kelamin<br/>';
$html .='<input type="radio" name="txtJenisKelamin" value="L"> Laki-laki';
$html .='<input type="radio" name="txtJenisKelamin" value="P"> Perempuan</p>';
$html .='<p>Tanggal Rekrut<br/>';
$html .='<input type="date" name="txtTanggalRekrut" required/></p>';
$html .='<p>No. Handphone<br/>';
$html .='<input type="text" name="txtNoHandphone" placeholder="Masukan Nomor" autofocus/></p>';
$html .='<p>Email<br/>';
$html .='<input type="text" name="txtEmail" placeholder="Masukan Email" autofocus/></p>';
$html .='<p>Tanggal Lahir<br/>';
$html .='<input type="date" name="txtTanggalLahir" required/></p>';
$html .='<p><input type="submit" class="btn btn-primary"  name="tombolSimpan" value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='simpan') {
$data=array(
'nama_pegawai'=>$_POST['txtNama'],
'jabatan'=>$_POST['txtJabatan'],
'jenis_kelamin'=>$_POST['txtJenisKelamin'],
'tanggal_rekrut'=>$_POST['txtTanggalRekrut'],
'no_handphone'=>$_POST['txtNoHandphone'],
'email'=>$_POST['txtEmail'],
'tanggal_lahir'=>$_POST['txtTanggalLahir']
);
// simpan siswa dengan menjalankan method simpan
$daftarPegawai->simpan($data);
echo '<meta http-equiv="refresh" content="0; url=index.php?file=pegawai&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='edit') {
// ambil data siswa
$pegawai=$daftarPegawai->detail($_GET['id']);
if($pegawai->jenis_kelamin =='L') { $pilihL='checked'; $pilihP =null; }
else { $pilihL='checked'; $pilihP =null; }
$html =null;
$html .='<h3>Form Tambah</h3>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST" action="index.php?file=pegawai&aksi=update">';
$html .='<p>Id Pegawai<br/>';
$html .='<input type="text" name="txtId" value="'.$pegawai->id_pegawai.'" placeholder="Masukan Id Pegawai" readonly/></p>';
$html .='<p>Nama Pegawai<br/>';
$html .='<input type="text" name="txtNama"  value="'.$pegawai->nama_pegawai.'"placeholder="Masukan Nama Lengkap" size="30" required/></p>';
$html .='<p>Jabatan<br/>';
$html .='<input type="text" name="txtJabatan"  value="'.$pegawai->jabatan.'"placeholder="Masukan Jabatan" autofocus/></p>';
$html .='<p>Jenis Kelamin<br/>';
$html .='<input type="radio" name="txtJenisKelamin" value="L" '.$pilihL.'> Laki-laki';
$html .='<input type="radio" name="txtJenisKelamin" value="P" '.$pilihP.'> Perempuan</p>';
$html .='<p>Tanggal Rekrut<br/>';
$html .='<input type="date" name="txtTanggalRekrut" value="'.$pegawai->tanggal_rekrut.'" required/></p>';
$html .='<p>No. Handphone<br/>';
$html .='<input type="text" name="txtNoHandphone"  value="'.$pegawai->no_handphone.'" placeholder="Masukan Nomor" autofocus/></p>';
$html .='<p>Email<br/>';
$html .='<input type="text" name="txtEmail"  value="'.$pegawai->email.'" placeholder="Masukan Email" autofocus/></p>';
$html .='<p>Tanggal Lahir<br/>';
$html .='<input type="date" name="txtTanggalLahir" value="'.$pegawai->tanggal_lahir.'" required/></p>';
$html .='<p><input type="submit" class="btn btn-primary" name="tombolSimpan" value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='update') {  
$data=array(
'id_pegawai'=>$_POST['txtId'],
'nama_pegawai'=>$_POST['txtNama'],
'jabatan'=>$_POST['txtJabatan'],
'jenis_kelamin'=>$_POST['txtJenisKelamin'],
'tanggal_rekrut'=>$_POST['txtTanggalRekrut'],
'no_handphone'=>$_POST['txtNoHandphone'],
'email'=>$_POST['txtEmail'],
'tanggal_lahir'=>$_POST['txtTanggalLahir']
);
$daftarPegawai->update($_POST['txtId'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=pegawai&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='hapus') {
$daftarPegawai->hapus($_GET['id']);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=pegawai&aksi=tampil">';
}
// aksi tidak terdaftar
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
?>
<script>
		window.print();
	</script>
