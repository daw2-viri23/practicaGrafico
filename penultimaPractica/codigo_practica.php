<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        /* Estilos del menú */
        header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            margin-top: 0;
        }

        nav {
            width: 90%;
            margin: 0 auto;
        }

        nav ul {
            background: #333;
            border-radius: 3px;
            box-shadow: 0 -3px #000 inset, 0 1px #444 inset, 0 2px #666 inset;
            height: 2.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            float: left;
            position: relative;
        }

        nav ul li a {
            box-shadow: 1px 0 rgba(0, 0, 0, .8), 2px 0 rgba(255, 255, 255, .1);
            color: #fff;
            display: block;
            font-family: Verdana;
            font-size: .8rem;
            line-height: 2.5rem;
            padding: 0 2rem;
            text-decoration: none;
        }

        nav ul li a:hover {
            background: rgba(0, 0, 0, .4);
        }

        /* Estilos del gráfico */
        main {
            margin: 20px auto;
            max-width: 800px;
        }

        canvas {
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Encabezado y menú desplegable -->
    <header>
        <h1>Menu desplegable</h1>
        <nav>
            <ul>
                <li><a href="#">Item 1</a></li>
                <li><a href="#">Item 2</a></li>
                <li><a href="#">Desplegar</a></li>
                <li><a href="#">Item 4</a></li>
                <li><a href="#">Item 5</a></li>
                <li><a href="#">Item 6</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenedor del gráfico -->
    <main>
        <canvas id="chartCanvas"></canvas>
    </main>

    <!-- Script para crear y mostrar el gráfico -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mainCanvas = document.getElementById('chartCanvas');
            
            // Realizar una solicitud para obtener los datos del gráfico desde el archivo PHP
            fetch('getChartData.php?getChartData=1')
                .then(response => response.json())
                .then(data => {
                    // Configurar y mostrar el gráfico en el canvas
                    const chart = new Chart(mainCanvas, {
                        type: data.type,
                        data: data.data,
                        options: {
                            plugins: {
                                legend: {
                                    display: false
                                },
                                datalabels: {
                                    color: 'black',
                                    font: {
                                        weight: 'bold'
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching chart data:', error));
        });
    </script>
</body>
</html>