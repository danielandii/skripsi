<?php
class antarmuka {

function tampilMenuAdmin() {
$url = "location:utama.php?tag=adm&opsi=lihat";
return $url;
}

function tampilMenuPegawai() {
$url = "location:operator.php?tag=data&opsi=ubah";
return $url;
}

function tampilMenuPelanggan() {
$url = "index.php";
return $url;
}

function tampilProduk() {
$url = "hasil.php";
return $url;
}

function tampilDetailProduk() {
$url = "lihatket.php";
return $url;
}

function tampilBeritaToko() {
$url = "index.php";
return $url;
}

function tampilDataBarang() {
$url = "utama.php?tag=brg&opsi=lihat";
return $url;
}

function tampilDataLaporan() {
$url = "utama.php?tag=lap&opsi=lihat";
return $url;
}

function tampilDataBerita() {
$url = "utama.php?tag=brt&opsi=lihat";
return $url;
}

function tampilDataToko() {
$url = "utama.php?tag=pro&opsi=lihat";
return $url;
}

function tampilDataPegawai() {
$url = "utama.php?tag=adm&opsi=lihat";
return $url;
}

function formlogin() {
$url = "index.php";
return $url;
}

function formBarang() {
$url = "../admin/utama.php?tag=brg&opsi=tambah";
return $url;
}

function formLaporan() {
$url = "operator.php?tag=lapor&opsi=tambah";
return $url;
}

function formGambar() {
$url = "../admin/utama.php?tag=gbr&opsi=ubah";
return $url;
}

function formBerita() {
$url = "../admin/utama.php?tag=brt&opsi=tambah";
return $url;
}

function formToko() {
$url = "../admin/utama.php?tag=pro&opsi=tambah";
return $url;
}

function formPegawai() {
$url = "../admin/utama.php?tag=adm&opsi=tambah";
return $url;
}

function formPengaturan() {
$url = "utama.php?tag=bnr&opsi=lihat";
return $url;
}

function formUbahPass() {
$url = "../admin/operator.php?tag=pass&opsi=ubah";
return $url;
}

function formKeterangan() {
$url = "../admin/utama.php?tag=ket&opsi=ubah";
return $url;
}

function formStok() {
$url = "utama.php?tag=stok&opsi=ubah";
return $url;
}

}
?>