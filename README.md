# 🐕 Plataforma de Adopción de Perros

Una aplicación web moderna y completa para facilitar la adopción de perros, desarrollada con Laravel 12, Livewire 3 y Flux UI.

## 📋 Descripción del Proyecto

Esta plataforma permite a los usuarios explorar perros disponibles para adopción, ver detalles completos de cada mascota y enviar solicitudes de adopción. El sistema está construido con tecnologías modernas y sigue las mejores prácticas de desarrollo web.

### Características Principales

- 🏠 **Feed de Perros**: Visualización de todos los perros disponibles para adopción en formato de tarjetas
- 📱 **Vista Detallada**: Página detallada de cada perro con información completa
- ⭐ **Sistema de Favoritos**: Permite guardar perros favoritos para revisar más tarde
- 📝 **Formulario de Adopción**: Modal interactivo para solicitar la adopción
- 🎨 **UI Moderna**: Interfaz de usuario atractiva con Flux UI y Tailwind CSS

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 12** - Framework PHP moderno
- **PHP 8.2+** - Lenguaje de programación
- **SQLite** - Base de datos (configurable a MySQL/PostgreSQL)

### Frontend
- **Livewire 3** - Framework reactivo para Laravel
- **Livewire Volt** - Sintaxis simplificada para componentes
- **Flux UI** - Biblioteca de componentes UI
- **Tailwind CSS 4** - Framework CSS utility-first
- **Vite** - Build tool y bundler moderno

### Testing
- **Pest PHP** - Framework de testing moderno
- **PHPUnit** - Testing unitario

## 📁 Estructura del Proyecto

```
dogs/
├── app/
│   ├── Actions/          # Acciones reutilizables (Fortify)
│   ├── DTOs/             # Data Transfer Objects
│   │   └── DogData.php   # DTO para datos de perros
│   ├── Http/
│   │   ├── Controllers/  # Controladores HTTP
│   │   ├── Requests/     # Form Requests
│   │   └── Resources/    # API Resources
│   ├── Livewire/         # Componentes Livewire
│   │   ├── DogCard.php   # Tarjeta de perro
│   │   ├── DogDetail.php # Vista detallada
│   │   ├── Favorites.php # Página de favoritos
│   │   └── Feed.php      # Feed principal
│   ├── Mappers/          # Mappers para transformación de datos
│   │   └── DogMapper.php
│   ├── Models/           # Modelos Eloquent
│   │   ├── Dog.php       # Modelo de perro
│   │   ├── Person.php    # Modelo de persona
│   │   └── User.php      # Modelo de usuario
│   ├── Providers/        # Service Providers
│   └── Services/         # Servicios de lógica de negocio
│       └── DogService.php
├── database/
│   ├── factories/        # Factories para testing
│   ├── migrations/       # Migraciones de base de datos
│   └── seeders/          # Seeders para datos de prueba
├── resources/
│   ├── css/             # Estilos CSS
│   ├── js/              # JavaScript
│   └── views/           # Vistas Blade
│       └── livewire/    # Vistas de componentes Livewire
├── routes/
│   ├── api.php          # Rutas de API
│   ├── web.php          # Rutas web
│   └── console.php      # Comandos de consola
└── tests/               # Tests automatizados
```

## 🚀 Instalación

### Requisitos Previos

- PHP >= 8.2
- Composer
- Node.js >= 18.x
- NPM o Yarn
- SQLite (o MySQL/PostgreSQL)

### Paso 1: Clonar el Repositorio

```bash
git clone https://github.com/UnTalJon/dogs
cd dogs
```

### Paso 2: Instalar Dependencias de PHP

```bash
composer install
```

### Paso 3: Configurar Variables de Entorno

```bash
cp .env.example .env
php artisan key:generate
```

Edita el archivo `.env` y configura las variables necesarias:

```env
APP_NAME="Adopción de Perritos"
APP_URL=http://localhost:8000
DB_CONNECTION=sqlite
```

### Paso 4: Preparar la Base de Datos

```bash
# Crear el archivo de base de datos SQLite
touch database/database.sqlite

# Ejecutar migraciones
php artisan migrate

# (Opcional) Poblar con datos de prueba
php artisan db:seed
```

### Paso 5: Instalar Dependencias de Frontend

```bash
npm install
```

### Paso 6: Compilar Assets

```bash
# Para desarrollo
npm run dev

# Para producción
npm run build
```

### Paso 7: Iniciar el Servidor

```bash
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`

## 🔧 Configuración Avanzada

### Base de Datos MySQL/PostgreSQL

Si prefieres usar MySQL o PostgreSQL en lugar de SQLite, actualiza tu `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dogs_db
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

### Configuración de API

El proyecto utiliza una API interna para obtener los datos de perros. Asegúrate de que `APP_URL` en tu `.env` esté configurado correctamente.

### Autenticación de Dos Factores

Para habilitar 2FA, asegúrate de que esté habilitado en `config/fortify.php`:

```php
Features::twoFactorAuthentication([
    'confirm' => true,
    'confirmPassword' => true,
]),
```

## 📘 Uso de la Aplicación

### Para Usuarios

1. **Explorar Perros**: Visita la página principal para ver todos los perros disponibles
2. **Ver Detalles**: Haz clic en cualquier perro para ver información completa
3. **Solicitar Adopción**: En la página de detalle, haz clic en "Quiero Adoptarlo" y completa el formulario
4. **Guardar Favoritos**: Marca perros como favoritos para revisarlos más tarde
5. **Crear Cuenta**: Regístrate para acceder a funciones adicionales

### Rutas Principales

- `/` - Feed principal de perros
- `/dogs/{id}` - Detalle de un perro específico
- `/favorites` - Página de favoritos

## 🏗️ Arquitectura

### Patrón de Diseño

El proyecto sigue una arquitectura limpia con separación de responsabilidades:

- **Models**: Representan las entidades de la base de datos
- **Services**: Contienen la lógica de negocio
- **DTOs**: Transferencia de datos entre capas
- **Mappers**: Transformación de datos entre formatos
- **Livewire Components**: Componentes reactivos para la UI

### Componentes Livewire

#### Feed Component
Muestra la lista completa de perros disponibles:
```php
// app/Livewire/Feed.php
```

#### DogDetail Component
Presenta información detallada de un perro:
```php
// app/Livewire/DogDetail.php
```

#### DogCard Component
Tarjeta individual de perro reutilizable:
```php
// app/Livewire/DogCard.php
```

### API Endpoints

```
GET /api/v1/dogs           - Lista todos los perros
GET /api/v1/dogs/{id}      - Obtiene un perro específico
```

## 🧪 Testing

### Ejecutar Tests

```bash
# Ejecutar todos los tests
php artisan test

# Ejecutar tests con Pest
./vendor/bin/pest

# Ejecutar tests con cobertura
./vendor/bin/pest --coverage
```

### Estructura de Tests

```
tests/
├── Feature/     # Tests de integración
│   └── ...
└── Unit/        # Tests unitarios
    └── ...
```

## 🎨 Personalización

### Estilos

Los estilos se encuentran en:
- `resources/css/` - CSS global
- Componentes individuales tienen estilos inline en sus vistas Blade

### Componentes Flux

El proyecto utiliza Flux UI. Puedes personalizar los componentes en:
```bash
php artisan vendor:publish --tag=flux-components
```
