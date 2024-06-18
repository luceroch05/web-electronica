<?php
// obtener_armario.php

// Incluir los modelos necesarios
require_once 'models/ubicacion.php';

if (isset($_GET['id_salon'])) {
    $idSalon = $_GET['id_salon'];

    // Obtener los armarios asociados al ID del salón
    $armarios = Ubicacion::findBySalonId($idSalon); // Ajustar según tu lógica

    // Devolver los resultados como JSON
    header('Content-Type: application/json');
    echo json_encode($armarios);
} else {
    // Manejo de error si no se proporciona el ID del salón
    echo json_encode(array()); // Devolver un arreglo vacío si no hay ID de salón
}
?>
