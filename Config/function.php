<?php

function validasiData($data){

    foreach($data as $index => $value){
        $value = trim($value);
        if($value === '' || $value === 0 || $value === null || $value === false){
            return $index;
        }
    }
    return 0;
}
function formAZARINE($data, $koneksi)
{

    $namaBarang = $data['namaBarang']; 
    $kodekategoriBarang = $data['kodekategoriBarang'];
   
    $hargabarang = $data['hargabarang'];
    $deskripsiBarang = $data['deskripsiBarang'];
    $gambarBarang = $data['gambarBarang'];
    


    $sql = "INSERT INTO tb_menu (Nama_Produk, Kode_Kategori, Harga_Produk, Deskripsi, Gambar) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    if ($stmt == false) {
        return "FAILED";
    }

    mysqli_stmt_bind_param($stmt, 'siiss', $namaBarang,  $kodekategoriBarang, $hargabarang, $deskripsiBarang, $gambarBarang );
    $result = mysqli_stmt_execute($stmt);

    if (!$result)
        return false;

    mysqli_stmt_close($stmt);
    return true;
}

function ViewProduct($koneksi){
    $sql = "SELECT * FROM tb_menu WHERE 1;";

    $stmt = mysqli_query($koneksi, $sql);

    if(mysqli_num_rows($stmt) > 0) return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    else return false; 
}

function delproduk($koneksi, $id) {
    $sql = "DELETE FROM tb_menu WHERE Kode_Produk = ?";
            // DELETE FROM `tb_menu` WHERE produk_id = ? ";
    $stmt = mysqli_prepare($koneksi, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) return true;
    else return false;
}

