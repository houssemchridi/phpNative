<?php
require_once './config/dbConfig.php';
/**
 * Created by IntelliJ IDEA.
 * User: hchridi
 * Date: 04/07/2019
 * Time: 12:19
 */
$db = new dbConfig('blog','localhost','root','root');

?>
<ul>
    <?php foreach ($db->query('SELECT * FROM  articles ') as $article) ?>
    <li> <?= $article->titre; ?></li>

</ul>