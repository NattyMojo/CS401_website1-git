<?php
    
    class Database {
    
    private $host = "us-cdbr-east-02.cleardb.com";
    private $db = "heroku_b4037b263908047";
    private $user = "bae110743aefee";
    private $pass = "2946a3a8";
  
    public function getConnection () {
      try {
        $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
        return $conn;
      } catch (Exception $e) {
        echo print_r($e,1);
        exit;
      }
    }
  
    public function addMessage ($name, $email, $msg) {
      $conn = $this->getConnection();
      $saveQuery = "insert into messages (name, email, message) values (:name, :email, :message)";
      $q = $conn->prepare($saveQuery);
      $q->bindParam(":name", $name);
      $q->bindParam(":email", $email);
      $q->bindParam(":message", $msg);
      $q->execute();
    }

    public function authorize ($username, $password) {
      $conn = $this->getConnection();
      $query = "select id, username, password from users where username = :username and password = :password";
      $q = $conn->prepare($query);
      $q->bindParam(":username", $username);
      $q->bindParam(":password", $password);
      $q->execute();
      $result = $q->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

    public function saveImage ($uuid, $path) {
      $conn = $this->getConnection();
      $query = "insert into images (uuid, path) values (:uuid, :path)";
      $q = $conn->prepare($query);
      $q->bindParam(":uuid", $uuid);
      $q->bindParam(":path", $path);
      $q->execute();
    }

    public function getImages() {
      $conn = $this->getConnection();
      $query = "select path from images";
      $q = $conn->prepare($query);
      $q->execute();
      return $q->fetchAll(PDO::FETCH_ASSOC);
    }
  
  }
?>