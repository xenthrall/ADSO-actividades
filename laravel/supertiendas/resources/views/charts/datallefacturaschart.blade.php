<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Gráficos Detalle Facturas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="chart-container" style="position: relative; height:40vh; width:100%">
                            <canvas id="chartTopCantidad"></canvas>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="chart-container" style="position: relative; height:40vh; width:100%">
                            <canvas id="chartTopIngresos"></canvas>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Guardamos las instancias de los gráficos para poder destruirlas después
    let chartCantidadInstance = null;
    let chartIngresosInstance = null;
    
    // Obtenemos el elemento del modal
    const modalElement = document.getElementById('staticBackdrop');

    // Escuchamos el evento 'show.bs.modal' (cuando el modal empieza a mostrarse)
    modalElement.addEventListener('show.bs.modal', event => {
        
        // Usamos un pequeño retraso (setTimeout) para asegurar que el modal
        // tenga sus dimensiones finales antes de dibujar el gráfico.
        setTimeout(() => {
            // --- 1. Destruir gráficos anteriores (si existen) ---
            if (chartCantidadInstance) {
                chartCantidadInstance.destroy();
            }
            if (chartIngresosInstance) {
                chartIngresosInstance.destroy();
            }

            // --- 2. Gráfico 1: Top Productos por Cantidad (Gráfico de Barras) ---
            const ctxCantidad = document.getElementById('chartTopCantidad').getContext('2d');
            chartCantidadInstance = new Chart(ctxCantidad, {
                type: 'bar',
                data: {
                    labels: @json($labelsTopCantidad ?? []), // Datos desde el controlador
                    datasets: [{
                        label: 'Cantidad Vendida',
                        data: @json($dataTopCantidad ?? []), // Datos desde el controlador
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                        ],
                        borderColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 99, 132)',
                            'rgb(255, 206, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(153, 102, 255)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Importante para que respete la altura del contenedor
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Top 5 Productos por Cantidad Vendida'
                        }
                    }
                }
            });

            // --- 3. Gráfico 2: Top Productos por Ingresos (Gráfico de Dona) ---
            const ctxIngresos = document.getElementById('chartTopIngresos').getContext('2d');
            chartIngresosInstance = new Chart(ctxIngresos, {
                type: 'doughnut', // Tipo 'pie' o 'doughnut'
                data: {
                    labels: @json($labelsTopIngresos ?? []), // Datos desde el controlador
                    datasets: [{
                        label: 'Ingresos ($)',
                        data: @json($dataTopIngresos ?? []), // Datos desde el controlador
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Top 5 Productos por Ingresos ($)'
                        }
                    }
                }
            });
        }, 100); // 100ms de retraso
    });
</script>