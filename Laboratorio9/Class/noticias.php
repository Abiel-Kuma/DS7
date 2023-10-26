<?php
require_once('modelo.php');

class Task extends modeloCredencialesBD {
    protected $title;
    protected $description;
    protected $status;
    protected $due_date;
    protected $edited;
    protected $responsible;
    protected $task_type;

    public function __construct() {
        parent::__construct();
    }

    public function addTask() {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $due_date = $_POST['due_date'];
        $edited = isset($_POST['edited']) ? 1 : 0;
        $responsible = $_POST['responsible'];
        $task_type = $_POST['task_type'];

        $sql = "INSERT INTO tasks (title, description, status, due_date, edited, responsible, task_type) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->_db->prepare($sql);
        $stmt->bind_param("ssssiss", $title, $description, $status, $due_date, $edited, $responsible, $task_type);

        if ($stmt->execute()) {
            // Tarea agregada exitosamente
            echo "Tarea agregada exitosamente.";
        } else {
            // Error al agregar la tarea
            echo "Error al agregar la tarea: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = new Task();
    $task->addTask();
}

// Cerrar la conexión a la base de datos
$modelo = new modeloCredencialesBD();
$modelo->close();
?>
