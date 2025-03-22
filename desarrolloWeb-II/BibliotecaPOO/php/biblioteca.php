<?php
require_once 'config.php';
require_once 'libro.php';
require_once 'usuario.php';
require_once 'prestamo.php';

class Biblioteca {
    private array $libros = [];
    private array $usuarios = [];
    private array $prestamos = [];

    public function __construct() {
        $this->libros = $this->cargarLibros();
        $this->usuarios = $this->cargarUsuarios();
        $this->prestamos = $this->cargarPrestamos();
    }

    // Método para cargar libros desde el archivo
    private function cargarLibros(): array {
        return Libro::obtenerLibrosGuardados();
    }

    // Método para cargar usuarios desde el archivo
    private function cargarUsuarios(): array {
        return Usuario::obtenerUsuariosGuardados();
    }

    // Método para cargar préstamos desde el archivo
    private function cargarPrestamos(): array {
        return Prestamo::obtenerPrestamosGuardados();
    }

    // Método para agregar un libro a la biblioteca
    public function agregarLibro(Libro $libro): void {
        $this->libros[$libro->__get('id_libro')] = $libro;
        $libro->guardarEnArchivo();
    }

    // Método para eliminar un libro de la biblioteca
    public function eliminarLibro(int $id_libro): void {
        if (isset($this->libros[$id_libro])) {
            unset($this->libros[$id_libro]);
            $this->guardarLibros();
        }
    }

    // Método para buscar un libro por su ID
    public function buscarLibro(int $id_libro): ?Libro {
        return $this->libros[$id_libro] ?? null;
    }

    // Método para listar todos los libros
    public function listarLibros(): array {
        return $this->libros;
    }

    // Método para agregar un usuario a la biblioteca
    public function agregarUsuario(Usuario $usuario): void {
        $this->usuarios[$usuario->__get('id_usuario')] = $usuario;
        $usuario->guardarEnArchivo();
    }

    // Método para eliminar un usuario de la biblioteca
    public function eliminarUsuario(int $id_usuario): void {
        if (isset($this->usuarios[$id_usuario])) {
            unset($this->usuarios[$id_usuario]);
            $this->guardarUsuarios();
        }
    }

    // Método para buscar un usuario por su ID
    public function buscarUsuario(int $id_usuario): ?Usuario {
        return $this->usuarios[$id_usuario] ?? null;
    }

    // Método para registrar un préstamo
    public function registrarPrestamo(Prestamo $prestamo): void {
        $this->prestamos[] = $prestamo;
        $prestamo->guardarEnArchivo();
    }

    // Método para listar todos los préstamos
    public function listarPrestamos(): array {
        return $this->prestamos;
    }

    // Método para mostrar todos los libros en una tabla
    public function mostrarLibros(): void {
        echo "<h2>Lista de Libros</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Título</th><th>Autor</th><th>Materia</th></tr>";
        foreach ($this->libros as $libro) {
            echo "<tr>";
            echo "<td>" . $libro->__get('id_libro') . "</td>";
            echo "<td>" . $libro->__get('titulo') . "</td>";
            echo "<td>" . $libro->__get('autor') . "</td>";
            echo "<td>" . $libro->__get('materia') . "</td>";
        }
        echo "</table>";
    }

