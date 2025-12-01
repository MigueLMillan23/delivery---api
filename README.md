
# Proyecto Laravel: Dashboard CRUD

## Descripción
Proyecto de gestión CRUD usando Laravel 10 y Sanctum para autenticación con tokens.
Incluye: gestión de Productos, Clientes, Pedidos y Repartidores.

## Instalación
1. Clonar el repositorio.
2. Ejecutar:
   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
   ```

## Uso
- Acceder a: `http://127.0.0.1:8000/login`
- Iniciar sesión con credenciales válidas.

## Credenciales de prueba
- **Email:** miguel@example.com  
- **Contraseña:** 12345678

## Estructura de Carpetas
- `resources/views/layouts/app.blade.php` → Layout principal.
- `resources/views/login.blade.php` → Vista de login.
- `resources/views/dashboard.blade.php` → Vista principal del dashboard.

## Rutas Importantes
- `/login` → Página de login.
- `/dashboard` → Dashboard.
- `/api/productos`, `/api/clientes`, `/api/pedidos`, `/api/repartidores` → Endpoints CRUD.

## Tecnologías
- Laravel 10
- Sanctum (autenticación)
- Blade Templates
- Axios (consumo API)
