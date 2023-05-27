<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Bu kullanıcı zaten kayıtlı!';

   }else{

      if($pass != $cpass){
         $error[] = 'Girdiğiniz şifre uyuşmuyor!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gezinti - Kayıt Ol</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Kayıt Ol</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="İsminizi girin">
      <input type="email" name="email" required placeholder="Email girin">
      <input type="password" name="password" required placeholder="Şifre girin">
      <input type="password" name="cpassword" required placeholder="Şifrenizi onaylayın">
      <select name="user_type">
         <option value="user">Kullanıcı</option>
         <option value="admin">Yönetici</option>
      </select>
      <input type="submit" name="submit" value="Kayıt Ol" class="form-btn">
      <p>Zaten bir hesabınız var mı? <a href="login_form.php">Giriş Yap</a></p>
   </form>

</div>

</body>
</html>