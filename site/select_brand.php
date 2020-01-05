<?php
include('../include/connexion_local.php');
include('../include/header_site.php');
$brandID = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/site.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Trier par marque</title>
</head>

<body>
    <h3 class="grey-text title-collection center"><?php echo($our_collection); ?></h3>

    <?php
$sql_brand = 'SELECT * from marque';
$query_brand = mysqli_query($lien,$sql_brand);
echo('<div class="brand-custom" style="display:flex; justify-content:center;">');
        while($result_brand = mysqli_fetch_assoc($query_brand)){
            echo('<a href= "./select_brand.php?id='.$result_brand["id_marque"].'&langue='.$langue.'">');
            echo('<div class="js_brand"style="background:url('.$result_brand["marque_image"].')no-repeat;background-size:100%;"></div>');
            echo('</a>');
        };
echo('</div>');
$sql = 'SELECT * FROM article, marque WHERE article_marque = '.$brandID.' AND id_marque ="'.$brandID.'" order by article_nom';
$query = mysqli_query($lien,$sql);
echo('<div class="row">');
    while($resultBrand = mysqli_fetch_assoc($query)){
        echo('<a href="./article.php?id='.$resultBrand["id_article"].'&langue='.$langue.'">');
            echo('<div class="col center s4 offset-s0">');
            echo('<div class="adjust_size" style="background:url(\'../images/'.$resultBrand["article_image"].'\') no-repeat;background-size:100%; background-position:center;"></div>');
            $sql2= 'SELECT marque_nom from marque, article where id_marque = article_marque and id_article = '.$resultBrand["id_article"].'' ;
            $query2 = mysqli_query($lien,$sql2);
            while($result2 = mysqli_fetch_assoc($query2)){
                echo('<p class="adjust_size-brand">'.$result2["marque_nom"].'</p>');
            };
            echo('<p class="grey-text">'.$resultBrand["article_nom"].'</p>');
            echo('<p class="adjust_size-price">'.$resultBrand["article_prix"].' EUR</p>');
            echo('</div>');
        echo('</a>');
    }
echo('</div>');

include('../include/footer_site.php');
?>
</body>

</html>