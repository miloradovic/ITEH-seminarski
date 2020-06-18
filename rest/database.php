<?php
class Database
{
    private $hostname="localhost";
    private $username="root";
    private $password="";
    private $dbname="seminarski";
    private $dblink; // veza sa bazom
    private $result; // Holds the MySQL query result
    private $records; // Holds the total number of records returned
    private $affected; // Holds the total number of affected rows

    public function __construct($dbname)
    {
        $this->dbname = $dbname;
        $this->Connect();
    }

    /*
    function __destruct()
    {
    $this->dblink->close();
    //echo "Konekcija prekinuta";
    }
    */

    public function getResult()
    {
        return $this->result;
    }

    //konekcija sa bazom
    public function Connect()
    {
        $this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if ($this->dblink ->connect_errno) {
            printf("Konekcija neuspešna: %s\n", $mysqli->connect_error);
            exit();
        }
        $this->dblink->set_charset("utf8");
        // echo "Uspesna konekcija";
    }


    public function selectTablice($id = null)
    {
        $sql = "SELECT t.*, v.ime_prezime AS vlasnik, k.ime_prezime AS kontrolor, vo.marka, vo.model 
                FROM tablica t 
                LEFT JOIN korisnik v ON t.id_vlasnik=v.id 
                LEFT JOIN korisnik k ON t.id_kontrolor=k.id
                LEFT JOIN vozilo vo ON t.id_vozilo=vo.id";
                
        if ($id != null) {
            $sql .= " WHERE t.id=" . $id;
        }
        $sql .= " ORDER BY t.id";
        $this->ExecuteQuery($sql);
        // print_r($this->getResult()->fetch_object());
    }
    
    public function insertTablice($idVlasnik, $idKontrolor, $idVozilo, $tablica, $cena)
    {
        $datum = date("Y-m-d");
        $insert = "INSERT INTO tablica(id, id_vlasnik, id_kontrolor, id_vozilo, tablica, datum, cena) VALUES (null,$idVlasnik,$idKontrolor,$idVozilo,'$tablica','$datum',$cena)";

        // echo $insert;
        if ($this->ExecuteQuery($insert)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function updateTablice($id, $tablica)
    {
        $datum = date("Y-m-d");
        $update = "UPDATE tablica SET tablica = '$tablica', datum = '$datum' WHERE id = $id";
        if (($this->ExecuteQuery($update)) && ($this->affected >0)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function deleteTablice($id)
    {
        $delete = "DELETE FROM tablica WHERE id = $id";
        // echo $delete;
        if ($this->ExecuteQuery($delete)) {
            return true;
        } else {
            return false;
        }
    }

    //funkcija za izvrsavanje upita
    public function ExecuteQuery($query)
    {
        if ($this->result = $this->dblink->query($query)) {
            if (isset($this->result->num_rows)) {
                $this->records         = $this->result->num_rows;
            }
            if (isset($this->dblink->affected_rows)) {
                $this->affected        = $this->dblink->affected_rows;
            }
            // echo "Uspesno izvrsen upit";
            return true;
        } else {
            return false;
        }
    }
}
