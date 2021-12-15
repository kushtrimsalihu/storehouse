<?php include "./includes/header.php"; ?>
<?php



if(isset($_POST['submit'])){ 
    $artikulli = $_POST['post_category'];
    $klienti = $_POST['klienti'];
    $nr_tel = $_POST['nr_tel']; 
    $gjeresia = $_POST['gjeresia'];
    $gjatesia = $_POST['gjatesia'];
    $qmimi = $_POST['qmimi'];
    $sasia = $_POST['sasia'];
    $totali = (double)$qmimi * (double)$sasia;
    $pershkrimi = $_POST['pershkrimi'];
    $data = date("d-m-Y"); 
    

    if(empty($klienti) || empty($nr_tel) || empty($gjeresia) || empty($gjatesia) || empty($qmimi) || empty($sasia)){
        echo "<div class='alert alert-danger'>Njera nga fushat nuk eshte ne rregull. Ju lutem kontrolloni perseri.!.</div>";
    }else{
        $query = "INSERT INTO `artikuj`(`emri_artikullit_id`,`klienti`, `nr_tel`, `gjeresia`, `gjatesia`, `qmimi`, `sasia`,`totali`,`pershkrimi`, `data`) 
        VALUES ({$artikulli},'{$klienti}',{$nr_tel},{$gjeresia},{$gjatesia},{$qmimi},{$sasia},{$totali},'{$pershkrimi}',now())";
     $add_new_client = mysqli_query($connection , $query);
       
 

      
            
            if(!$add_new_client){
                die("QUERY FAILED . " . mysqli_error($connection));
            }
            echo "<div class='alert alert-success'>U regjistrua me sukses.!.</div>";
    }
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
                        <th>Modifikimi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>

                        <form action="" method="post">
                           
                            <td>
                                <input type="text" placeholder="Emri dhe Mbiemri" name="klienti" id="">
                            </td>

                            
                           
                                              
                          
                          <td>
                                <input type="text" name="nr_tel" id="">

                            </td>

                            <td>
                                <select name="post_category" id="post_category">

                                    <?php
                                          $query = "SELECT * FROM emri_artikullit";
                                          $select_artikullin = mysqli_query($connection,$query); 
                                  
                                          while($row = mysqli_fetch_assoc($select_artikullin)){
                                              $item_id = $row['item_id'];
                                              $item = $row['item'];

                                            echo "<option value='$item_id'>{$item}</option>";

                                          }
                                       ?>

                                </select>
                            </td>
                            <td>
                                <input type="text" name="gjeresia" id="">cm
                            </td>


                            <td>
                                <input type="text" name="gjatesia" id="">cm
                            </td>


                            <td>
                                <input type="text" name="qmimi" id="">
                            </td>


                            <td>
                                <input type="text" name="sasia" id="">
                            </td>
                         
                            <td>

                                <textarea name="pershkrimi" id="" cols="30" placeholder="Shkruani gjerat qe ju duhen..."
                                    rows="2"></textarea>
                            </td>
                                          
                            <td>
                                <input type="submit" class="btn btn-success shto_shitje" name="submit" value="Ruaj">

                            </td>



                        </form>
                    </tr>

                </tbody>

            </table>

        </div>
    </div>
</div>






<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="color:black;" id="dataTable" width="100%"
            cellspacing="0">
            <thead>
                <tr>
                    <th>Klienti</th>
                    <th>Nr.Telefonit</th>
                    <th>Artikulli</th>
                    <th>Gjeresia</th>
                    <th>Gjatesia</th>
                    <th>Qmimi</th>
                    <th>Sasia</th>
                    <th>Totali</th>
                    <th>Pershkrimi</th>
                    <th>Data</th>
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
                    <th>Totali</th>
                    <th>Pershkrimi</th>
                    <th>Data</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>


                    <?php 
                                        
                                        $query = "SELECT * FROM artikuj ORDER BY id DESC LIMIT 5 ";
                                        $artikuj_show_query = mysqli_query($connection,$query);
                                        if(!$artikuj_show_query){
                                            die("QUERY FAILED" . mysqli_error($connection));
                                        } 
                                        while($row = mysqli_fetch_assoc($artikuj_show_query)){
                                            $klienti = $row['klienti'];
                                            $nr_tel = $row['nr_tel'];                                            
                                            $artikulli = $row['emri_artikullit_id'];
                                            $gjeresia = $row['gjeresia'];
                                            $gjatesia = $row['gjatesia'];
                                            $qmimi = $row['qmimi'];
                                            $sasia = $row['sasia'];
                                            $totali = $row['totali'];
                                            $pershkrimi = $row['pershkrimi'];
                                            $data = date("d-m-Y"); 
                                     

                                        echo "<tr>";
                                        echo "<td>$klienti</td>";
                                        echo "<td>$nr_tel</td>";  
                                        $query = "SELECT * FROM emri_artikullit WHERE item_id = {$artikulli}";
                                        $select_emri_artikullit_id = mysqli_query($connection,$query); 
                                
                                        while($row = mysqli_fetch_assoc($select_emri_artikullit_id)){
                                            $item_id = $row['item_id'];
                                            $item = $row['item'];
                                            echo "<td>$item</td>";
                                        }
                                        echo "<td> $gjeresia cm</td>";
                                        echo " <td>$gjatesia cm</td>";
                                        echo "<td>$qmimi</td>";
                                        echo "<td> $sasia</td>";
                                        echo "<td>$totali Euro</td>";
                                        echo "<td>$pershkrimi</td>";
                                        echo "<td>$data</td>";
                                        echo "</tr>";  
                                            
                                       }                                       
                                        ?>

            </tbody>
        </table>
    </div>
</div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include "./includes/footer.php"; ?>