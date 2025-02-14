RESPUESTA GET

http://127.0.0.1:8000/api/categoria_articulos

{
"status": "success",
"data": [
{
"id": 1,
"nombre": "Categoria 1",
"descripcion": "Descripcion 1",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 2,
"nombre": "Categoria nuevo",
"descripcion": "Descripcion 2",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T21:59:51.000000Z"
},
{
"id": 3,
"nombre": "Categoria 3",
"descripcion": "Descripcion 3",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 4,
"nombre": "Categoria 4",
"descripcion": "Descripcion 4",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 5,
"nombre": "Categoria 5",
"descripcion": "Descripcion 5",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
}
]
}

RESPUESTA GET CON ID

http://127.0.0.1:8000/api/categoria_articulos/1

{
"status": "success",
"data": {
"id": 1,
"nombre": "Categoria 1",
"descripcion": "Descripcion 1",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
}
}

RESPUESTA POST

http://127.0.0.1:8000/api/categoria_articulos

{
"status": "success",
"message": "Categoría creada exitosamente",
"data": {
"id": 6,
"nombre": "Categoria nueva",
"descripcion": "Esta es una descripción de prueba",
"created_at": "2025-02-13T23:14:40.000000Z",
"updated_at": "2025-02-13T23:14:40.000000Z"
}
}

RESPUESTA PUT

http://127.0.0.1:8000/api/categoria_articulos/1

{
"status": "success",
"message": "Categoría actualizada exitosamente",
"data": {
"id": 1,
"nombre": "Categoría Actualizada",
"descripcion": "Descripción actualizada",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T23:18:53.000000Z"
}
}
