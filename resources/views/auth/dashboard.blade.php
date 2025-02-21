<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <!-- Enlace a Bootstrap 5 para estilos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Estilos generales del cuerpo */
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        /* Estilos de la barra lateral */
        .sidebar {
            width: 250px;
            background: #212529;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Enlaces de la barra lateral */
        .sidebar a {
            color: white !important;
            text-decoration: none;
            display: block;
            padding: 12px;
            margin: 8px 0;
            border-radius: 5px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        /* Estilo cuando se pasa el cursor o está activo */
        .sidebar a:hover, .sidebar .active {
            background: #2e7d32;
        }

        /* Información del usuario en la barra lateral */
        .user-info {
            text-align: center;
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 15px;
        }

        .user-info h5 {
            margin-bottom: 5px;
        }

        /* Botón de cierre de sesión */
        .logout-btn {
            background: #2e7d32;
            color: white;
            text-align: center;
            display: block;
            padding: 12px;
            margin-top: 10px;
            border-radius: 5px;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        /* Estilo al pasar el cursor sobre el botón de cierre de sesión */
        .logout-btn:hover {
            background: #19692c;
        }

        /* Contenedor principal de la página */
        .content {
            margin-left: 270px;
            flex-grow: 1;
            padding: 30px;
        }

        /* Contenedor del perfil de usuario */
        .profile-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* Estilo de la foto de perfil */
        .profile-pic {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: #218838;
        }

        /* Estilo de imágenes en las tareas */
        .task-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }

        /* Botones generales */
        .btn {
            background: #2e7d32;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: 500;
            display: inline-block;
            margin-top: 10px;
            transition: background 0.3s ease;
        }

        /* Estilo al pasar el cursor sobre los botones */
        .btn:hover {
            background: #19692c;
        }

        /* Estilo del botón de eliminar cuenta */
        .delete-btn {
            background: red;
        }

        /* Estilo al pasar el cursor sobre el botón de eliminar */
        .delete-btn:hover {
            background: darkred;
        }

        /* Color de los textos en la barra lateral */
        .sidebar a, .sidebar p {
          color: white !important;
        }
    </style>
</head>
<body>

    <!-- Barra lateral -->
    <div class="sidebar">
        <div class="user-info">
            <!-- Nombre y correo del usuario obtenido desde Blade -->
            <h5>👤 {{ $user->name }}</h5>
            <p class="text-muted">{{ $user->email }}</p>
        </div>
        <!-- Enlaces de la barra lateral -->
        <a href="#">📄 Datos Personales</a>
        <a href="{{ route('profile.edit') }}">✏️ Editar Perfil</a>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Administrador</a>
    </div>

    <!-- Contenido Principal -->
    <div class="content">
        <h2>Perfil de Usuario</h2>

        <!-- Contenedor de perfil -->
        <div class="profile-container">
            <!-- Icono de foto de perfil -->
            <div class="profile-pic">📷</div>

            <div>
                <!-- Datos del usuario -->
                <p><strong>Nombre:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>

                <!-- Botón de cierre de sesión -->
                <form action="{{ route('logout') }}" method="POST" class="mt-auto">
                    @csrf
                    <button type="submit" class="logout-btn">🚪 Cerrar Sesión</button>
                </form>
            </div>
        </div>

        <!-- Formulario para eliminar la cuenta -->
        <form action="{{ route('profile.delete') }}" method="POST" 
              onsubmit="return confirm('¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn delete-btn">❌ Eliminar Cuenta</button>
        </form>
    </div>

</body>
</html>
