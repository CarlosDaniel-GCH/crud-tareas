# CRUD PARA GESTIONAR TAREAS

Simulacro de entrevista técnica que consiste en desarrollar una aplicación CRUD simple de gestión de tareas utilizando un stack moderno.

El sistema permite la gestión completa del ciclo de vida de una tarea:
* **Crear** nuevas tareas con título y descripción.
* **Listar** todas las tareas existentes en tiempo real.
* **Marcar** tareas como completadas/pendientes.
* **Eliminar** tareas del sistema.

---

## 🛠️ Tecnologías Utilizadas

Este proyecto ha sido desarrollado bajo la arquitectura de desacoplamiento (API Rest + SPA):

| Capa | Tecnología |
| :--- | :--- |
| **Backend** | [Laravel 10+](https://laravel.com/) (PHP) |
| **Frontend** | [Vue.js 3](https://vuejs.org/) (Composition API) |
| **Base de Datos** | MySQL |
| **Bundler** | [Vite](https://vitejs.dev/) |
| **Cliente HTTP** | Axios |
| **Estilos** | CSS3 Puro (Custom Properties & Flexbox) |

---

## 🚀 Instalación y Configuración

Sigue estos pasos para configurar el entorno de desarrollo local:

### 1. Requisitos Previos
* PHP >= 8.1
* Composer
* Node.js & NPM
* MySQL Server

### 2. Configuración del Backend (Laravel)
```bash
# 1. Clonar el repositorio
git clone https://github.com/CarlosDaniel-GCH/crud-tareas.git
cd crud-tareas

# 2. Instalar dependencias de PHP
composer install

# 3. Configurar archivo de entorno
cp .env.example .env

# 4. Generar la clave de seguridad
php artisan key:generate

# 5. Crea la base de datos con el nombre crud-tareas y ejecuta las migraciones
php artisan migrate

# 6. Instalar dependencias de JavaScript
npm install
```

### 3. Ejecucion del proyecto

Para que la aplicación funcione, debes mantener ambos servicios corriendo en terminales diferentes:

- Terminal 1 (API): php artisan serve
- Terminal 2 (Frontend): npm run dev