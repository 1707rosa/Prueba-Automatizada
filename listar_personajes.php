<?php
include 'funciones_personajes.php';
$personajes = listar_personajes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personajes - Mundo Barbie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffccff;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            color: #ff1493;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-barbie {
            background-color: #ff69b4;
            color: white;
            font-weight: bold;
            border-radius: 20px;
        }
        .btn-barbie:hover {
            background-color: #ff1493;
        }

        .card-img-top {
    width: 50%; 
    height: 150px; 
    border-top-left-radius: 15px; 
    border-top-right-radius: 15px;
        }

        .card {
    height: 100%; /
    display: flex;
    flex-direction: column;
    }

    .volver {
        display: flex;
        text-align: center;
        color: #ff1493
         
    }

    .volver {
    display: inline-block;
    background-color: #ff69b4;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    font-weight: bold;
    border-radius: 20px;
    text-align: center;
}

.conteiner {
    display: flex;
    justify-content: center; 
    align-items: center;
    height: 30vh; 
}


    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">🎀 Lista de Personajes 🎀</h2>
    <a href="registrar_personaje.php" class="btn btn-barbie mb-3">➕ Agregar Personaje</a>
    <div class="row">
        <?php if (empty($personajes)): ?>
            <p class="text-center">No hay personajes registrados.</p>
        <?php else: ?>
            <?php foreach ($personajes as $personaje): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $personaje['foto']; ?>" class="card-img-top" alt="Foto de <?php echo $personaje['nombre']; ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $personaje['nombre'] . ' ' . $personaje['apellido']; ?></h5>
                            <p><strong>Profesiones:</strong></p>
                            <ul class="list-unstyled">
                                <?php foreach ($personaje['profesiones'] as $profesion): ?>
                                    <li>💼 <?php echo $profesion['nombre']; ?> ($<?php echo number_format($profesion['salario'], 2); ?>)</li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="editar_personaje.php?id=<?php echo $personaje['id']; ?>" class="btn btn-warning btn-sm">✏️ Editar</a>
                            <a href="eliminar_personaje.php?id=<?php echo $personaje['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este personaje?')">🗑️ Eliminar</a>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            <?php endforeach; ?>

        <?php endif; ?>
    </div>
</div>
<div class = "conteiner">
<a href="index.php" class = "volver" > Volver a la pagina de inicio</a>
</div>

</body>
</html>
