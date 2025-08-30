# Proyecto: CRUD en CodeIgniter 4 con Materialize y MariaDB

Este proyecto fue desarrollado como práctica de curso. Se implementa CRUD para **Alumnos** y **Cursos**, y la asignación de cursos a alumnos usando una tabla de detalle.

## Cómo ejecutar
1. Configura la base de datos en `app/Config/Database.php` (usuario, contraseña y nombre de la base).
2. Importa el archivo `script.sql` en MariaDB (crea las tablas `alumnos`, `cursos` y `detalle_alumno_curso`).
3. En la carpeta del proyecto, ejecuta:
   ```bash
   php spark serve
   ```
4. Abre `http://localhost:8080` en el navegador.

## Funcionalidades
- CRUD completo de **Cursos**: crear, editar, eliminar y listar.
- Listado de **Alumnos** con:
  - Ícono 📚 para asignar cursos (abre un modal con checklist).
  - Ícono 👁️ para ver cursos ya asignados (modal de consulta).
  - Indicador visual: el ícono 📚 cambia de color cuando hay cursos asignados.
- **Navbar** sencillo para moverse entre *Alumnos* y *Cursos*.

## Rutas principales
- `/cursos` — listado
- `/cursos/create` — crear
- `/cursos/edit/{id}` — editar
- `/cursos/delete/{id}` — eliminar
- `/alumnos/{id}/asignaciones` — (GET) cursos y asignados del alumno (JSON)
- `/alumnos/{id}/asignaciones` — (POST) guardar asignaciones

## Evidencias (colocar pantallazos)
Guarda las capturas en `public/docs/`:
- `01_cursos_crud.png`
- `02_asignar_cursos.png`
- `03_cursos_asignados.png`

## Diagrama ER
Archivo `public/docs/er_diagrama.md` con el diagrama (formato Mermaid).
