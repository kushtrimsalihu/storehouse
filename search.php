<?php include "./includes/header.php"; ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kerko...</h6>

        <form action="" method="post">

            <div class="input-group">
                <input type="text" name="search" class="form-control" id="">
                <div class="input-group-append">
                    <button type="submit" name="submit" class="btn btn-primary">Kerko</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
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
                            if(isset($_POST['submit'])){
                                $search = $_POST['search'];

                                $query = "SELECT * FROM artikuj WHERE klienti LIKE '%$search%' OR nr_tel LIKE '%$search%'";
                                $search_query = mysqli_query($connection,$query);
                                if(!$search_query){
                                    die("QUERY FAILED ." . mysqli_error($connection));
                                }
                                $count = mysqli_num_rows($search_query);
                                if($count > 0){
                                    echo "<div class='alert alert-success'>Te dhënat qe keni kerkuar u filtruan.</div>";
                                  while($row = mysqli_fetch_assoc($search_query)){
                                $klienti = $row['klienti'];
                                $nr_tel = $row['nr_tel'];                                            
                                $artikulli = $row['emri_artikullit_id'];
                                $gjeresia = $row['gjeresia'];
                                $gjatesia = $row['gjatesia'];
                                $qmimi = $row['qmimi'];
                                $sasia = $row['sasia'];
                                $totali = $row['totali'];
                                $totali = (double)$qmimi * (double)$sasia;
                                $pershkrimi = $row['pershkrimi'];
                                $data = date("d-m-Y"); 


                                  
                         

                            echo "<tr>";
                            echo "<td>$klienti</td>";
                            echo "<td>$nr_tel</td>";
                              //relation with another table
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
                                }else{
                                    echo "<div class='alert alert-danger'>Nuk eshte gjetur asnje e dhene me fjalen: <strong>{$search}</strong></div>";
                                }   
                                   
                         ?>
                </tbody>

            </table>
                <tr>
                    <td colspan="10">
                         <?php
                                $query2 = "SELECT SUM(totali) AS Totali FROM artikuj WHERE klienti LIKE '%$search%' OR nr_tel LIKE '%$search%'";
                                $result = mysqli_query($connection,$query2); 
                                $row = mysqli_fetch_assoc($result); 
                                echo "<h3 id='totalAmount'>Totali : ". $sum = $row['Totali']."</h3>";
                            ?>
                </td>
            </tr>
        </div>
        <?php }
             ?>
    </div>


<?php include "includes/footer.php" ?>
