<?php 
    include('../include/connexion_local.php');
    include('../include/header_site.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/site.css">
    <script src="../js/index.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Accueil</title>
</head>

<body>
    <h3 class="grey-text title-collection center"><?php echo($NewsPage." 2019");?></h3>

    <?php 
    $sqlNews = 'SELECT * FROM article WHERE article_date > "2019-01-01" order by article_date desc ';
    $queryNews = mysqli_query($lien,$sqlNews);
    $resultNews =  mysqli_fetch_assoc($queryNews);
    echo('<div class="row">');
    while($resultNews = mysqli_fetch_assoc($queryNews)){
        echo('<a href="./article.php?id='.$resultNews["id_article"].'&langue='.$langue.'">');
            echo('<div class="col center s4 offset-s0">');
            echo('<div class="adjust_size-date">'.$resultNews["article_date"].'<p class="grey-text">'.$resultNews["article_nom"].'</p></div>');           
            echo('<div class="adjust_size size_news" style="background:url(\'../images/'.$resultNews["article_image"].'\') no-repeat;background-size:100%; background-position:center;"></div>');
            echo('</div>');
        echo('</a>');
    }
echo('</div>');



include('../include/footer_site.php');
?>
</body>

</html>