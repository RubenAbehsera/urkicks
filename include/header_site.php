<?php
    if(!isset($_GET['langue'])){
        $langue ="fr";
    }else{
        $langue = $_GET['langue'];
    }
    
    if ($_GET['langue'] == 'en') 
    {
        include_once('../include/en.php');
    }
    elseif($_GET['langue'] == 'es'){
        include_once('../include/es.php');
    }
   else // Langue par défaut (ici fr)
    {
        include_once('../include/fr.php');
        
    }
    $lnChange =substr(($_SERVER['REQUEST_URI']),strrpos(($_SERVER['REQUEST_URI']),"/")+1);
    $pos = strrpos($lnChange,".")+4;   
    $lnTest = substr($lnChange,0,$pos);
    //il aurait été possible de faire en sorte que $lnTest soit comparé aux pages
    // possédant déjà un GET (?) dans l'url mais j'ai indiqué ici les pages article et select brand
    // qui sont les seules pages où il y aura un GET (en plus de la langue)
    if(($lnTest === "article.php")|| ($lnTest === "select_brand.php")){
        $and = strrpos($lnChange,"&");
        $lnTest2 = substr($lnChange,0,$and);
        }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <title>header</title>
    <link rel="shortcut icon" href="../images/favicon.ico" />
</head>

<body>
    <div class="header">
        <a href="../site/landing_page.php?langue=<?php echo($langue);?>"><img
                src="../images/landingpage/urkicks_logo.png" alt="logo" class="logo"></a>
        <a href="./<?php     if(isset($langue)&&(!isset($and))){echo($lnTest."?");}else{if(isset($and)){echo($lnTest2."&");}else{echo($lnChange."?");}}  
?>langue=fr"><img src="../images/logo/fr.png" alt="fr" class="language"></a>
        <a href="./<?php     if(isset($langue)&&(!isset($and))){echo($lnTest."?");}else{if(isset($and)){echo($lnTest2."&");}else{echo($lnChange."?");}}  
?>langue=en"><img src="../images/logo/uk.png" alt="uk" class="language"></a>
        <a href="./<?php     if(isset($langue)&&(!isset($and))){echo($lnTest."?");}else{if(isset($and)){echo($lnTest2."&");}else{echo($lnChange."?");}}  
?>langue=es"><img src="../images/logo/es.png" alt="es" class="language"></a>
        <div class="right">
            <a href="../site/news.php?langue=<?php echo($langue);?>">
                <p class="right-item"><?php echo($news_header);?></p>
            </a>
            <a href="../site/collection.php?langue=<?php echo($langue);?>">
                <p class="right-item"><?php echo($collection_header);?></p>
            </a>
            <a href="../site/contact.php?langue=<?php echo($langue);?>">
                <p class="right-item"><?php echo($contact_header);?></p>
            </a>

        </div>
    </div>
</body>

</html>