# 📅 Gestor de Citas (`app-booking-simple`)

Sistema de gestión y reserva de citas desarrollado con **PHP** en el backend, **HTML/CSS/JS** en el frontend (interfaz interactiva) y **Python** para tareas automatizadas.

---

## 📂 Estructura del Proyecto

```text
app-booking-simple/
├── config/                 <- Configuración de conexión a la Base de Datos
│   └── database.php
├── public/                 <- Punto de entrada público (Assets accesibles por navegador)
│   ├── css/                <- Hojas de estilo (globales, animaciones, etc.)
│   ├── js/                 <- Lógica JS del cliente (FullCalendar, validaciones)
│   ├── img/                <- Imágenes estáticas (logos, iconos)
│   └── index.php           <- Punto de entrada principal a la web
├── src/                    <- Lógica del Backend (Clases, Controladores)
│   ├── citas_controller.php
│   └── disponibilidad.php
├── scripts_python/         <- Tareas automatizadas (ej. envío de recordatorios)
│   ├── enviar_recordatorios.py
│   └── requirements.txt
├── views/                  <- Plantillas y vistas HTML/PHP de la interfaz
├── .gitignore              <- Archivos excluidos del control de versiones
├── LICENSE                 <- Licencia del proyecto
└── README.md               <- Documentación principal
```

---

## 🚀 Instalación y Configuración Local

### 1. Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/app-booking-simple.git
cd app-booking-simple
```

### 2. Base de Datos

- Crea una base de datos MySQL en tu servidor local (ej. phpMyAdmin).
- Configura tus credenciales de conexión en el archivo `config/database.php`.

### 3. Servidor Web

Apunta la raíz (Document Root) de tu servidor web a la carpeta `/public` para mayor seguridad.

### 4. Entorno de Python (para scripts automatizados)

```bash
cd scripts_python
pip install -r requirements.txt
```

---

## 📏 Convenciones de Nomenclatura (Naming Conventions)

Para mantener la consistencia en el código, todo el equipo debe respetar los siguientes estándares:

### 1. Archivos y Directorios

| Tipo | Formato | Ejemplo |
|---|---|---|
| Archivos web (PHP, CSS) | snake_case (minúsculas y guiones bajos) | `citas_controller.php`, `style_animation.css` |
| Imágenes y Assets | kebab-case (minúsculas y guiones medios) | `logo-principal.png`, `icon-calendar.svg` |
| Archivos JS | snake_case o palabra simple | `calendar.js`, `main.js` |

### 2. Backend (PHP)

- **Clases:** PascalCase (Capitalizado en cada palabra).
  Ejemplo: `class CitasController { ... }`
- **Métodos y Funciones:** camelCase.
  Ejemplo: `public function obtenerDisponibilidad() { ... }`
- **Variables:** snake_case.
  Ejemplo: `$fecha_reserva`, `$usuario_id`
- **Constantes:** UPPER_SNAKE_CASE.
  Ejemplo: `define('DB_HOST', 'localhost');`

### 3. Frontend (JavaScript)

- **Variables y Funciones:** camelCase.
  Ejemplo: `let fechaSeleccionada;`
  Ejemplo: `function cargarCalendario() { ... }`

### 4. Maquetación (HTML / CSS)

- **Clases e IDs en CSS:** kebab-case.
  Ejemplo: `.btn-reserva`, `#calendar-container`

  Se debe de colocar el nombre de la clase o ID lo que contenga el los hijos, por ejemplo si un div tiene dentro un h2 un p y un div se debe de poner div-h2pdiv de esta manera

---

## 🛡️ Reglas de Desarrollo y Buenas Prácticas

**⚠️ Importante (Seguridad & Git):**

- NUNCA subas contraseñas reales ni credenciales de producción en `config/database.php`.
- El archivo `.gitignore` debe permanecer en la raíz del proyecto.

**Separación de Responsabilidades:**

- No incluir HTML dentro de los archivos de la carpeta `src/`. La lógica PHP procesa datos y los envía a las plantillas en `views/`.
- Todo el contenido estático expuesto al cliente (imágenes, estilos, scripts) debe residir dentro de `/public`.

**Mensajes de Commit (Git):**

Usar un estilo claro, descriptivo y en tiempo presente.

Ejemplos:
- `feat: añade validación de fechas en formulario`
- `fix: corrige error de conexión en DB`
- `docs: actualiza instrucciones en README`