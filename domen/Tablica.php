<?php


class Tablica
{
    public $id;
    public $vlasnik;
    public $kontrolor;
    public $vozilo;
    public $tablica;
    public $datum;
    public $cena;

    public function vratiSve($mysqli)
    {
        $sql = "SELECT t.*, v.ime_prezime AS vlasnik, k.ime_prezime AS kontrolor, vo.marka, vo.model 
                FROM tablica t 
                LEFT JOIN korisnik v ON t.id_vlasnik=v.id 
                LEFT JOIN korisnik k ON t.id_kontrolor=k.id
                LEFT JOIN vozilo vo ON t.id_vozilo=vo.id";
        if (isset($this->vlasnik->id)) {
            $sql .= " WHERE t.id_vlasnik=" . $this->vlasnik->id;
        }
        $sql .= " ORDER BY t.tablica ASC";
        $rezultat = $mysqli->query($sql);
        $nizTablica = [];
        while ($red = $rezultat->fetch_object()) {
            $vlasnik = new Korisnik();
            $vlasnik->id = $red->id_vlasnik;
            $vlasnik->ime_prezime = $red->vlasnik;
            
            $kontrolor = new Korisnik();
            $kontrolor->id = $red->id_kontrolor;
            $kontrolor->ime_prezime = $red->kontrolor;            
            
            $vozilo = new Vozilo();
            $vozilo->marka = $red->marka;
            $vozilo->model = $red->model;

            $tablica = new Tablica();
            $tablica->id = $red->id;
            $tablica->vlasnik = $vlasnik;
            $tablica->kontrolor = $kontrolor;
            $tablica->vozilo = $vozilo;
            $tablica->tablica = $red->tablica;
            $tablica->datum = $red->datum;
            $tablica->cena = $red->cena;
            
            $nizTablica[] = $tablica;
        }
        return $nizTablica;
    }
}
