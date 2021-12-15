
<?php
if(isset($_GET['source'])){
    $source = $_GET['source'];
}else{
    $source ="";
}
switch($source){
    case 'shto_shitje':
        include "shto_shitje.php";
        break;
        case 'ndrysho_shitjet':
            include "ndrysho_shitjet.php";
            break;
    
            default:
            include "shitjet.php";
            break;
       }
?>



