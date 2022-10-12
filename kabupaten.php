<?php

require_once("./koneksi.php");

$id_provinsi = $_POST['id_provinsi'];

$sql_kabupaten = mysqli_query($con, "SELECT * FROM kabupaten where id_provinsi = $id_provinsi");

echo '<option>Pilih Kota/Kabupaten</option>';
while($row_kabupaten = mysqli_fetch_array($sql_kabupaten)) {
    echo '<option value="'.$row_kabupaten['id'].'">'.$row_kabupaten['nama'].'</option>';
}