<?php
// TODO Importar las clases
require_once './model/Articulo.php';
require_once './model/Bebida.php';  

// Array asociativo del menú
$menu = [
    new Articulo("Ensalada César", 8.50, true, "Entrante"),
    new Articulo("Hamburguesa Clásica", 12.00, true, "Principal"),
    new Articulo("Pizza Margarita", 10.00, false, "Principal"), // No disponible
    new Articulo("Spaghetti Boloñesa", 11.00, true, "Principal"),
    new Articulo("Sopa de Tomate", 7.00, false, "Entrante"), // No disponible
    new Bebida("Coca-Cola", 2.50, true, "Bebida", "Mediano", "Fría"),
    new Bebida("Café", 1.50, true, "Bebida", "Pequeño", "Caliente"),
    new Bebida("Té Helado", 2.00, false, "Bebida", "Grande", "Fría"), // No disponible
    new Bebida("Jugo de Naranja", 3.00, false, "Bebida", "Mediano", "Fría") // No disponible
];

$ubicaciones = [
    "Centro" => [
        "direccion" => "Calle Mayor 123, Centro",
        "telefono" => "123-456-789",
        "horario" => "10:00 - 22:00"
    ],
    "Norte" => [
        "direccion" => "Avenida Norte 456, Zona Norte",
        "telefono" => "987-654-321",
        "horario" => "11:00 - 20:00"
    ],
    "Sur" => [
        "direccion" => "Boulevard Sur 789, Zona Sur",
        "telefono" => "654-321-987",
        "horario" => "10:00 - 23:00"
    ]
];

$pedido = ["Ensalada César", "Pizza Margarita", "Café", "Gambas"];

// TODO Filtrar platos por disponibilidad, guardando en variable $disponibles
$disponibles = array_filter($menu, function($articulo) {
    // array_filter funciona con objetos y solo devuelve aquellos cuya propiedad disponibilidad sea true
    return $articulo->disponibilidad; 
});

//////////////////////////////
//        FUNCIONES         //
//////////////////////////////

// TODO Función para imprimir una lista de artículos con nombre y precio
function imprimirListaArticulos($articulos){
    // Muestra la lista con el formato "• Nombre. Precio"
    foreach($articulos as $articulo) {
        $precio_formato = number_format($articulo->precio, 2, '.', '');
        echo "<li>{$articulo->nombre}. {$precio_formato}</li>";
    }
}

// TODO Función para imprimir un pedido
function imprimirPedido($pedido, $menu) {
    // Crear un mapa para buscar artículos rápidamente por nombre
    $menu_map = [];
    foreach ($menu as $articulo) {
        $menu_map[$articulo->nombre] = $articulo;
    }

    $total = 0.0;

    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<thead><tr><th>Artículo</th><th>Precio</th></tr></thead>";
    echo "<tbody>";

    foreach ($pedido as $item_name) {
        echo "<tr>";
        echo "<td>{$item_name}</td>";
        
        if (isset($menu_map[$item_name])) {
            $articulo = $menu_map[$item_name];
            
            if ($articulo->disponibilidad) {
                // Disponible: muestra precio y suma al total
                $precio_formato = '€' . number_format($articulo->precio, 2, '.', '');
                echo "<td>{$precio_formato}</td>";
                $total += $articulo->precio;
            } else {
                // No disponible: muestra mensaje
                echo "<td>No disponible</td>";
            }
        } else {
            // No encontrado en el menú: muestra mensaje
            echo "<td>No encontrado en el menú</td>";
        }
        echo "</tr>";
    }
    
    // Fila final con el total, sumando solo los disponibles
    $total_formato = '€' . number_format($total, 2, '.', '');
    echo "<tr><td><strong>Total</strong></td><td><strong>{$total_formato}</strong></td></tr>";
    
    echo "</tbody>";
    echo "</table>";
}

// TODO Función para imprimir las ubicaciones
function imprimirUbicaciones($ubicaciones) {
    echo "<ul>";
    foreach($ubicaciones as $nombre => $datos) {
        echo "<li><strong>Ubicación: {$nombre}</strong></li>";
        echo "<ul>";
        echo "<li>Dirección: {$datos['direccion']}</li>";
        echo "<li>Teléfono: {$datos['telefono']}</li>";
        echo "<li>Horario: {$datos['horario']}</li>";
        echo "</ul>";
    }
    echo "</ul>";
}

?>

<h2>Menú Completo:</h2>
<ul>
    <?php imprimirListaArticulos($menu); ?>
</ul>


<h2>Platos disponibles:</h2>
<ul>
    <?php imprimirListaArticulos($disponibles); ?>
</ul>


<h2>Pedido realizado:</h2>
<?php
imprimirPedido($pedido, $menu);
?>


<h2>Ubicaciones de Recogida:</h2>
<?php imprimirUbicaciones($ubicaciones); ?>