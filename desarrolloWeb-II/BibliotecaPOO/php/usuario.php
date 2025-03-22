<?php
require_once 'config.php';
class Usuario
{
    public function __construct(
        public string $nombre_usuario,
        public int $id_usuario,
        public int $edad,
        public string $correo
    ) {}

    // Magic set y get
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    // Método para mostrar la información del usuario
    public function mostrarInfoUsuario(): void {
        echo "ID Usuario: " . $this->id_usuario . "<br>";
        echo "Nombre Usuario: " . $this->nombre_usuario . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Correo: " . $this->correo . "<br>";
    }

    // Método para guardar información del usuario en el archivo usuarios.txt
    public function guardarEnArchivo(): void {
        $contenido = "ID Usuario: " . $this->id_usuario . "\n";
        $contenido .= "Nombre Usuario: " . $this->nombre_usuario . "\n";
        $contenido .= "Edad: " . $this->edad . "\n";
        $contenido .= "Correo: " . $this->correo . "\n";
        $contenido .= "-------------------------\n";

        file_put_contents(USUARIOS_FILE, $contenido, FILE_APPEND);
    }

    // Método estático para mostrar todos los usuarios guardados en el archivo
    public static function obtenerUsuariosGuardados(): array {
        $usuarios = [];
        if (file_exists('../txt/usuarios.txt')) {
            $contenido = file_get_contents('../txt/usuarios.txt');
            $usuariosArray = explode("-------------------------\n", $contenido);
            foreach ($usuariosArray as $usuarioStr) {
                if (trim($usuarioStr) != "") {
                    $usuarioData = [];
                    $lines = explode("\n", $usuarioStr);
                    foreach ($lines as $line) {
                        if (trim($line) != "") {
                            list($key, $value) = explode(": ", $line);
                            $usuarioData[$key] = $value;
                        }
                    }
                    $usuarios[] = new Usuario(
                        $usuarioData['Nombre Usuario'],
                        intval($usuarioData['ID Usuario']),
                        intval($usuarioData['Edad']),
                        $usuarioData['Correo']
                    );
                }
            }
        }
        return $usuarios;
    }
}

// Procesar el formulario si se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe los datos del formulario
    $id_usuario = intval($_POST['id_usuario']);
    $nombre_usuario = $_POST['nombre_usuario'];
    $edad = intval($_POST['edad']);
    $correo = $_POST['correo'];

    // Crea una instancia de la clase Usuario con los datos recibidos
    $usuario = new Usuario($nombre_usuario, $id_usuario, $edad, $correo);
    // Guarda el usuario en el archivo usuarios.txt
    $usuario->guardarEnArchivo();
    echo "<script>
            alert('Usuario guardado exitosamente.');
            window.location.href = '../php/biblioteca.php';
          </script>"; 
}


?>



