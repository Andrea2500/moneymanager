<?php
class db {

   private $host = 'shareddb-r.hosting.stackcp.net';
   private $user = 'money_manager-313233a5bc';
   private $pwd = '5xLmkixf';
   private $dbname = 'money_manager-313233a5bc';


   protected function connect(){
      $dns = 'mysql:host='.$this->host.';dbname='.$this->dbname;
      $pdo = new PDO($dns, $this->user, $this->pwd);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
   }
} 
?>