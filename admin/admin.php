    <?php 
    session_start();
    include('../include/connexion_local.php');
    include('../include/verification_connect.php');
    include('../include/header_admin.php');
    include('../include/functions.php');


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

        <h2 class="text-center pt-3 ">
            Ajouter à la collection
        </h2>
        <div class="container">
            <form class="container w-50 mt-1 " method="post" action="admin.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nom de la sneakers</label>
                    <input type="text" class="form-control" name="sneaker_name" required>
                </div>
                <div class="form-group">
                    <label>Description Anglais</label>
                    <textarea class="form-control" name="sneaker_description" required></textarea>
                </div>
                <div class="form-group">
                    <label>Description Français</label>
                    <textarea class="form-control" name="sneaker_description-fr" required></textarea>
                </div>
                <div class="form-group">
                    <label>Description Espagnol</label>
                    <textarea class="form-control" name="sneaker_description-es" required></textarea>
                </div>
                <div class="form-group">
                    <label>Prix</label>
                    <input type="number" class="form-control" name="sneaker_price" placeholder="€" required>
                </div>
                <div class="form-group">
                    <label>Date de sortie:</label>
                    <input type="text" class="form-control" name="sneaker_date" placeholder="YYYY-MM-DD" required>
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
                echo('<div class="mr-3">
                    <input  type="radio" id="'.$result["marque_nom"].'" name="sneaker_marque" value="'.$result["id_marque"].'">
                    <label for="nike">'.$result["marque_nom"].'</label>
                </div>');
            }
                
            ?>
                </div>
                <button name="confirm" type="submit" class="btn btn-primary center-block">Submit</button>
            </form>
            <?php
        
        $nom='';
        $description='';
        $prix='';
        $date='';
        $image='';
        $marque='';
        $id_session= $_SESSION["session"];

        if (isset($_POST["confirm"])){
            addArticle();
        }
        function addArticle(){
            global $nom, $description, $id_session, $prix, $date, $marque, $lien;
            $nom=encode($_POST["sneaker_name"]);
            $description=encode($_POST["sneaker_description"]);
            $description_fr=encode($_POST["sneaker_description-fr"]);
            $description_es=encode($_POST["sneaker_description-es"]);

            $prix=encode($_POST["sneaker_price"]);
            $date=encode($_POST["sneaker_date"]);
            //Traitement image
            $type_sep=strrpos($_FILES["sneaker_image"]["name"],".");
            $type = substr($_FILES["sneaker_image"]["name"],$type_sep+1);
            if(($type != "png")&&($type != "jpg")){
                echo("Mauvais format d'image");
            }else{
                $image = encode($_FILES["sneaker_image"]["name"]);
                $chemin= '../images/';
                $upload = $chemin . basename($_FILES["sneaker_image"]["name"]);
                $image = str_replace(' ','_',$image);
                if(move_uploaded_file($_FILES["sneaker_image"]["tmp_name"],$chemin.$image)){
                    echo('La photo a bien été uploadée');
                }else{
                    echo('erreur dans le téléchargement de la photo');
                }
                $marque=encode($_POST["sneaker_marque"]);
                $sqlAdd = "INSERT into article (`id_article`,`article_nom`,`article_description`,`article_description_fr`,`article_description_es`,`article_prix`,`article_date`,`article_image`,`article_admin`,`article_marque`)";
                $sqlAdd.="VALUE (NULL,'$nom','$description','$description_fr','$description_es','$prix','$date','$image','$id_session','$marque')";
                $sqlAdd = strip_tags($sqlAdd);
                $queryAdd = mysqli_query($lien,$sqlAdd);
                $_SESSION["succes"]= "Article ajouté";

            }
        }

        ?>
        </div>
    </body>

    </html>