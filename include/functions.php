<?php
function encode($value){
    global $lien;
    return mysqli_real_escape_string($lien, trim($value));
}
?>