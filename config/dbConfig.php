<?php
/**
 * Created by IntelliJ IDEA.
 * User: hchridi
 * Date: 04/07/2019
 * Time: 11:59
 */

class dbConfig
{
    private $db_name;
    private $host;
    private $root;
    private $password;
    private $pdo;

    /**
     * dbConfig constructor.
     * @param $db_name
     * @param $host
     * @param $root
     * @param $password
     */
    public function __construct($db_name, $host, $root, $password)
    {
        $this->db_name = $db_name;
        $this->host = $host;
        $this->root = $root;
        $this->password = $password;

    }
    private function getPdo(){
        /**
         * init the pdo only the first time
         */
        if ($this->pdo === null){
            // we get a dbo instance and then we connect the user to the db
            $pdo = new PDO('mysql:dbname=blog;host=localhost','root','root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    public function query($statement){
        $request= $this->getPdo()->query($statement);
        $data = $request->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function insert($statement,$data){
        $request = $this->getPdo()->prepare($statement);
        $result = $request->execute($data);
        return $result;
    }


}