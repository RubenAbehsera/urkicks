<?php 
    session_start();
    if (isset($_POST["confirm"])){
        header('location:admin_index.php');
    }

    include('../include/connexion_local.php');
    include('../include/verification_connect.php');
    include('../include/header_admin.php');
    include('../include/functions.php');

    
    $idChange =substr(($_SERVER['REQUEST_URI']),strrpos(($_SERVER['REQUEST_URI']),"=")+1);
    $sqlChange= 'SELECT * from article where id_article = '.$idChange.'';
    $queryChange = mysqli_query($lien,$sqlChange);
    $resultChange =  mysqli_fetch_assoc($queryChange);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/admin.css">
    <title>Admnistration</title>
</head>

<body>

    <h2 class="text-center ">
        Modifier l'article
    </h2>
    <div class="container">
        <form class="container w-50 mt-1 " method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nom de la sneakers</label>
                <input type="text" class="form-control" name="sneaker_name"
                    value="<?php echo($resultChange['article_nom']);?>" required>
            </div>
            <div class="form-group">
                <label>Description Anglais</label>
                <textarea class="form-control" name="sneaker_description"
                required><?php echo($resultChange['article_description']);?></textarea>
            </div>
            <div class="form-group">
                <label>Description Français</label>
                <textarea class="form-control" name="sneaker_description_fr"
                required><?php echo($resultChange['article_description_fr']);?> </textarea>
            </div>
            <div class="form-group">
                <label>Description Espagnol</label>
                <textarea class="form-control" name="sneaker_description_es"
                required><?php echo($resultChange['article_description_es']);?></textarea>
            </div>
            <div class="form-group">
                <label>Prix</label>
                <input type="number" class="form-control" name="sneaker_price"
                    value="<?php echo($resultChange['article_prix']);?>" required>
            </div>
            <div class="form-group">
                <label>Date de sortie:</label>
                <input type="text" class="form-control" name="sneaker_date"
                    value="<?php echo($resultChange['article_date']);?>" required>
            </div>

            <div class="form-group">
                <legend>Ajouter une image</legend>
                <input type="file" accept="image/png, image/jpeg" name="sneaker_image">
            </div>
            <legend>Marque</legend>
            <div class="form-group ">
                <?php 
            $sql = 'SELECT * from marque';
            $query = mysqli_query($lien,$sql);
            
            while($result =  mysqli_fetch_assoc($query)){
                echo('<div class="mr-3">');
                echo('<input  type="radio" id="'.$result["marque_nom"].'" name="sneaker_marque" value="'.$result["id_marque"].'"');
                if($resultChange["article_marque"] === $result["id_marque"] ){
                    echo('checked');
                }
                echo('>'); 
                echo('<label>'.$result["marque_nom"].'</label>');
                echo('</div>');
            }
                
            ?>
            </div>
            <button name="confirm" type="submit" class="btn btn-primary center-block">Submit</button>
        </form>
        <?php
        $nom = encode($_POST["sneaker_name"]);
        $description = encode($_POST["sneaker_description"]);
        $description_fr = encode($_POST["sneaker_description_fr"]);
        $description_es = encode($_POST["sneaker_description_es"]);
        $prix =encode($_POST["sneaker_price"]);
        $date =encode($_POST["sneaker_date"]);
        $image = encode($_FILES["sneaker_image"]["name"]);
        $marque=encode($_POST["sneaker_marque"]);

        if($image === "" ){
            $image = $resultChange["article_image"];
        }else{

            $type_sep=strrpos($_FILES["sneaker_image"]["name"],".");
            $type = substr($_FILES["sneaker_image"]["name"],$type_sep+1);
        if(($type != "png")&&($type != "jpg")){
            echo("Mauvais format d'image");
        }else{
            $image = encode($_FILES["sneaker_image"]["name"]);
            $chemin= '../images/';
            $upload = $chemin . basename($_FILES["sneaker_image"]["name"]);
            if(move_uploaded_file($_FILES["sneaker_image"]["tmp_name"],$chemin.$image)){
                echo('La photo a bien été uploadée');
            }else{
                echo('erreur dans le téléchargement de la photo');
            }
        }
        }
        if (isset($_POST["confirm"])){
            $sqlModif ='UPDATE article SET article_nom = "'.$nom.'", article_description = "'.$description.'",article_description_fr = "'.$description_fr.'",article_description_es = "'.$description_es.'", article_prix = "'.$prix.'", article_date = "'.$date.'", article_image = "'.$image.'", article_marque = "'.$marque.'" , article_admin = "'.$_SESSION["session"].'"WHERE id_article = '.$idChange.'';
            $queryModif = mysqli_query($lien,$sqlModif);
            $_SESSION["succes"]= "Article modifié";
        }
    
        ?>
    </div>
</body>

</html>