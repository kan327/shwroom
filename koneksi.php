<?php 


$koneksi = mysqli_connect("localhost", "root", "", "db_showroom_otomotif") or die("Gagal dihubungnkan");

function cek($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] =$row;
    }
    return $rows;
}
 ?>