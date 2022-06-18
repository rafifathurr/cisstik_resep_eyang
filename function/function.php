<?php 
// Connect database
$conn = mysqli_connect("localhost","root","","cisstik");
session_start();

// function query
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data){
   global $conn;

   $email = strtolower(stripslashes($data["email"]));
   $fullname = stripslashes($data["name"]);
   $phone = stripslashes($data["phone"]);
   $password = mysqli_real_escape_string($conn, $data["password"]);
   $password2 = mysqli_real_escape_string($conn, $data["password2"]);

   // Cek username pada database
   $query_user = "SELECT email FROM user WHERE email = '$email'";
   $result = mysqli_query($conn, $query_user);

   if(mysqli_fetch_assoc($result)){
       echo "
       <script>
           alert('Email Sudah Terdaftar!');
           document.location.href = 'signup.php'
       </script>
       ";
       return false;
   }

   // Cek confirmation password
   if($password !== $password2){
       echo "
       <script type='text/javascript'>
         setTimeout(function () { 
            Swal.fire('Sign Up Fail!', 
            'Password not Match!', 
            'error');},100);
            </script>
       ";
       return false;
   }

   // Enkripsi password
   // METODE 1 DISARANKAN
   $password = password_hash($password, PASSWORD_DEFAULT);
   $num = rand(0,100000);
   // METODE 2
   // $password = md5($password);

   // Insert data
   $query = "INSERT INTO user 
               values 
               ('','$email','$fullname','$phone','$password','','$num')";
   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}

function account($email){
    global $conn;
        $query = "SELECT * FROM user 
                    WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $result;
}

function name($email){
    global $conn;
        $query = "SELECT * FROM user 
                    WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $name = $row["full_name"];
        return $name;
}

function remove(){
    echo "BERHASIL";
}

function notification($notif){
    if($notif===0){
        echo"";
    }elseif($notif<10){
        echo "<div class='notification-cart' 
        style=' 
        padding-top:2px;
        padding-bottom:2px;
        padding-left:8px;
        padding-right:8px;'> $notif </div>";
     }elseif($notif>9){
        echo "<div class='notification-cart' 
        style=' 
        padding-top:4px;
        padding-bottom:4px;
        padding-left:6px;
        padding-right:6px;'> $notif </div>";
     }elseif($notif>100){
        echo "<div class='notification-cart' 
        style=' 
        padding-top:10px;
        padding-bottom:10px;
        padding-left:5px;
        padding-right:5px;'> $notif </div>";
     }
}


?>