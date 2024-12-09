<?php
    require_once "../config/config.php";

    if (isset($_POST['submit'])) {
    $namaBarang =$_POST['namaBarang']; 
    $kodekategoriBarang = $_POST['kodekategoriBarang'];
    $hargabarang = $_POST['hargabarang'];
    $deskripsiBarang = $_POST['deskripsiBarang'];
    $gambarBarang = basename($_FILES['gambarBarang']['name']);
            // variabel array associative 
    $data = [ 
        'namaBarang' => $namaBarang,
        'kodekategoriBarang' => $kodekategoriBarang,
       
        'hargabarang' => $hargabarang,
        'deskripsiBarang' => $deskripsiBarang,
        'gambarBarang' => $gambarBarang,
    ];
    
    $validasi = validasiData($data);

    if($validasi == 0 ){
        echo "data sudah lengkap siap di inputkan";
        $result = formAZARINE($data, $koneksi);
        $folderTujuan = $rootDir . "uploads";
        if ($result) {
            $upload = tambahGambar($folderTujuan, $_FILES['gambarBarang']);
            if ($upload)
                header("location:formAZARINE.php?status=1");
            else
                header("location:formAZARINE.php?errno=1");
        } else header("location:formAZARINE.php?errno=1");
    } else {
        echo "data $validasi kurang";
    }
}



else if(isset($_GET['del'])){
    $id = $_GET['del'] ?? null;

    if($id === null || !ctype_digit($id)){
        header("location:view.php?errno=3");
    }
    else {
        // function delete
        $result = delproduk($koneksi, $id);
        if($result) 
            header("location:view.php?success=1");
        else 
            header("location:view.php?errno=5");
    }
}

?>