    // Método para mostrar todos los usuarios en una tabla
    public function mostrarUsuarios(): void {
        echo "<h2>Lista de Usuarios</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Edad</th><th>Correo</th></tr>";
        foreach ($this->usuarios as $usuario) {
            echo "<tr>";
            echo "<td>" . $usuario->__get('id_usuario') . "</td>";
            echo "<td>" . $usuario->__get('nombre_usuario') . "</td>";
            echo "<td>" . $usuario->__get('edad') . "</td>";
            echo "<td>" . $usuario->__get('correo') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    // Método para mostrar todos los préstamos en una tabla
    public function mostrarPrestamos(): void {
        echo "<h2>Lista de Préstamos</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID Usuario</th><th>ID Libro</th><th>Fecha de Préstamo</th></tr>";
        foreach ($this->prestamos as $prestamo) {
            echo "<tr>";
            echo "<td>" . $prestamo->__get('id_usuario') . "</td>";
            echo "<td>" . $prestamo->__get('id_libro') . "</td>";
            echo "<td>" . $prestamo->__get('fecha_prestamo') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    // Método para guardar la información de los libros en un archivo txt
    private function guardarLibros(): void {
        $contenido = "";
        foreach ($this->libros as $libro) {
            $contenido .= "ID: " . $libro->__get('id_libro') . "\n";
            $contenido .= "Título: " . $libro->__get('titulo') . "\n";
            $contenido .= "Autor: " . $libro->__get('autor') . "\n";
            $contenido .= "Materia: " . $libro->__get('materia') . "\n";
            $contenido .= "-------------------------\n";
        }
        file_put_contents(LIBROS_FILE, $contenido);
    }

    // Método para guardar la información de los usuarios en un archivo txt
    private function guardarUsuarios(): void {
        $contenido = "";
        foreach ($this->usuarios as $usuario) {
            $contenido .= "ID Usuario: " . $usuario->__get('id_usuario') . "\n";
            $contenido .= "Nombre Usuario: " . $usuario->__get('nombre_usuario') . "\n";
            $contenido .= "Edad: " . $usuario->__get('edad') . "\n";
            $contenido .= "Correo: " . $usuario->__get('correo') . "\n";
            $contenido .= "-------------------------\n";
        }
        file_put_contents(USUARIOS_FILE, $contenido);
    }

    // Método para guardar la información de los préstamos en un archivo txt
    private function guardarPrestamos(): void {
        $contenido = "";
        foreach ($this->prestamos as $prestamo) {
            $contenido .= "ID Usuario: " . $prestamo->__get('id_usuario') . "\n";
            $contenido .= "ID Libro: " . $prestamo->__get('id_libro') . "\n";
            $contenido .= "Fecha de Préstamo: " . $prestamo->__get('fecha_prestamo') . "\n";
            $contenido .= "-------------------------\n";
        }
        file_put_contents(PRESTAMOS_FILE, $contenido);
    }
}

// Crear una instancia de la clase Biblioteca y mostrar los datos
$biblioteca = new Biblioteca();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/biblioteca.css">
    <script>
    // Función para mostrar u ocultar las listas basadas en la selección
    function mostrarLista() {
        const selectedValue = document.getElementById("seleccion").value;

        // Ocultar todas las listas
        document.getElementById("libros").style.display = "none";
        document.getElementById("usuarios").style.display = "none";
        document.getElementById("prestamos").style.display = "none";

        // Mostrar la lista seleccionada
        if (selectedValue === "libros") {
            document.getElementById("libros").style.display = "block";
        } else if (selectedValue === "usuarios") {
            document.getElementById("usuarios").style.display = "block";
        } else if (selectedValue === "prestamos") {
            document.getElementById("prestamos").style.display = "block";
        }
    }
</script>
    <title>Menú Principal</title>
</head>
<body>
    <header>
        <h1>Bienvenido a la Biblioteca</h1>
    </header>

    <button onclick="window.location.href='../html/usuario.html'">Agregar Usuarios</button>
    <button onclick="window.location.href='../html/libro.html'">Agregar Libros</button>
    <button onclick="window.location.href='../html/prestamo.html'">Hacer Préstamos</button>
    <button onclick="window.location.href='../html/busqueda.html'">Buscar Libro</button>


<h2>Ver Listas</h2>
<!-- Selección para mostrar las listas -->
<label for="seleccion">Selecciona una lista:</label>
<select id="seleccion" onchange="mostrarLista()">
    <option value="">Opciones</option>
    <option value="libros">Libros</option>
    <option value="usuarios">Usuarios</option>
    <option value="prestamos">Préstamos</option>
</select>

<!-- Contenedor de Libros -->
<div id="libros" style="display:none;">
    <?php
    $biblioteca->mostrarLibros();
    ?>
</div>

<!-- Contenedor de Usuarios -->
<div id="usuarios" style="display:none;">
    <?php
    $biblioteca->mostrarUsuarios();
    ?>
</div>

<!-- Contenedor de Préstamos -->
<div id="prestamos" style="display:none;">
    <?php
    $biblioteca->mostrarPrestamos();
    ?>
</div>

</body>
</html>