<?php
// Clase Artículo
class Articulo
{
    // Declarar atributos públicos
    public string $nombre;
    public float $precio;
    public bool $disponibilidad;
    public string $categoría;

    // Crear el constructor
    public function __construct(string $nombre, float $precio, bool $disponibilidad, string $categoría)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->disponibilidad = $disponibilidad;
        $this->categoría = $categoría;
    }
}
?>