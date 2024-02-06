<?php
// Datos para el gráfico
$type = 'line'; // Tipo de gráfico
$labels = array('January', 'February', 'March', 'April', 'May', 'June', 'July'); // Etiquetas de los ejes X
$data = array(65, 59, 80, 81, 56, 55, 40); // Datos para las líneas

// Configuración del gráfico
$config = array(
    'type' => $type,
    'data' => array(
        'labels' => $labels,
        'datasets' => array(
            array(
                'label' => 'Dataset 1',
                'data' => $data,
                'fill' => false,
                'borderColor' => 'rgba(255, 99, 132, 1)',
                'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
            ),
        ),
    ),
    'options' => array(
        'plugins' => array(
            'title' => array(
                'display' => true,
                'text' => 'Chart Title',
            ),
        ),
    ),
);

// Si se está solicitando el gráfico, devolver los datos como JSON
if (isset($_GET['getChartData'])) {
    // Devolver los datos como JSON
    header('Content-Type: application/json');
    echo json_encode($config);
    exit; // Detener la ejecución del script aquí
}
?>
