<?php 
    include('../include/connexion_local.php');
    include('../include/header_site.php');
    $sqlYeezi = 'SELECT id_article FROM article WHERE article_nom = "Originals x Kanye West Yeezy Boost 350 V2"';
    $queryYeezi=mysqli_query($lien,$sqlYeezi);
    $idYeezi =  mysqli_fetch_assoc($queryYeezi);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/site.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="../js/index.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Accueil</title>
</head>

<body>

    <div class="big-yzi row  ">
        <div class="height-yzi " class=" yzi-text col s6 center offset-s1">
            <p id="animateTwo" class=" new-text"><?php echo($news);?></p>
            <p id="animate" class="yeezi-text">Yeezy Boost 350 V2 'Clay'</p>
            <a href='./article.php?id=<?php echo $idYeezi["id_article"];?>&langue=<?php echo $langue; ?>'><button
                    id="BuyBtn" class="btn white-text black col s2 offset-s9 "><?php echo($buy_know)?></button></a>
        </div>
    </div>
    <div class="row sectionTwo">
        <div class="col s6 custom-imgPage"></div>
        <div class="col s6  sectionTwoRight">
            <p class="t1-sectionTwo"><?php echo($the_classics);?></p>
            <br>
            <p class="t2-sectionTwo">Blazer Mid ’77 Vintage ‘Pacific Blue’</p>
            <p class="t3-sectionTwo left"><?php echo($classics_description);?></p>
        </div>
    </div>
    <a href="./collection.php">
        <h3 class="center grey-text "><?php echo($our_models); ?></h3>
    </a>
    <div class="row sectionThree">

        <!--
        Pour le slider j'ai utilisé la méthode avec le i++ pour éviter d'avoir deux fois la même 
        paire de basket, ce qui aurait été possible on relance le mt_rand au lieu de mettre i++.
        Le code est allongé mais au moins on aura pas deux paires identiques dans le slider.
    -->

        <div class="slider  col s10 offset-s1  ">
            <div class="slider_arrow " onclick="view_right()">
                <img class="slider_arrow-img" src="../images/landingpage/back.png" alt="back">
            </div>
            <?php
            $i = mt_rand(1,5);
            for($a = 0; $a<4;$a++){
                $sqlSlider = 'SELECT * FROM article WHERE id_article = '.$i.' ';
                $querySlider = mysqli_query($lien,$sqlSlider);
                $resultSlider =  mysqli_fetch_assoc($querySlider);
                echo('<a href="./article.php?id='.$i.'&langue='.$langue.'"><div class="slider_item" style="background:url(\'../images/'.$resultSlider["article_image"].'\') no-repeat;background-size:100%; background-position:center;"></div></a>');
                $i++;
            }
?>
            <div class="slider_arrow " onclick="view_right()">
                <img class="slider_arrow-img" src="../images/landingpage/right.png" alt="back">
            </div>
        </div>

        <!---->
        <?php 
        $i = mt_rand(9,11);
        for($none =0; $none<2;$none++){
            echo(' <div class="slider  col s10 offset-s1 " style="display:none; ">');
                echo('<div class="slider_arrow " onclick="view_right()">');
                echo('<img class="slider_arrow-img" src="../images/landingpage/back.png" alt="back">');
                echo('</div>');
            
                for($a = 0; $a<4;$a++){
                    $sqlSlider = 'SELECT * FROM article WHERE id_article = '.$i.' ';
                    $querySlider = mysqli_query($lien,$sqlSlider);
                    $resultSlider =  mysqli_fetch_assoc($querySlider);
                    echo('<a href="./article.php?id='.$i.'&langue='.$langue.'"><div class="slider_item" style="background:url(\'../images/'.$resultSlider["article_image"].'\') no-repeat;background-size:100%; background-position:center;"></div></a>');
                    $i++;
                }
                echo('<div class="slider_arrow " onclick="view_right()">');
                    echo(' <img class="slider_arrow-img" src="../images/landingpage/right.png" alt="back">'); 
                echo('</div>');
            echo('</div>');
            $i = mt_rand(15,17);
} 
?>
    </div>
    <?php     
include('../include/footer_site.php');
?>
</body>

</html>