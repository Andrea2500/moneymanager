<?php
session_start();
$_SESSION['error']='';
class User extends db
{
    
    protected $id;
    protected $nome;
    protected $email;
    protected $logged = false;



    public function getUser(){
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        while($row = $stmt->fetch()){
            echo $row["nome"].$row["email"];
        }
    }


     public function login($email,$pwd)
    {
        $hash = $this->pwdHash($pwd);

        if ($this->checkEmail($email) ) {
            $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email,$hash]);
            $rows = $stmt->fetchAll();
            if ($stmt->rowCount() == 0) {
                $_SESSION['error'] .= "Credenziali non valide<br>";
                return 0;
            }else{
                foreach($rows as $row){
                $this->id = $row['id'];
                $this->nome = $row['nome'];
                $this->email = $row['email'];
                $this->logged = true;
                return 1;
                }
            }
        }else {
            $_SESSION['error'] .= "Email non registrata<br>";
        }
    }



    public function signup($nome,$email,$pwd)
    {
        if (!$this->checkEmail($email)) {
            $hash = $this->pwdHash($pwd);
            $sql = "INSERT INTO users (nome,email,password) VALUES (?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$nome,$email,$hash]);
            return 1;
        }else {
            $_SESSION['error'] .= "Email già registrata<br>";
            return 0;  
        }
        
    }


    private function checkEmail($email)
    {
        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $row = $stmt->rowCount();
        if ($row > 0) {
            return true;
        }else{
            return false;
        }
    }


    protected function pwdHash($pwd){
        $salt = "^rQKo3aIz7ghc£co^nY5%sNF!6Q8£g";
        return md5($salt.$pwd);

    }



    







}
