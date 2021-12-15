 <?php include "./includes/header.php";?>

 <?php
if (isset($_GET['p_id'])) {
    $the_shitjet_id = $_GET['p_id'];
}



if (isset($_POST['edit_post'])) {
    $klienti = $_POST['klienti'];
    $artikulli = $_POST['post_category'];
    $nr_tel = $_POST['nr_tel'];
    $gjeresia = $_POST['gjeresia'];
    $gjatesia = $_POST['gjatesia'];
    $qmimi = $_POST['qmimi'];
    $sasia = $_POST['sasia'];
    $totali = (double) $qmimi * (double) $sasia;
    $pershkrimi = $_POST['pershkrimi'];

    $query = "UPDATE artikuj SET klienti = '{$klienti}', nr_tel = {$nr_tel},
                                        emri_artikullit_id = {$artikulli}, gjeresia = {$gjeresia},
                                         gjatesia = {$gjatesia}, qmimi = {$qmimi},
                                         sasia={$sasia}, totali = {$totali}, pershkrimi = '{$pershkrimi}' WHERE id={$the_shitjet_id}";
    $update_post_query = mysqli_query($connection, $query);

    if (!$update_post_query) {
        die("QUERY FAILED " . mysqli_error($connection));
    }

}
$query = "SELECT * FROM artikuj WHERE id = {$the_shitjet_id}";
$select_edit_query = mysqli_query($connection, $query);
if (!$select_edit_query) {
    die("QUERY FAILED" . mysqli_error($connection));
}
while ($row = mysqli_fetch_assoc($select_edit_query)) {
    $klienti = $row['klienti'];
    $nr_tel = $row['nr_tel'];                                            
    $artikulli = $row['emri_artikullit_id'];
    $gjeresia = $row['gjeresia'];
    $gjatesia = $row['gjatesia'];
    $qmimi = $row['qmimi'];
    $sasia = $row['sasia'];
    $totali = $row['totali'];
    $pershkrimi = $row['pershkrimi'];

}

?>



 <div class="card shadow mb-4">

     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Te dhënat</h6>
     </div>

     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>Klienti</th>
                         <th>Nr.Telefonit</th>
                         <th>Artikulli</th>
                         <th>Gjeresia</th>
                         <th>Gjatesia</th>
                         <th>Qmimi</th>
                         <th>Sasia</th>
                         <th>Pershkrimi</th>
                         <th>Totali</th>
                         <th>Modifikimi</th>
                     </tr>
                 </thead>
                 <tfoot>
                     <tr>
                         <th>Klienti</th>
                         <th>Nr.Telefonit</th>
                         <th>Artikulli</th>
                         <th>Gjeresia</th>
                         <th>Gjatesia</th>
                         <th>Qmimi</th>
                         <th>Sasia</th>
                         <th>Pershkrimi</th>
                         <th>Totali</th>
                         <th>Modifikimi</th>
                     </tr>
                 </tfoot>
                 <tbody>
                     <tr>

                         <form action="" method="post">

                             <td>
                                 <input type="text" value="<?php echo $klienti ?>" placeholder="Emri dhe Mbiemri"
                                     name="klienti" id="">
                             </td>



                             <td>
                                 <input type="text" value="<?php echo $nr_tel; ?>" name="nr_tel" id="">

                             </td>


                             <td>
                                 <select name="post_category" id="post_category">

                                     <?php
$query = "SELECT * FROM emri_artikullit";
$select_artikullin = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_artikullin)) {
    $item_id = $row['item_id'];
    $item = $row['item'];

    echo "<option value='$item_id'>{$item}</option>";

}
?>

                                 </select>
                             </td>
                             <td>
                                 <input type="text" value="<?php echo $gjeresia ?>" name="gjeresia" id=""> cm
                             </td>


                             <td>
                                 <input type="text" value="<?php echo $gjatesia ?> " name="gjatesia" id="">cm
                             </td>


                             <td>
                                 <input type="text" value="<?php echo $qmimi; ?>" name="qmimi" id="">
                             </td>


                             <td>
                                 <input type="text" value="<?php echo $sasia ?>" name="sasia" id="">
                             </td>



                             <td>

                                 <textarea name="pershkrimi"  id="" cols="30"
                                     rows="2"><?php echo $pershkrimi; ?></textarea>
                             </td>

                             <td>
                                 <input type="text" value="<?php echo $totali ?>" name="totali" id="">
                             </td>

                             <td>
                                 <input type="submit" class="btn btn-success shto_shitje" name="edit_post"
                                     value="Ndrysho">

                             </td>



                         </form>
                     </tr>

                 </tbody>

             </table>

         </div>
     </div>
 </div>



 <?php include "./includes/footer.php";?>