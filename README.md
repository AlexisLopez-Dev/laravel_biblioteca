<div align="center">
  <h1 align="center">📚 MiBiblioteca</h1>
  
  <p align="center">
    Una aplicación web moderna para gestionar tu colección de libros, construida con <strong>Laravel</strong> y estilizada con <strong>Tailwind CSS</strong>.
  </p>

  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" />
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS" />
</div>

<br>

<div align="center">
  <img src="https://github.com/user-attachments/assets/b74cfb2f-b5a6-4095-826c-c83f182839de" alt="Vista Principal de la Biblioteca" width="100%" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
</div>

---

## Características Principales

Este proyecto es un CRUD completo diseñado con un fuerte enfoque en la experiencia de usuario (UX) y buenas prácticas en el lado del servidor.

- **Interfaz UI/UX Responsiva:** Sistema de tarjetas en cuadrícula (Grid) y feedback visual dinámico construido íntegramente con **Tailwind CSS**.
- **Búsqueda Avanzada:** Lógica de base de datos optimizada para permitir búsquedas por texto y filtrado múltiple simultáneo (género, estado de lectura, formato, favoritos).
- **Interacción Dinámica:** Sistema de "Favoritos" integrado directamente en la vista principal.
- **Validación de Datos:** Control estricto de formularios en el servidor (Request Validation) con persistencia de estado (old input) para no perder datos.
- **Control de Préstamos:** Registro de libros prestados con asignación de fechas.

---

## 📸 Galería de Vistas

|  Edición de libro | Formulario de Creación |
|:---:|:---:|
| <img src="https://github.com/user-attachments/assets/d6811220-da3d-4f69-aed7-4a76ac7a9df2" width="100%"> | <img src="https://github.com/user-attachments/assets/546c7faf-d239-4dc5-9fb9-65ceb53fa35a" width="100%"> |

<div align="center">
  <h3>Detalle de libro</h3>
    <img src="https://github.com/user-attachments/assets/d6a6ce14-b2ca-4eb0-8f69-b22e0996b52f" width="100%">
  
</div>

## Instalación y Despliegue Local

Sigue estos pasos para levantar el proyecto en tu propia máquina usando la base de datos SQLite (viene configurada por defecto):

**1. Clona el repositorio**
```bash
git clone https://github.com/AlexisLopez-Dev/laravel_biblioteca.git
cd laravel_biblioteca
```

**2. Instala las dependencias (PHP y Node.js)**
```bash
composer install
npm install
npm run build
```

**3. Configura el entorno**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Ejecuta las migraciones de Base de Datos**
```bash
php artisan migrate
```

**5. Inicia el servidor de desarrollo**
```bash
php artisan serve
```
El proyecto estará disponible en http://localhost:8000.
