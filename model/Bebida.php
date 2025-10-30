<?php
// Clase Bebida que hereda de Artículo

class Bebida extends Articulo
{
    // Atributo adicional público
    public string $tamaño;

    // El constructor incluye los parámetros del padre más los propios.
    public function __constructor(string $nombre, float $precio, bool $disponibilidad, string $categoría, string $tamaño, string $tipo)
    {
        // Llama al constructor de la clase padre
        parent::__construct($nombre, $precio, $disponibilidad, $categoría);
        // Asignar el atributo adicional
        $this->tamaño = $tamaño;
    }
}
?>