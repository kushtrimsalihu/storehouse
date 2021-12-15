<?php include "includes/db.php"; ?>
<?php session_start(); ?>
<?php 

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);
    
$query = "SELECT * FROM users WHERE username = '{$username}'";
$user_query_select = mysqli_query($connection,$query);
if(!$user_query_select){
    die("QUERY FAILED " . mysqli_error($connection));
}
while($row= mysqli_fetch_assoc($user_query_select)){
    $db_id = $row['user_id'];
    $db_username = $row['username'];
    $db_password = $row['user_password'];

}
if($username === $db_username && $password === $db_password){
$_SESSION['username'] = $db_username;
header("Location: index.php");
}else{
    header("Location: login.php");
}


}

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gerdofci - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img class="w-100 h-100" src="./img/login_img.png" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Mirë se Erdhet Përseri!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input name="username" type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username...">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password">
                                        </div>                                 
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">login</button>
                                        <hr>

                                    </form>
                                    <hr>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>