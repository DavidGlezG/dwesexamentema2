<?php
// Clase Bebida que hereda de Artículo

class Bebida extends Articulo
{
    // Atributos adicionales públicos
    public string $tamaño;
    public string $temperatura; 

    public function __construct(string $nombre, float $precio, bool $disponibilidad, string $categoría, string $tamaño, string $temperatura)
    {
        // Llama al constructor de la clase padre (Articulo)
        parent::__construct($nombre, $precio, $disponibilidad, $categoría);
        
        // Asigna los atributos adicionales
        $this->tamaño = $tamaño;
        $this->temperatura = $temperatura; 
    }
}
?>