    <?php 
        session_start();
        include('../include/connexion_local.php');
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
        <title>Login</title>
    </head>

    <body>
        <?php  
if(!(empty($_POST))){
    
    $sql = "select * from admin where admin_mail ='".str_replace("'","\'",$_POST["mail"])."' and admin_mdp='".str_replace("'","\'",MD5($_POST["password"]))."'";
    $query = mysqli_query($lien,$sql); 
    $result = mysqli_fetch_assoc($query);
    
    if($result["admin_mail"] != ''){
        $_SESSION["session"] = $result["id_admin"];
        header('Location: admin_home.php?id='.$_SESSION["session"].'');
    }
    else{
        echo('<div class="alert alert-danger" role="alert">
        Erreur, identifiants incorrects !
        </div>');
    }
    
    
}else{
    
}?>
        <div class="container  h-50 w-50 modal-dialog-centered">
            <h2 class="title">Connexion espace administrateur</h2>
            <form method=post action="login.php" id="form">
                <div class="form-group">
                    <label>Veuillez entrez votre mail:</label>
                    <input type="email" class="form-control" name="mail" placeholder="adresse mail">
                </div>
                <div class="form-group">
                    <label>Veuillez entrez votre mot de passe:</label>
                    <input type="password" class="form-control" name="password" placeholder="mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary center-block">Submit</button>
            </form>
        </div>
    </body>

    </html>