<?php
class Database
{
    private $hostname="localhost";
    private $username="root";
    private $password="";
    private $dbname="reg_vozila";
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
        $sql = "SELECT rt.id, rt.tablica, rt.datum, vl.ime, vl.prezime, vo.marka, vo.model 
                FROM `reg_tablica` rt 
                LEFT JOIN `vlasnik` vl ON rt.id_vlasnik=vl.id
                LEFT JOIN `vozilo` vo on rt.id_vozilo=vo.id";
                
        if ($id != null) {
            $sql .= " WHERE rt.id=" . $id;
        }
        $sql .= " ORDER BY rt.id";
        $this->ExecuteQuery($sql);
        // print_r($this->getResult()->fetch_object());
    }
    
    public function insertTablice($idVlasnik, $idVozilo, $tablica)
    {
        $datum = date("Y-m-d");
        $insert = "INSERT INTO reg_tablica(id, id_vlasnik, id_vozilo, tablica, datum) VALUES (null,$idVlasnik,$idVozilo,'$tablica','$datum')";

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
        $update = "UPDATE reg_tablica SET tablica = '$tablica', datum = '$datum' WHERE id = $id";
        if (($this->ExecuteQuery($update)) && ($this->affected >0)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function deleteTablice($id)
    {
        $delete = "DELETE FROM reg_tablica WHERE id = $id";
        // echo $delete;
        if ($this->ExecuteQuery($delete)) {
            return true;
        } else {
            return false;
        }
    }
    
    
    //select funkcija
    public function select(
        $table="novosti",
        $rows = 'novosti.id, novosti.naslov, novosti.tekst, novosti.datumvreme, novosti.kategorija_id, kategorije.kategorija',
        $join_table="kategorije",
        $join_key1="kategorija_id",
        $join_key2="id",
        $where = null,
        $order = null
    ) {
        $q = 'SELECT '.$rows.' FROM '.$table;
        if ($join_table !=null) {
            $q .= ' JOIN '.$join_table.' ON '.$table.'.'.$join_key1.' = '.$join_table.'.'.$join_key2;
        }
        if ($where != null) {
            $q .= ' WHERE '.$where;
        }
        if ($order != null) {
            $q .= ' ORDER BY '.$order;
        }
        $this->ExecuteQuery($q);
        //print_r($this->getResult()->fetch_object());
    }
    

    public function insert($table="novosti", $rows = "naslov, tekst", $values)
    {
        $query_values = implode(',', $values);
        $insert = 'INSERT INTO '.$table;
        if ($rows != null) {
            $insert .= ' ('.$rows.')';
        }
        $insert .= ' VALUES ('.$query_values.')';
        //echo $insert;
        if ($this->ExecuteQuery($insert)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($table="novosti", $id, $keys, $values)
    {
        $set_query = array();
        for ($i=0; $i<sizeof($keys);$i++) {
            $set_query[] = $keys[$i] . " = '".$values[$i]."'";
        }
        $set_query_string = implode(',', $set_query);


        $update = "UPDATE ".$table." SET ". $set_query_string ." WHERE id=". $id;
        if (($this->ExecuteQuery($update)) && ($this->affected >0)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function delete($table="novosti", $keys, $values)
    {
        $delete = "DELETE FROM ".$table." WHERE ".$keys[0]." = '".$values[0]."'";
        //echo $delete;
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
