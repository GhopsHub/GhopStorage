## 🧰 Comandos Útiles de Laravel (Artisan)

Una guía rápida de los comandos más usados para trabajar eficientemente con Laravel.

---

### 🚀 Servidor y Entorno

- `php artisan serve`  
  Inicia el servidor local de desarrollo.

- `php artisan tinker`  
  Abre una consola interactiva para probar código en tiempo real.

---

### 🛠️ Generación de Recursos

- `php artisan make:controller NombreController`  
  Crea un nuevo controlador.

- `php artisan make:model Nombre`  
  Crea un nuevo modelo.

- `php artisan make:migration create_tabla`  
  Genera una nueva migración de base de datos.

- `php artisan make:seeder NombreSeeder`  
  Crea un seeder para insertar datos de prueba.

- `php artisan make:middleware NombreMiddleware`  
  Genera un middleware personalizado.

- `php artisan make:request NombreRequest`  
  Crea una clase para validación de formularios.

- `php artisan make:command NombreComando`  
  Crea un nuevo comando personalizado.

---

### 🗃️ Base de Datos

- `php artisan migrate`  
  Ejecuta todas las migraciones pendientes.

- `php artisan migrate:rollback`  
  Revierte la última migración.

- `php artisan migrate:fresh`  
  Elimina y vuelve a crear todas las tablas.

- `php artisan db:seed`  
  Ejecuta los seeders para poblar la base de datos.

---

### 🧩 Rutas y Configuración

- `php artisan route:list`  
  Muestra una tabla con todas las rutas definidas.

- `php artisan config:cache`  
  Genera y guarda la caché de configuración.

- `php artisan cache:clear`  
  Limpia la caché de la aplicación.

- `php artisan config:clear`
  Limpiar el cache de configuración

- `php artisan route:clear`
  Limpiar el cache de rutas

- `php artisan storage:link`  
  Crea un enlace simbólico para acceso a archivos públicos.

---

### 📦 Tareas en Cola

- `php artisan queue:work`  
  Ejecuta trabajos en segundo plano usando el sistema de colas.

---
