<?php
/**
 * Created by IntelliJ IDEA.
 * User: hchridi
 * Date: 04/07/2019
 * Time: 12:48
 */
// IMPORTANT in normal case we should never require the config or db files in every file , we have to add it to the autoloader and he do it automaticly
require_once './config/dbConfig.php';
$db = new dbConfig('blog','localhost','root','root');
if (isset($_POST) & !empty($_POST)){
    $_POST['titre'] = htmlspecialchars($_POST['titre']);


        $query = "INSERT INTO articles (titre) VALUES (:titre)";
        $result = $db->insert($query,[ 'titre'=> $_POST['titre']]);

}