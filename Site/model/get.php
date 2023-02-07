<?php
function getMDP($bdd,$mail_user,$pwd_user){

    try{
        //On recherche l id par le nom et le mdp
        $req = $bdd->prepare("SELECT id_user FROM users where mail_user = :mail_user and pwd_user = :pwd_user");
        $req->execute(array(
            "mail_user" => $mail_user,
            "pwd_user" => $pwd_user
        ));
        return $req; 

    }catch(Exception $e){
        die("error : ".$e->getMessage());
    }
}

function getAllUserById($bdd, $id_user){
    try{
        //On recherche tout de l utilisateur par son id
        $req = $bdd->prepare("SELECT * FROM users where id_user = :id_user");
        $req->execute(array(
            "id_user" => $id_user
        ));
        return $req; 

    }catch(Exception $e){
        die("error : ".$e->getMessage());
    }
}
function getAllUserByName($bdd, $name_user){
    try{
        //On recherche tout de l utilisateur par son nom
        $req = $bdd->prepare("SELECT * FROM users where name_user = :name_user");
        $req->execute(array(
            "name_user" => $name_user
        ));
        return $req; 

    }catch(Exception $e){
        die("error : ".$e->getMessage());
    }
}

function getIdImg($bdd,$url_image){
    try{
        //On recherche l id de l image par son url
    $req = $bdd->prepare("SELECT id_image FROM images where url_image = :url_image");
    $req->execute(array(
        "url_image" => $url_image
    ));
    return $req;
    }catch(Exception $e){
        die("error : ".$e->getMessage());
    }
}

function getImg($bdd,$id_gallery){
    try{
         //On recherche l url de l image par son id
    $req = $bdd->prepare(
        "SELECT url_image FROM images
        WHERE id_image in (SELECT id_image FROM links WHERE id_gallery = :id_gallery)");
    $req->execute(array(
        "id_gallery" => $id_gallery
    ));
    return $req;
    }catch(Exception $e){
        die("error : ".$e->getMessage());
    }
}

function getGal($bdd,$id_user){
    try{
         //On recherche la gallerie d image par id de l'utilisateur
    $req = $bdd->prepare(
        "SELECT id_gallery FROM gallery
         WHERE id_gallery in (SELECT id_gallery FROM give WHERE id_user = :id_user)");
    $req->execute(array(
        "id_user" => $id_user
    ));
    return $req;
    }catch(Exception $e){
        die("error : ".$e->getMessage());
    }
}

function getLink($bdd, $id_image, $id_gallery){
    try{
         //On recherche si l'image est déjà dans la galerie
    $req = $bdd->prepare(
        "SELECT id_gallery from links where id_image = :id_image and id_gallery = :id_gallery");
    $req->execute(array(
        "id_image" => $id_image,
        "id_gallery" => $id_gallery
    ));
    return $req;
    }catch(Exception $e){
        die("error : ".$e->getMessage());
    }
}

?>