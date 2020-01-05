<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <title>footer</title>
</head>

<body>
    <div class="footer  row">
        <div class="social_medias col s2 center     ">
            <img class="social-media" src="../images/social_media/instagram.png" alt="instagram">
            <img class="social-media" src="../images/social_media/facebook.png" alt="facebook">
            <img class="social-media" src="../images/social_media/twitter.png" alt="twitter">
        </div>
        <div class="mid col s4 offset-s2 center">
            <p class="mid-text"><?php echo($footer_text)    ;?></p>
            <button class="news">
                newsletter
            </button>
        </div>
        <div class="col offset-s2 center">
            <ul class="list-footer">
                <li>FAQ</li>
                <li><?php echo($footer_privacy);?></li>
                <li><?php echo($footer_help);?></li>
                <li>CONTACT</li>
                <li><?php echo($footer_legal );?></li>
                <li><?php echo($footer_conditions);?></li>
            </ul>
        </div>
    </div>

</body>

</html>