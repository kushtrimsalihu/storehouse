<?php include "includes/header.php"; ?>

<?php
if(isset($_SESSION['username'])){
 
$username = $_SESSION['username'];

$query = "SELECT * FROM users WHERE username = '{$username}'";
$select_user_profile = mysqli_query($connection,$query);


while($row = mysqli_fetch_array($select_user_profile)){
    $username = $row['username'];
    $user_password = $row['user_password'];
}
}
?>

<?php
if(isset($_POST['edit_user'])){
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];


if(!empty($username && !empty($user_password))){
     $query = "UPDATE users SET username = '{$username}', user_password = '{$user_password}' WHERE username = '{$username}'";
     $edit_profile_query = mysqli_query($connection,$query);
     echo  "<div class='alert alert-success'>Profili u ndryshua.</div>";
}else{
    echo "<div class='alert alert-danger'>Username dhe Passwordi duhet te plotesohen !!</div>";
}
}


?>

<div class="col-lg-12">
<h1 class="page-header">
Mirë se erdhët tek profili juaj 
<span class="capitalize"><?php echo $_SESSION['username']; ?>
</span>
</h1>
</div>
<div class="col-lg-6">
    <form action="" method="post">
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_user" value="Ndrysho Profilin">
</div>


</form>


</div>




<?php include "includes/footer.php"; ?>