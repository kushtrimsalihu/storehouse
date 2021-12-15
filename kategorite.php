<?php include "./includes/header.php"; ?>



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">

            <div class="col-lg-6">

                <?php
            if(isset($_POST['submit'])){
$item = $_POST['item'];

if($item == "" || empty($item)){
    echo "Kjo fushe nuk mund te jete e zbrazet";
}else{
$query = "INSERT INTO emri_artikullit (item) VALUES ('{$item}')";
$create_kategori = mysqli_query($connection,$query);

if(!$create_kategori){
    die("QUERY FAILED" . mysqli_error($connection));
}
}
            }



                ?>


                <form action="" method="post">
                    <div class="form-group">
                        <label for="cat-title">Shto Kategori</label>
                        <input class="form-control" type="text" name="item">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Shto Kategori">
                    </div>
                </form>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="cat-title">Ndrysho Kategori</label>
 <?php
    if(isset($_GET['edit'])){
        $item_id = $_GET['edit'];
        $query = "SELECT * FROM emri_artikullit WHERE item_id = {$item_id}";
        $select_emri_artikullit_id = mysqli_query($connection,$query); 

        while($row = mysqli_fetch_assoc($select_emri_artikullit_id)){
            $item_id = $row['item_id'];
            $item = $row['item'];
      
        ?>
          <input value="<?php if(isset($item)) {
              echo $item; } ?>" class="form-control" type="text" name="item">
   <?php }  } ?>

<?php
  if(isset($_POST['update_category'])){
    $the_item = $_POST['item'];

    $query= "UPDATE  emri_artikullit set item = '{$the_item}' WHERE item_id = {$item_id}";
    $update_query = mysqli_query($connection,$query);
    header("Location: kategorite.php");
    die("QUERY FAILED" . mysqli_error($connection));


}
?>


                      
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="update_category" value="Ndrysho Kategori">
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <?php
                $query = "SELECT * FROM emri_artikullit";
                $select_emri_artikullit_query = mysqli_query($connection,$query);

                ?>
                <table class="table table-bordered table-hovered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Kategorite</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                while($row = mysqli_fetch_assoc($select_emri_artikullit_query)){
                    $item_id = $row['item_id'];
                    $item = $row['item'];

                    echo "<tr>";
                   echo "<td>{$item_id}</td>";
                   echo "<td>{$item}</td>";
                   echo "<td><a onClick=\" javascript: return confirm('A jeni i sigurt se deshironi ta fshini kete?'); \" class='modify btn btn-danger' href='kategorite.php?delete={$item_id}'>Fshije</a></td>";
                   echo "<td><a class='modify btn btn-warning' href='kategorite.php?edit={$item_id}'>Ndrysho</a></td>";
                   echo "</tr>"; 
                }
                    ?>

                    <?php

                    if(isset($_GET['delete'])){
                        $the_item_id = $_GET['delete'];

                        $query= "DELETE FROM emri_artikullit WHERE item_id = {$the_item_id}";
                        $delete_query = mysqli_query($connection,$query);
                        header("Location: kategorite.php");

                    }

                    ?>
                  

                    </tbody>
                </table>
            </div>


        </div>



    </div>
</div>



<?php include "./includes/footer.php"; ?>