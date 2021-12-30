<?php
//FUNCTIONS
function acceptableImgSize($img_size){
    return $img_size>constant('MAX_SIZE');
}
function unlinkOldImg($pathFromRoot,$old_img, $sessionName){
    $path = $_SERVER['DOCUMENT_ROOT'] . $pathFromRoot . $old_img;
    $remove = unlink($path);
    if ($old_img != "") {
        if ($remove == false) {
            $_SESSION[$sessionName] = "Nepodarilo sa vymazať starý obrázok z databázy! ";
        } else {
            $_SESSION[$sessionName] = "Starý obrázok bol odstránený z databázy. ";
        }
    }
}
function manageOrderCheckbox($iconName, $status, $wantedStatus){
    echo "<i class='".$iconName."'>&nbsp;";
    echo "<input type='radio' name='orderRadio' value='".$wantedStatus."'";
    if ($status==$wantedStatus){
        echo "checked";
    }
    else{
        echo "";
    }
    echo "></i>";
}

?>
