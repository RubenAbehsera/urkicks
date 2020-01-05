<?php
include('../include/connexion_local.php');
include('../include/header_site.php');

$sneakerID = $_GET['id'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/site.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Article</title>
</head>

<body>

    <?php

$sql_article = 'SELECT * from article where id_article = '.$sneakerID.'';
$query_article = mysqli_query($lien,$sql_article);
echo('<div class="row">');
while($result_article =  mysqli_fetch_assoc($query_article)){
        echo('<div class="col s4 offset-s1 adjust_size_article" style="background:url(\'../images/'.$result_article["article_image"].'\') no-repeat;background-size:100%; background-position:center;"></div>');
        echo('<div class="col s4 offset-s2 border center"> ');
            $sql2= 'SELECT marque_nom from marque, article where id_marque = article_marque';
            $query2 = mysqli_query($lien,$sql2);
            $result2 =  mysqli_fetch_assoc($query2);
            echo('<p class="center">'.$result2["marque_nom"].'</p>');
            echo('<h5 class="center">'.$result_article["article_nom"].'</h5>');
            echo('<p>'.$result_article["article_prix"].' EUR</p>');
            echo('<div class="input-field col s12">');
                echo('<select class="browser-default" name="cars">');
                $sql_size= 'SELECT * from taille';
                $query_size = mysqli_query($lien,$sql_size);
                while($result_size =  mysqli_fetch_assoc($query_size)){
                    echo('<option value='.$result_size["id_taille"].'>'.$result_size["taille_valeur"].'</option>');
                };
                echo('</select>');
            echo('</div>');
            echo('<div class="space_down">');
                echo('<a class="white-text black waves-effect waves-light btn-small col s6 add_cart">Add to cart</a>');
                echo('<a class="grey waves-effect waves-light btn-small col s5 offset-s1 add_cart">Favorite</a>');
            echo('</div>');
            echo('<p class="center text-gris grey-text" style="margin-top: 180px;">');
            if($langue === "en"){echo($result_article["article_description"]);}elseif($langue === "es"){echo($result_article["article_description_es"]);} else{echo($result_article["article_description_fr"]);}
            echo('</p>');
        echo('</div>');
    }
echo('</div>');
include('../include/footer_site.php');

?>

</body>

</html>