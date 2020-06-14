<?php

class Vozilo
{
    public $id;
    public $marka;
    public $model;

    public function vratiSve($mysqli)
    {
        $sql = "SELECT * FROM vozilo WHERE marka LIKE '%" . $this->marka . "%' ORDER BY marka, model ASC";
        $rezultat = $mysqli->query($sql);
        $nizVozila = [];
        while ($red = $rezultat->fetch_object()) {
            $vozilo = new Vozilo();
            $vozilo->id = $red->id;
            $vozilo->marka = $red->marka;
            $vozilo->model = $red->model;
            $nizVozila[] = $vozilo;
        }
        return $nizVozila;
    }
}
