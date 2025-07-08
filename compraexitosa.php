<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Compra realizada</title>
    <style>
        body {
            background: linear-gradient(135deg, #532889 0%, #d8cfe3 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .contenedor {
            background-color: #fff;
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            text-align: center;
            max-width: 400px;
        }

        .contenedor h1 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .contenedor p {
            font-size: 18px;
            color: #333;
        }

        .btn-inicio {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 25px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-inicio:hover {
            background-color: #45a049;
        }

        .icono {
            font-size: 50px;
            color: #4CAF50;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="contenedor">
    <div class="icono">✅</div>
    <h1>¡Compra realizada!</h1>
    <p>Gracias por tu compra. Tu pedido ha sido procesado correctamente.</p>
    <a href="index_usuario.php" class="btn-inicio">Volver al inicio</a>
</div>

</body>
</html>
