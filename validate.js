function validateName() {
    var error = document.getElementById("nama_error");

    let x = document.getElementById("name").value;

    if (x == "") {
        error.textContent = "Nama Wajib Diisi!"
        error.style.color = "red"
        return false;
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

function validateProvinsi() {
    var error = document.getElementById("prov_error");

    let x = document.getElementById("provinsi").value;

    if (x == "defaultvalueprov") {
        error.textContent = "Pilih Provinsi!"
        error.style.color = "red"
        return false;
    }
    
}

function validateKabupaten() {
    var error = document.getElementById("kabupaten_error");

    let x = document.getElementById("kabupaten").value;

    if (x == "defaultvalueprov") {
        error.textContent = "Pilih Kabupaten!"
        error.style.color = "red"
        return false;
    }
    
}
