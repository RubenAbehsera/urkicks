<?php 
    include('../include/connexion_local.php');
    include('../include/verification_connect.php');
    include('../include/header_admin.php');
    $session = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Admin Home</title>
</head>

<body>
    <?php
    $sql = 'SELECT admin_nom, admin_prenom FROM admin WHERE id_admin = '.$session.'';
    $query = mysqli_query($lien,$sql);
    $result =  mysqli_fetch_assoc($query);
    echo('<h4 class="grey-text title-collection center">Bienvenue</h4   >');
    echo('<h4 class =" black-text title-collection center">'.$result["admin_prenom"]." ".$result["admin_nom"].'</h4>');
?>
    <div class="row home_main">
        <div class="col s4  offset-s1 home_item">
            <a href="./admin_index.php">
                <h5 class="home_item-text center  ">Modifier un article</h5>
            </a>
        </div>
        <div class="col s4 offset-s2  home_item ">
            <a href="./admin.php">
                <h5 class="home_item-text center ">Ajouter un article</h5>
            </a>
        </div>

    </div>
</body>

</html>