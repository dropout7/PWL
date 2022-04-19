<?php
require 'panggil.php';

// proses tambah
if (!empty($_GET['aksi'] == 'tambah')) {
    $nama = strip_tags($_POST['nama']);
    $harga = strip_tags($_POST['harga']);
    $jml_stok = strip_tags($_POST['jml_stok']);
    $gambar = strip_tags($_POST['gambar']);

    $tabel = 'barang';
    # proses insert
    $data[] = array(
        'nama'        => $nama,
        'harga'            => $harga,
        'jml_stok'        => $jml_stok,
        'gambar'        => $gambar
    );
    $proses->tambah_data($tabel, $data);
    echo '<script>alert("Tambah Data Berhasil");window.location="../index.php"</script>';
}

// proses edit
if (!empty($_GET['aksi'] == 'edit')) {
    $nama = strip_tags($_POST['nama']);
    $harga = strip_tags($_POST['harga']);
    $jml_stok = strip_tags($_POST['jml_stok']);
    $gambar = strip_tags($_POST['gambar']);


    // jika password tidak diisi
    if ($pass == '') {
        $data = array(
            'nama'        => $nama,
            'harga'            => $harga,
            'jml_stok'        => $jml_stok,
            'gambar'        => $gambar
        );
    }
    $tabel = 'barang';
    $where = 'kode_barang';
    $id = strip_tags($_POST['kode_barang']);
    $proses->edit_data($tabel, $data, $where, $id);
    echo '<script>alert("Edit Data Berhasil");window.location="../index.php"</script>';
}

// proses edit
if (!empty($_GET['aksi_user'] == 'edit')) {
    $nama = strip_tags($_POST['nama']);
    $email = strip_tags($_POST['email']);
    $telepon = strip_tags($_POST['telp']);
    $pass = strip_tags($_POST['password']);


    // jika password tidak diisi
    if ($pass == '') {
        $data = array(
            'nama'        => $nama,
            'email'            => $email,
            'telp'        => $jtelepon,
            'password'        => $pass
        );
    }
    $tabel = 'user';
    $where = 'kode_user';
    $id = strip_tags($_POST['kode_user']);
    $proses->edit_data($tabel, $data, $where, $id);
    echo '<script>alert("Edit Data Berhasil");window.location="../index.php"</script>';
}

// hapus data
if (!empty($_GET['aksi'] == 'hapus')) {
    $tabel = 'barang';
    $where = 'kode_barang';
    $id = strip_tags($_GET['hapusid']);
    $proses->hapus_data($tabel, $where, $id);
    echo '<script>alert("Hapus Data Berhasil");window.location="../index.php"</script>';
}

if (!empty($_GET['aksi_user'] == 'hapus')) {
    $tabel = 'user';
    $where = 'kode_user';
    $id = strip_tags($_GET['hapusid']);
    $proses->hapus_data($tabel, $where, $id);
    echo '<script>alert("Hapus Data Berhasil");window.location="../index.php"</script>';
}

// login
if (!empty($_GET['aksi'] == 'login')) {
    // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
    $user = strip_tags($_POST['user']);
    $pass = strip_tags($_POST['pass']);
    // panggil fungsi proses_login() yang ada di class prosesCrud()
    $result = $proses->proses_login($user, $pass);
    if ($result == 'gagal') {
        echo "<script>window.location='../login.php?get=gagal';</script>";
    } else {
        // status yang diberikan 
        session_start();
        $_SESSION['ADMIN'] = $result;
        // status yang diberikan 
        echo "<script>window.location='../index.php';</script>";
    }
}
