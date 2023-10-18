<?php
    class Contacto
    {
    public $name;            
    public $surname;
    public $tel;

    public function __construct($name, $surname, $tel)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->tel = $tel;
    }
    }   

    if (($fp = fopen("agenda.csv", "r")) != FALSE) {
        while (($data = fgetcsv($fp, 1000, ",")) != FALSE) {
            $contacto[] = new Contacto($data[0], $data[1], $data[2]);
        }
        fclose($fp);
    }        
    echo json_encode($contacto);
?>