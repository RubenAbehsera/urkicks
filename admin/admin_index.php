<?php 
    include('../include/connexion_local.php');
    include('../include/verification_connect.php');
    include('../include/header_admin.php');
    if(isset($_GET["id"])){
        echo($_GET["id"]);  
        $id_delete = $_GET['id'];
        $sql_delete = 'DELETE FROM article WHERE id_article ='.$id_delete.'';
        $query_delete =  mysqli_query($lien,$sql_delete);   
        header("location:admin_index.php");
    
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Admin Index</title>
</head>

<body>
    <h3 class="grey-text title-collection center">Sneakers sur le site</h3>
    <?php
$succes = $_GET["succes"];
echo($succes);

$sql = 'SELECT * from article order by article_nom';
$query = mysqli_query($lien,$sql);
echo('<div class="row">');
    while($result =  mysqli_fetch_assoc($query)){
        $id_article = $result["id_article"];

            echo('<div class="col center s4 offset-s0">');
            echo('<div class="adjust_size" style="background:url(\'../images/'.$result["article_image"].'\') no-repeat;background-size:100%; background-position:center;"></div>');
            echo('<p class="grey-text">'.$result["article_nom"].'</p>');
            echo('<div class="contain_text">');
            echo('<a href="./change_info.php?id='.$result["id_article"].'">');
            echo('Modifier');
            echo('</a>');
            echo ("<a class=\"red-text\" href=\"javascript:if(  confirm('Etes vous sûr(e) de vouloir supprimer ce plat ?')){document.location.href='admin_index.php?id=$id_article';}\"> Supprimer");           
            echo('</a>');
            echo('</div>');
            echo('</div>');
    }
echo('</div>');



?>
</body>

</html>