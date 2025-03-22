<?php

require_once 'config.php';

class Libro {
    public function __construct(
        private int $id_libro,
        private string $titulo,
        private string $autor,
        private string $materia
    ) {}

    // Magic set y get
    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    // Método para mostrar información del libro
    public function mostrarInfoLibro(): void {
        echo "ID: " . $this->id_libro . "<br>";
        echo "Título: " . $this->titulo . "<br>";
        echo "Autor: " . $this->autor . "<br>";
        echo "Materia: " . $this->materia . "<br>";
    }

    // Método para guardar información del libro en un archivo txt
    public function guardarEnArchivo(): void {
        $contenido = "ID: " . $this->id_libro . "\n";
        $contenido .= "Título: " . $this->titulo . "\n";
        $contenido .= "Autor: " . $this->autor . "\n";
        $contenido .= "Materia: " . $this->materia . "\n";
        $contenido .= "-------------------------\n";

        file_put_contents(LIBROS_FILE, $contenido, FILE_APPEND);
    }

    // Método estático para mostrar todos los libros guardados en el archivo
    public static function obtenerLibrosGuardados(): array {
        $libros = [];
        if (file_exists(LIBROS_FILE)) {
            $contenido = file_get_contents(LIBROS_FILE);
            $librosArray = explode("-------------------------\n", $contenido);
            foreach ($librosArray as $libroStr) {
                if (trim($libroStr) != "") {
                    $libroData = [];
                    $lines = explode("\n", $libroStr);
                    foreach ($lines as $line) {
                        if (trim($line) != "") {
                            list($key, $value) = explode(": ", $line);
                            $libroData[$key] = $value;
                        }
                    }
                    $libros[] = new Libro(
                        intval($libroData['ID']),
                        $libroData['Título'],
                        $libroData['Autor'],
                        $libroData['Materia']
                    );
                }
            }
        }
        return $libros;
    }

    // Método estático para obtener el próximo ID disponible
    public static function obtenerProximoId(): int {
        $libros = self::obtenerLibrosGuardados();
        $ultimoId = 0;
        foreach ($libros as $libro) {
            if ($libro->__get('id_libro') > $ultimoId) {
                $ultimoId = $libro->__get('id_libro');
            }
        }
        return $ultimoId + 1;
    }
}

// Procesar el formulario si se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_libro = Libro::obtenerProximoId();
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $materia = $_POST['materia'];

    $libro = new Libro($id_libro, $titulo, $autor, $materia);
    $libro->guardarEnArchivo();
    
    // Usar JavaScript para mostrar la alerta y redirigir
    echo "<script>
            alert('Libro guardado exitosamente.');
            window.location.href = '../php/biblioteca.php';
          </script>";
}
?>