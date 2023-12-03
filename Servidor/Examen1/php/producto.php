<?php
class Producto
{
    public $ruta;
    public $nombre;
    public $precio;

    public function __construct($ruta, $nombre, $precio)
    {
        $this->ruta = $ruta;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
}
