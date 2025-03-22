<?php

require_once 'config.php';
class Prestamo {
    public function __construct(
        private int $id_usuario,
        private int $id_libro,
        private string $fecha_prestamo
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

    // Método para guardar el préstamo en el archivo prestamos.txt
    public function guardarEnArchivo(): void {
        $contenido = "ID Usuario: " . $this->id_usuario . "\n";
        $contenido .= "ID Libro: " . $this->id_libro . "\n";
        $contenido .= "Fecha de Préstamo: " . $this->fecha_prestamo . "\n";
        $contenido .= "-------------------------\n";

        file_put_contents(PRESTAMOS_FILE, $contenido, FILE_APPEND);
    }

    // Método estático para mostrar todos los préstamos registrados
    public static function obtenerPrestamosGuardados(): array {
        $prestamos = [];
        if (file_exists('../txt/prestamos.txt')) {
            $contenido = file_get_contents('../txt/prestamos.txt');
            $prestamosArray = explode("-------------------------\n", $contenido);
            foreach ($prestamosArray as $prestamoStr) {
                if (trim($prestamoStr) != "") {
                    $prestamoData = [];
                    $lines = explode("\n", $prestamoStr);
                    foreach ($lines as $line) {
                        if (trim($line) != "") {
                            list($key, $value) = explode(": ", $line);
                            $prestamoData[$key] = $value;
                        }
                    }
                    $prestamos[] = new Prestamo(
                        intval($prestamoData['ID Usuario']),
                        intval($prestamoData['ID Libro']),
                        $prestamoData['Fecha de Préstamo']
                    );
                }
            }
        }
        return $prestamos;
    }
}

// Procesar el formulario si se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe los datos del formulario
    $id_usuario = intval($_POST['id_usuario']);
    $id_libro = intval($_POST['id_libro']);
    $fecha_prestamo = $_POST['fecha_prestamo'];

    // Crea una instancia de la clase Prestamo con los datos recibidos
    $prestamo = new Prestamo($id_usuario, $id_libro, $fecha_prestamo);
    // Guarda el préstamo en el archivo prestamos.txt
    $prestamo->guardarEnArchivo();
     // Usar JavaScript para mostrar la alerta y redirigir
     echo "<script>
     alert('Préstamo registrado exitosamente.<br>');
     window.location.href = '../php/biblioteca.php';
   </script>";
}


?>
