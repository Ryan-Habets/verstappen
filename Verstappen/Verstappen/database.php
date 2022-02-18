<?php
class Reservation{
    // CONSTRUCTOR - CONNECT TO DATABASE
    private $pdo;
    private $stmt;
    public $error;

    function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHAR,
                DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION]
            );
       } catch (Exception $ex) { exit($ex->getMessage()); }
    }

    // DESTRUCTOR - CLOSE DATABASE CONNECTION
    function __destruct () {
        $this->pdo = null;
        $this->stmt = null;
    }

    // SAVE RESERVATION
    function save ($name, $email, $date, $place, $amount){
      try {
          $sql =  "INSERT INTO reservation (res_name, res_email, res_date, res_place, res_amount) VALUES (?,?,?,?,?)";
          $data = array($name, $email, $date, $place, $amount);
        $this->stmt = $this->pdo->prepare($sql);
           // "INSERT INTO 'reservation' ('res_name', 'res_email', 'res_date', 'res_place', 'res_amount') VALUES (?,?,?,?,?)"
       // );
        $this->stmt->execute($data);
        return true;
      } catch (Exception $ex) {
          $this->error = $ex->getMessage();
          return false;
      }

    }
}

// DATABASE SETTINGS
const DB_HOST = "localhost";
const DB_NAME = "verstappen";
const DB_CHAR = "utf8mb4";
const DB_USER = "rooter";
const DB_PASS = "appel";

// NEW RESERVATION OBJECT
$_RSV = new Reservation();




