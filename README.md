# CRUD PARA GESTIONAR TAREAS

Simulacro de entrevista tecnica que consiste en desarrollar una aplicación CRUD simple de gestión de tareas.

El sistema permitirá:

- Crear tareas
- Listar tareas
- Marcar tareas como completadas
- Eliminar tareas

## 1. Backend (Laravel + MySQL)

Modelo: Task
Campos:

- id (autoincremental)
- title (string, obligatorio)
- description (text, opcional)
- completed (boolean, por defecto false)
- created_at
- updated_at

### API REST

| Método | Endpoint | Descripción |
| :--- | :--- | :--- |
| **GET** | /api/tasks | Listar todas las tareas |
| **POST** | /api/tasks | Crear una nueva tarea |
| **PUT** | /api/tasks/{id} | Actualizar una tarea (marcar como completada) |
| **DELETE** | /api/tasks/{id} | Eliminar una tarea |

### Validaciones

- title es obligatorio y máximo 255 caracteres
- completed debe ser boolean

### Requisitos técnicos

- Usar Eloquent
- Usar migraciones
- Responder en JSON
- Manejar errores básicos (404 si no existe la tarea)

## Frontend (Vue)

### Funcionalidades

- Formulario para crear una tarea
- Listado de tareas
- Checkbox para marcar una tarea como completada
- Botón para eliminar tareas

### Requisitos técnicos

- Usar axios o fetch para consumir la API
- Uso de v-model
- Uso de v-for
- Manejo básico de estado (array de tareas)
- Mostrar mensajes de error simples