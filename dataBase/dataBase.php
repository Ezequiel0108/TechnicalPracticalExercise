<?php
 class dataBase{
    public $host;
    public $dbName;
    public $userName;
    public $password;
    
    public function __construct($host,$dbName,$userName,$password)
    {
      $this->host=$host;
      $this->dbName=$dbName;
      $this->userName=$userName;
      $this->password=$password;
    }

   public function connect() {
      $dsn = "mysql:host={$this->host};dbname={$this->dbName}";
      $pdo = new PDO($dsn, $this->userName, $this->password);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
   }

 }


?>