<?php 

function alert($message){
    echo "
        <script>alert('$message');</script>
    ";
}

function cekRegister($data){

    $userdata = [
        'username' => $data["username"],
        'fullname' => $data["fullname"],
        'insname' => $data["insname"],
        'country' => $data["country"],
        'password' => $data["password"],
        'cpassword' => $data["cpassword"]
    ];
    
    foreach ($userdata as $udata) {
        if($udata == ""){
            alert("isilah semua field!");
            return false;
        }
    }

    foreach ($_SESSION["user"] as $user) {
        if($user["username"] == $data["username"]){
            alert("Username sudah terpakai!");
            return false;
        }
    }

    if($data["password"] !== $data["cpassword"]){
        alert("Password dan confirm password tidak sama!");
        return false;
    }

    array_push($_SESSION["user"], $userdata);
    return true;
}


function cekLogin($data){

    if($data["username"] == "" || $data["password"] == ""){
        alert("isilah semua field!");
        return false;
    }   

    $ada = false;
    $pass = false;
    foreach ($_SESSION["user"] as $user) {
        if($user["username"] == $data["username"]){
            $ada = true;
            if($user["password"] == $data["password"]){
                $pass = true;
                $_SESSION["target"] = $user;
                return true;
            }
        }
    }

    if(!$ada){
        alert("Username belum terdaftar!");
        return false;
    }
    if(!$pass){
        alert("Password salah!");
        return false;
    }

    return false;

}

?>