# 📅 Gestor de Citas (app-booking-simple)

Este es mi primer proyecto de gestor de citas, enfocado en aprender y consolidar los fundamentos del desarrollo web integrando backend, frontend y automatizaciones.

## 🛠️ Tecnologías y Lenguajes Usados

* **HTML:** Estructura de las páginas y formularios de la interfaz de usuario.
* **CSS:** Estilos visuales, diseño y adaptabilidad de la aplicación.
* **JavaScript (JS):** Lógica interactiva del cliente e integración de la librería de calendario `flatpickr`.
* **PHP:** Procesamiento del lado del servidor, gestión de sesiones y creación de los endpoints de la API.
* **Python:** Tareas automatizadas del sistema.

## 💡 Aprendizajes Clave

Durante el desarrollo de este proyecto he puesto en práctica:

* **Bases de Datos Relacionales:** Diseño y modelado de tablas estructuradas y relacionadas para la gestión de usuarios, clientes, citas y servicios.
* **Librerías Frontend (flatpickr):** Integración de la librería de JavaScript `flatpickr` para ofrecer una experiencia fluida e interactiva en la selección de fechas y horas.
* **Estructura e Integración:** Organización limpia del código en módulos independientes (API, Backend, Frontend y Automatizaciones).

## 📂 Estructura del Proyecto

```text
app-booking-simple/
├── .venv/                      # Entorno virtual de Python
│   ├── Include/
│   ├── Lib/
│   ├── Scripts/
│   ├── .gitignore
│   ├── CACHEDIR.TAG
│   └── pyvenv.cfg
├── api/                        # Endpoints para peticiones y datos
│   ├── get-client.php
│   ├── get-hours.php
│   ├── get-services.php
│   └── get-users.php
├── backend/                    # Lógica del servidor y procesos internos
│   ├── automatisation/
│   └── starts-sesion/
├── config/                     # Archivos de configuración
│   └── database.php
├── node_modules/               # Módulos e instalación de librerías
│   ├── flatpickr/
│   └── .package-lock.json
├── public/                     # Contenido accesible públicamente
│   ├── css/
│   ├── img/
│   ├── js/
│   ├── pages/
│   └── index.php
├── src/                        # Obtención de datos de formularios de clientes y redirección
│   └── get-client-form.php
├── .env                        # Variables de entorno
├── .gitattributes
├── .gitignore
├── LICENSE
├── package-lock.json
├── package.json
└── readme.md