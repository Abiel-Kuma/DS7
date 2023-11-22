# README del Proyecto

## Sistema de Gestión de Tareas

Este script en PHP sirve como backend para un simple Sistema de Gestión de Tareas. Maneja operaciones básicas CRUD (Crear, Leer, Actualizar, Eliminar) para tareas almacenadas en una base de datos. El script utiliza una base de datos MySQL para el almacenamiento de datos y asume una tabla llamada `task` con columnas `ID`, `Titulo` (Título), `Descripcion` (Descripción), `Estado` (Estado), y `Fecha` (Fecha).

### Endpoints

#### 1. Obtener Tareas (GET)

- **Endpoint:** `/tasks.php`
- **Método:** GET
- **Descripción:** Recupera todas las tareas de la base de datos y las devuelve como un array JSON.
- **Respuesta:**
  ```json
  {
    "success": true,
    "data": [
      {
        "ID": 1,
        "Titulo": "Tarea de Ejemplo 1",
        "Descripcion": "Descripción de la tarea",
        "Estado": "Pendiente",
        "Fecha": "2023-01-01"
      },
      // ... tareas adicionales
    ]
  }
  ```

#### 2. Agregar una Nueva Tarea (POST)

- **Endpoint:** `/tasks.php`
- **Método:** POST
- **Parámetros:**
  - `titulo` (Título)
  - `descripcion` (Descripción)
  - `estado` (Estado)
  - `fecha` (Fecha)
- **Descripción:** Agrega una nueva tarea a la base de datos.
- **Respuesta:**
  - Éxito:
    ```json
    {
      "success": true,
      "message": "Tarea agregada con éxito."
    }
    ```
  - Fracaso:
    ```json
    {
      "success": false,
      "message": "Mensaje de error describiendo el problema."
    }
    ```

#### 3. Eliminar una Tarea (DELETE)

- **Endpoint:** `/tasks.php`
- **Método:** DELETE
- **Parámetros:**
  - `tarea_id` (ID de Tarea)
- **Descripción:** Elimina una tarea de la base de datos.
- **Respuesta:**
  - Éxito:
    ```json
    {
      "success": true,
      "message": "Tarea eliminada con éxito."
    }
    ```
  - Fracaso:
    ```json
    {
      "success": false,
      "message": "Mensaje de error describiendo el problema."
    }
    ```

#### 4. Actualizar una Tarea (PUT o POST)

- **Endpoint:** `/tasks.php`
- **Método:** PUT o POST
- **Parámetros:**
  - `tarea_id` (ID de Tarea)
  - `titulo` (Título)
  - `descripcion` (Descripción)
  - `estado` (Estado)
  - `fecha` (Fecha)
- **Descripción:** Actualiza una tarea existente en la base de datos.
- **Respuesta:**
  - Éxito:
    ```json
    {
      "success": true,
      "message": "Tarea actualizada con éxito."
    }
    ```
  - Fracaso:
    ```json
    {
      "success": false,
      "message": "Mensaje de error describiendo el problema."
    }
    ```

#### 5. Manejo de Errores

- Si se utiliza un método HTTP no admitido o si la solicitud está mal formada, el script devuelve:
  ```json
  {
    "success": false,
    "message": "Método no permitido."
  }
  ```

### Configuración de la Base de Datos

- El script asume que se establece una conexión a la base de datos utilizando el archivo `conexion.php`.

### Ejemplo de Uso

- Ejemplo de uso de la API con cURL para agregar una nueva tarea:
  ```bash
  curl -X POST -d "titulo=Nueva Tarea&descripcion=Descripción de la tarea&estado=Pendiente&fecha=2023-02-01" http://tudominio.com/tasks.php
  ```

### Nota

- Asegúrate de implementar medidas de seguridad adecuadas, como validación de entrada y autenticación, antes de implementar este script en un entorno de producción.

