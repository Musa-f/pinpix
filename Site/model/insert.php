<?php
function insertUser($bdd,$name_user, $pwd_user, $mail_user, $id_image, $id_role){

    try{
         //On insère toutes les infos de l user dans la table users
        $req = $bdd->prepare("INSERT INTO users (name_user, pwd_user, mail_user,   id_image, id_role)VALUES
        (:name_user, :pwd_user, :mail_user, :id_image, :id_role)");
        
        $req->execute(array( "name_user" => $name_user, "pwd_user" => $pwd_user, "mail_user" => $mail_user, "id_image" => $id_image, "id_role" => $id_role));
        $req->closeCursor();
    }catch(Exception $e){
        die("error : ".$e->getMessage());
    }
}

function insertIMG($bdd,$url_image){

    try{
         //On insère l'image
        $req = $bdd->prepare(
            "INSERT INTO images(url_image) VALUES
            (:url_image)"
        );
        
        $req->execute(array(
            "url_image" => $url_image
        ));
        $req->closeCursor();
    }catch(Exception $e){
        die("error : ".$e->getMessage());
    }
}
function insertGal($bdd,$id_image,$id_gallery){
    try{
         //On lie l' image par son ID à sa galerie
        $req = $bdd->prepare(
            "INSERT INTO links(id_image, id_gallery) VALUES
            (:id_image, :id_gallery)"
        );
        
        $req->execute(array(
            "id_image" => $id_image,
            "id_gallery" => $id_gallery
        ));
        $req->closeCursor();
    }catch(Exception $e){
        die("error : ".$e->getMessage());
    }

}
?>