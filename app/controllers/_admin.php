<?php
require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php');
require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'functions.php');

$currentUser = $_SESSION['auth'];

$deleteUserId = (!empty($_POST['deleteUser'])) ? $_POST['deleteUser'] : null;
$deletePostId = (!empty($_POST['deletePost'])) ? $_POST['deletePost'] : null;

$deleteUserSuccess = null;
$deleteUserError = null;

$deletePostSuccess = null;
$deletePostError = null;


if (!is_null($deleteUserId)) {
    $result = mysqli->query("DELETE FROM user WHERE id = $deleteUserId");
    if ($result) {
        $deleteUserSuccess = "L'utilisateur a bien été supprimé !";
    } else {
        $deleteUserError = "Il y a eu une erreur lors de la suppression de l'utilisateur. Veuillez réessayer";
    }
}



if (!is_null($deletePostId)) {
    $result = mysqli->query("DELETE FROM articles WHERE idArticle = $deletePostId");
    if ($result) {
        $deletePostSuccess = "Le Post a bien été supprimé !";
    } else {
        $deletePostError = "Il y a eu une erreur lors de la suppression du poste. Veuillez réessayer";
    }
}

$deletePostColor = ($deletePostSuccess) ? "green" : "red";
$deleteUserColor = ($deleteUserSuccess) ? "green" : "red";




$resultUser = mysqli->query('SELECT * FROM user ORDER BY id DESC');
$resultPost = mysqli->query('SELECT * FROM articles INNER JOIN user ON user.id = articles.idUser ORDER BY dateOfPost DESC');