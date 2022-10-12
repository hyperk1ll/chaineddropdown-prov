<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php require_once('./koneksi.php'); ?>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#provinsi').change(function() {
                var id_provinsi = $(this).val();

                $.ajax({
                    type: 'POST', //method
                    url: 'kabupaten.php', //action
                    data: 'id_provinsi='+id_provinsi, // $_POST['id_provinsi']
                    success: function(response) {
                        $('#kabupaten').html(response);
                    }
                });
            })
        });
    </script>
</head>

<style>
body{
    background: white;
    padding-top: 10vh;  
}
 
form{
    background: #fff;
    box-shadow: 2px 2px 2px rgba(0,0,0,0.8);
    padding: 10px;
    border: 2px solid grey;
}
 
.form-container{
    border-radius: 10px;
    padding: 30px;
}
</style>

<script>
function validateName() {
    var error = document.getElementById("nama_error");

    let x = document.getElementById("name").value;

    if (x == "") {
        error.textContent = "Nama Wajib Diisi!"
        error.style.color = "red"
        return false;
    }
    else {
        error.textContent = ""
    }
    
}

function validateEmail() {
    var error = document.getElementById("email_error");

    let x = document.getElementById("email").value;

    if (x == "") {
        error.textContent = "Email Wajib Diisi!"
        error.style.color = "red"
        return false;
    }
    else {
        error.textContent = ""
    }
    
}

function validateGender() {
    var error = document.getElementById("gender_error");
    
    if (!document.getElementById("pria-check").checked && !document.getElementById("wanita-check").checked) {
        error.textContent = "Pilih Jenis Kelamin!"
        error.style.color = "red"
        return false;
    }
    
    else if (document.getElementById("pria-check").checked || document.getElementById("wanita-check").checked) {
        error.textContent = ""

    }
}

function validateAlamat() {
    var error = document.getElementById("alamat_error");

    let x = document.getElementById("alamat").value;

    if (x == "") {
        error.textContent = "Email Wajib Diisi!"
        error.style.color = "red"
        return false;
    }
    else {
        error.textContent = ""
    }
}

function validateProvinsi() {
    var error = document.getElementById("prov_error");

    let x = document.getElementById("provinsi").value;

    if (x == "defvalueprov") {
        error.textContent = "Pilih Provinsi!"
        error.style.color = "red"
        return false;
    }
    else {
        error.textContent = ""
    }
    
}

function validateKabupaten() {
    var error = document.getElementById("kabupaten_error");

    let x = document.getElementById("kabupaten").value;

    if (x == "defvaluekab") {
        error.textContent = "Pilih Kabupaten!"
        error.style.color = "red"
        return false;
    }
    else {
        error.textContent = ""
    }
}

</script>

<body>
    <section class="container-fluid">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
        <?php
        if (isset($_POST['submit'])) {
            $nama = $_POST['name'];
            $email = $_POST['email'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat = $_POST['alamat'];
            $provinsi = $_POST['provinsi'];
            $kabupaten = $_POST['kabupaten'];

            $sql_check = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
            $email_check = mysqli_num_rows($sql_check);
         
            if ($email_check > 0) {
                echo '<div class="alert alert-warning">
                        Email anda sudah terdaftar!
                        </div>';
            } 
            else {
                $result = mysqli_query($con, "INSERT INTO user(nama, email, jenis_kelamin, alamat, id_provinsi, id_kabupaten) VALUES('$nama', '$email', '$jenis_kelamin', '$alamat', '$provinsi', '$kabupaten')");

                if ($result) {
                    echo '<div class="alert alert-success">
                        Pendaftaran anda berhasil.
                        </div>';
                }

            }                  
        
        }

        ?>
        <form class="form-container" method="post" onsubmit='return validateProvinsi(),validateKabupaten(),validateName(),validateEmail(),validateGender(),validateAlamat();'>
            <h4 class="text-center font-weight-bold"> Sign-Up </h4>
            <!-- Nama -->
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
            </div>
            <div id="nama_error" class="error"></div>
                        
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describeby="emailHelp" placeholder="Masukkan email">
            </div>
            <div id="email_error" class="error"></div>
            
            <!-- Jenis Kelamin -->
            <label>Jenis Kelamin:</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" id="pria-check" class="form-check-input" name="jenis_kelamin" value="Pria">Pria
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" id="wanita-check" class="form-check-input" name="jenis_kelamin" value="Wanita">Wanita
                </label>
            </div>
            <div style="color: red" id="gender_error" class="error"></div>

            <!-- Alamat -->
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
            </div>
            <div id="alamat_error" class="error"></div>

            <!-- Provinsi -->
            <label for="Provinsi">Provinsi</label>
            <div>
                <?php $sql_provinsi = mysqli_query($con, 'SELECT * from provinsi'); ?>
                <select class="form-select" name="provinsi" id="provinsi">
                    <option value="defvalueprov">Pilih Provinsi</option>
                    <?php 
                    while($row_provinsi = mysqli_fetch_array($sql_provinsi)) {
                    ?>
                    <option value="<?php echo $row_provinsi['id'] ?>"><?php echo $row_provinsi['nama'] ?></option>
                        <?php } ?>
                </select>
            </div>
            <div style="color: red" id="prov_error" class="error"></div>

            <!-- Kota/Kabupaten -->
            <label for="Kota/Kabupaten">Kota/Kabupaten</label>
            <div>
                <select class="form-select" name="kabupaten" id="kabupaten">
                    <option value="defvaluekab" selected="disabled">Pilih Kota/Kabupaten</option>
                    <option></option>
                </select>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
        </form>
        </section>
        </section>
    </section>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="./validate.js"></script>                    
</body>
</html>