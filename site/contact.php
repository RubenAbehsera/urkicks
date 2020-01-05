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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Contact</title>
</head>

<body>
    <h1 class="center grey-text"><?php echo($contactUs);?></h1>
    <div class="row">
        <form class="col s6 offset-s3" method="post">
            <div class="row">
                <div class="input-field col s6 ">
                    <input name="last_name" type="text" class="validate">
                    <label for="last_name" class="color_label"><?php echo($contactName);?></label>
                </div>
                <div class="input-field col s6">
                    <input name="first_name" type="text" class="validate">
                    <label for="first_name" class="color_label"><?php echo($contactPre);?></label>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="input-field col s6  offset-s3">
            <input name="mail" type="text" class="validate">
            <label for="mail" class="color_label"><?php echo($contactMail);?></label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s3  offset-s3">
            <input name="subject" type="text" class="validate">
            <label for="subject" class="color_label"><?php echo($contactSubject);?></label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6  offset-s3">
            <textarea name="textarea1" class="materialize-textarea"></textarea>
            <label for="textarea1" class="color_label"><?php echo($contactMessage);?></label>
        </div>
    </div>
    <div class="row">
        <button class="btn waves-effect waves-light offset-s3 col s1 contact_button" type="submit"
            name="contact_btn"><?php echo($contactSend);?></button>
    </div>
    </form>
    </div>
    <?php    
    $nom = strtolower ( strtolower (encode($_POST["last_name"])));
    $prenom =  strtolower (encode($_POST["first_name"]));
    $mail =  strtolower (encode($_POST["mail"]));
    $subject =  strtolower (encode($_POST["subject"]));
    $message =  strtolower (encode($_POST["textarea1"]));
    $date = date("Y-m-d");

    if(isset($_POST["contact_btn"])){
        $sqlContact = "INSERT INTO contact (`id_contact`, `contact_nom`, `contact_prenom`, `contact_mail`, `contact_objet`, `contact_message`, `contact_date`)";
        $sqlContact.= "VALUES (NULL, '".$nom."', '".$prenom."', '".$mail."', '".$subject."', '".$message."', '".$date."')";
        $queryContact = mysqli_query($lien,$sqlContact);
    }
    function  encode($value){
        global $lien;
        return mysqli_real_escape_string($lien, trim($value));
    }
    ?>
</body>

</html>