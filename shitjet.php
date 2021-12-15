<?php include "./includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Te gjitha Shitjet</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="color: black;" id="dataTable" width="100%"
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
                            <th colspan="2" style="
    text-align: center;
">Modifiko</th>
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
                            <th colspan="2" style="
    text-align: center;
">Modifiko</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>


                            <?php 
                                        
                                        $query = "SELECT * FROM artikuj ORDER BY id DESC";
                                        $artikuj_show_query = mysqli_query($connection,$query);
                                        if(!$artikuj_show_query){
                                            die("QUERY FAILED" . mysqli_error($connection));
                                        } 
                                        while($row = mysqli_fetch_assoc($artikuj_show_query)){
                                            $id = $row['id'];
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

                                        echo "<td> $gjeresia  cm</td>";
                                        echo " <td>$gjatesia  cm</td>";
                                        echo "<td>$qmimi</td>";
                                        echo "<td> $sasia</td>";
                                        echo "<td>$totali Euro</td>";
                                        echo "<td>$pershkrimi</td>";
                                        echo "<td>$data</td>";
                                        echo "<td><a class='btn btn-warning' href='posts.php?source=ndrysho_shitjet&p_id={$id}'>Ndrysho</a></td>";
                                        echo "<td><a onClick=\"javascript: return confirm('A jeni i sigurt se deshironi ta fshini kete?'); \" class='btn btn-danger' href='shitjet.php?delete={$id}'>Fshije</a></td>";
                                         echo "</tr>";  
                                            
                                       }                                       
                                        ?>

                    </tbody>
                </table>
                <?php
                                $query2 = "SELECT SUM(totali) AS Totali FROM artikuj ";
                                $result = mysqli_query($connection,$query2); 
                                $row = mysqli_fetch_assoc($result); 
                                echo "<h3 id='totalAmount'>Totali : ". $sum = $row['Totali']."</h3>";
?>

                <?php

                if(isset($_GET['delete'])){
                    $the_post_id = $_GET['delete'];

                    $query = "DELETE FROM artikuj WHERE id = {$the_post_id}";
                    $delete_query = mysqli_query($connection,$query);

                    header("Location: shitjet.php");
                }

                ?>


            </div>
        </div>
    </div>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include "./includes/footer.php"; ?>