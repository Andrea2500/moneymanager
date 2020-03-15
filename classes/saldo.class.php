<?php

class saldo extends user
{
    protected $totale = 0;
    protected $uscite = 0;
    protected $entrate = 0;
    

    public function add($cifra,$descrizione)
    {
       if ($this->logged) {
            $sql = "INSERT INTO saldo (cifra,descrizione,data,userid) VALUES (?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$cifra,$descrizione,date("d-m-Y"),$this->id]);
        }else{
            echo "Nessun utente loggato!";
        } 
    }

    public function clearData()
    {
        if ($this->logged) {
            $sql = "DELETE FROM saldo WHERE userid = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->id]);
        }else{
            echo "Nessun utente loggato!";
        } 
    }

    public function calcolaTot()
    {
        
        $sql = "SELECT * FROM saldo WHERE userid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->id]);
        while($row = $stmt->fetch()){
            $this->totale += $row['cifra'];
        }
        return $this->totale;
         
    }

    public function mostraMovimenti(){
        
        $sql = "SELECT * FROM saldo WHERE userid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->id]);

        while($row = $stmt->fetch())
        echo "<div class='row'>
        <p>".$row['cifra']."€</p>
        <p>".$row['descrizione']."</p>
        <p>".$row['data']."</p>
        </div>";
        
    }

    public function calcolaInOut()
    {
        if ($this->logged) {
            $sql = "SELECT * FROM saldo WHERE userid = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->id]);
            while($row = $stmt->fetch()){
                if ($row['cifra'] < 0) {
                    $this->uscite += $row['cifra'];
                }else{
                    $this->entrate += $row['cifra'];
                }      
        }
        }else{
            echo "Nessun utente loggato!";
        }
    }

    public function mostraUscite()
    {
        return $this->uscite;
     }

    public function mostraEntrate()
    {
        return $this->entrate;
    }

}
