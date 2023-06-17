<?php
/*
 * DB Class
 * This class is used for database related (connect, insert, update, and delete) operations
 * with PHP Data Objects (PDO)
 * @author    CodexWorld.com
 * @url       http://www.codexworld.com
 * @license   http://www.codexworld.com/license
 */



namespace  Login_namespace;
use \PDO;
interface Login_interface {
    public function getUser($table,$password);
}

class Login implements Login_interface {
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "root";
    private $dbName     = "php_advanced";

    public function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            try{
                $conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword);
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db = $conn;
            }catch(PDOException $e){
                die("Failed to connect with MySQL: " . $e->getMessage());
            }
        }
    }

    /*
     * Returns rows from the database based on the conditions
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */
    public function getUser($username, $password)
    {
        $stmt = $this->db->prepare("SELECT id, username, password FROM admins WHERE username=? AND password=?");
        //$stmt = $this->db->prepare("SELECT id, username, password FROM admins");
        $stmt->execute([$username, $password]);
        $mode = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result= $stmt->fetch();
        if ($result){
            return true;
        }
        else {
            return false;
        }
        //print_r($result["username"]);

        //print_r($result);

//        foreach ($result as $m){
//            echo  $m;
//
//        }

//        $keys = array_keys($result);
//
//
//        for($i=0; $i < count($keys); ++$i) {
//            echo $keys[$i] . ' ' . $result[$keys[$i]] . "\n";
//        }

//        foreach ($keys as $key) {
//            echo $result[$key]->username;
//        }
//
//        foreach($result as $k => $v) {
//            foreach ($v as $m){
//                echo $m."<br>";
//            }
//        }



    }


}