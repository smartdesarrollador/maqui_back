RESPUESTAS JSON ESTUDIANTES

1. Obtener todos los estudiantes

http://127.0.0.1:8000/api/estudiantes - GET

{
"data": [
{
"id": 1,
"nombre": "Juan Pérez",
"email": "juan.perez@example.com",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"cursos": [
{
"id": 1,
"nombre": "Curso de Programación",
"descripcion": "Curso de programación básica",
"precio": "100.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "4.5"
}
},
{
"id": 2,
"nombre": "Curso de Diseño Web",
"descripcion": "Aprende HTML, CSS y JavaScript desde cero",
"precio": "150.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "3.8"
}
}
]
},
{
"id": 2,
"nombre": "María García",
"email": "maria.garcia@example.com",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"cursos": [
{
"id": 1,
"nombre": "Curso de Programación",
"descripcion": "Curso de programación básica",
"precio": "100.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "4.2"
}
},
{
"id": 3,
"nombre": "Curso de Base de Datos",
"descripcion": "Fundamentos de SQL y diseño de bases de datos",
"precio": "120.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "4.7"
}
}
]
},
{
"id": 3,
"nombre": "Carlos Rodríguez",
"email": "carlos.rodriguez@example.com",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"cursos": [
{
"id": 2,
"nombre": "Curso de Diseño Web",
"descripcion": "Aprende HTML, CSS y JavaScript desde cero",
"precio": "150.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "3.5"
}
},
{
"id": 4,
"nombre": "Curso de PHP Laravel",
"descripcion": "Desarrollo web con el framework Laravel",
"precio": "200.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "4.1"
}
}
]
},
{
"id": 4,
"nombre": "Ana Martínez",
"email": "ana.martinez@example.com",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"cursos": [
{
"id": 3,
"nombre": "Curso de Base de Datos",
"descripcion": "Fundamentos de SQL y diseño de bases de datos",
"precio": "120.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "4.8"
}
},
{
"id": 5,
"nombre": "Curso de DevOps",
"descripcion": "Introducción a las prácticas DevOps y herramientas",
"precio": "180.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "4.3"
}
}
]
},
{
"id": 5,
"nombre": "Pedro Sánchez",
"email": "pedro.sanchez@example.com",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"cursos": [
{
"id": 1,
"nombre": "Curso de Programación",
"descripcion": "Curso de programación básica",
"precio": "100.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "3.9"
}
},
{
"id": 4,
"nombre": "Curso de PHP Laravel",
"descripcion": "Desarrollo web con el framework Laravel",
"precio": "200.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "4.4"
}
}
]
},
{
"id": 6,
"nombre": "Laura López",
"email": "laura.lopez@example.com",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"cursos": [
{
"id": 2,
"nombre": "Curso de Diseño Web",
"descripcion": "Aprende HTML, CSS y JavaScript desde cero",
"precio": "150.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "4.6"
}
},
{
"id": 5,
"nombre": "Curso de DevOps",
"descripcion": "Introducción a las prácticas DevOps y herramientas",
"precio": "180.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "4.0"
}
}
]
},
{
"id": 7,
"nombre": "Miguel Torres",
"email": "miguel.torres@example.com",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"cursos": [
{
"id": 3,
"nombre": "Curso de Base de Datos",
"descripcion": "Fundamentos de SQL y diseño de bases de datos",
"precio": "120.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "3.7"
}
}
]
},
{
"id": 8,
"nombre": "Carmen Ruiz",
"email": "carmen.ruiz@example.com",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"cursos": [
{
"id": 4,
"nombre": "Curso de PHP Laravel",
"descripcion": "Desarrollo web con el framework Laravel",
"precio": "200.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "4.2"
}
},
{
"id": 5,
"nombre": "Curso de DevOps",
"descripcion": "Introducción a las prácticas DevOps y herramientas",
"precio": "180.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "4.9"
}
}
]
},
{
"id": 9,
"nombre": "José Morales",
"email": "jose.morales@example.com",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"cursos": []
},
{
"id": 10,
"nombre": "Isabel Flores",
"email": "isabel.flores@example.com",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"cursos": []
}
]
}

2. Obtener un estudiante específico

http://127.0.0.1:8000/api/estudiantes/1 - GET

{
"data": {
"id": 1,
"nombre": "Juan Pérez",
"email": "juan.perez@example.com",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"cursos": [
{
"id": 1,
"nombre": "Curso de Programación",
"descripcion": "Curso de programación básica",
"precio": "100.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "4.5"
}
},
{
"id": 2,
"nombre": "Curso de Diseño Web",
"descripcion": "Aprende HTML, CSS y JavaScript desde cero",
"precio": "150.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "3.8"
}
}
]
}
}

3. Crear un nuevo estudiante

http://127.0.0.1:8000/api/estudiantes - POST

{
"message": "Estudiante creado exitosamente",
"data": {
"id": 11,
"nombre": "Juan Pérez",
"email": "juan@ejemplo.com",
"created_at": "2025-02-15T00:14:22.000000Z",
"updated_at": "2025-02-15T00:14:22.000000Z"
}
}

4. Actualizar un estudiante específico

http://127.0.0.1:8000/api/estudiantes/1 - PUT

{
"message": "Estudiante actualizado exitosamente",
"data": {
"id": 1,
"nombre": "Juan Pérez Actualizado",
"email": "juan.actualizado@ejemplo.com",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-15T00:24:33.000000Z",
"cursos": [
{
"id": 1,
"nombre": "Curso de Programación",
"descripcion": "Curso de programación básica",
"precio": "100.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "4.5"
}
},
{
"id": 2,
"nombre": "Curso de Diseño Web",
"descripcion": "Aprende HTML, CSS y JavaScript desde cero",
"precio": "150.00",
"created_at": "2025-02-14T21:17:02.000000Z",
"updated_at": "2025-02-14T21:17:02.000000Z",
"inscripcion": {
"fecha_inscripcion": "2025-02-14",
"calificacion": "3.8"
}
}
]
}
}

5. Eliminar un estudiante específico

http://127.0.0.1:8000/api/estudiantes/1 - DELETE

{
"message": "Estudiante eliminado exitosamente"
}
