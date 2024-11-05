<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Calculadora de Comisiones</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="marquee">
            <img src="{{ asset('images/Quality-View-Logo.png') }}" alt="Quality View Logo" style="height: 50px;">
            <img src="{{ asset('images/logo-confianza-qualityview.png') }}" alt="Quality View Logo Confianza" style="height: 50px;">
        </div>
        
        <h2>Calculadora de Comisiones</h2>
        <form action="{{ route('calcular.comision') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="tipo_prueba" class="form-label">Tipo de Prueba:</label>
                <select class="form-select" id="tipo_prueba" name="tipo_prueba" onchange="actualizarPrecios()">
                    <option value="" selected disabled>Selecciona una prueba</option>
                    <option value="3">Prueba de 3 Parámetros</option>
                    <option value="5">Prueba de 5 Parámetros</option>
                    <option value="10">Prueba de 6 Parámetros</option>
                    <option value="13">Prueba de 6 Parámetros vaso</option>
                    <option value="15">Embarazo Tira</option>
                    <option value="20">Embarazo cassette</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="precio_inicial" class="form-label">Precio Distribuidor:</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" id="precio_inicial" name="precio_inicial" readonly>
                </div>
            </div>
            <div class="mb-3">
                <label for="precio_publico" class="form-label">Precio Sugerido al Público:</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" id="precio_publico" name="precio_publico" readonly>
                </div>
            </div>
            <div class="mb-3">
                <label for="precio_venta" class="form-label">Precio Facturado:</label>
                <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" required>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad de Pruebas Vendidas:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>

            <button type="submit" class="btn btn-primary">Calcular Comisión</button>
        </form>

        @if(session('comision'))
            <div class="alert alert-info mt-3">
                {{ session('comision') }}
            </div>
        @endif
    </div>

    <script>
        function actualizarPrecios() {
            const tipoPrueba = document.getElementById('tipo_prueba').value;
            let precioInicial = 0;
            let precioPublico = 0;

            // Establecer valores según el tipo de prueba seleccionado
            if (tipoPrueba === '3') {
                precioInicial = 34;
                precioPublico = 39;
            } else if (tipoPrueba === '5') {
                precioInicial = 46;
                precioPublico = 51;
            } else if (tipoPrueba === '10') {
                precioInicial = 51;
                precioPublico = 56;
            } else if (tipoPrueba === '13') {
                precioInicial = 87;
                precioPublico = 95;
            } else if (tipoPrueba === '15') {
                precioInicial = 5;
                precioPublico = 6;
            } else if (tipoPrueba === '20') {
                precioInicial = 8;
                precioPublico = 10;
            }


            // Asignar los valores a los campos
            document.getElementById('precio_inicial').value = precioInicial;
            document.getElementById('precio_publico').value = precioPublico;
        }
    </script>
</body>
</html>

