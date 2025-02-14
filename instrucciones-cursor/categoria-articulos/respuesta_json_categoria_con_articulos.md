RESPUESTA GET

http://127.0.0.1:8000/api/categoria_articulos

{
"status": "success",
"data": [
{
"id": 1,
"nombre": "Categoría Actualizada",
"descripcion": "Descripción actualizada",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-14T04:04:43.000000Z",
"articulos": [
{
"id": 1,
"nombre": "Articulo 1",
"descripcion": "Descripcion 1",
"precio": "100.00",
"categoria_id": 1,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 2,
"nombre": "Articulo 2",
"descripcion": "Descripcion 2",
"precio": "200.00",
"categoria_id": 1,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
}
],
"total_articulos": 2,
"precio_promedio_articulos": 150
},
{
"id": 2,
"nombre": "Categoria nuevo",
"descripcion": "Descripcion 2",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T21:59:51.000000Z",
"articulos": [
{
"id": 3,
"nombre": "Articulo 3",
"descripcion": "Descripcion 3",
"precio": "300.00",
"categoria_id": 2,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 4,
"nombre": "Articulo 4",
"descripcion": "Descripcion 4",
"precio": "400.00",
"categoria_id": 2,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
}
],
"total_articulos": 2,
"precio_promedio_articulos": 350
},
{
"id": 3,
"nombre": "Categoria 3",
"descripcion": "Descripcion 3",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z",
"articulos": [
{
"id": 5,
"nombre": "Articulo 5",
"descripcion": "Descripcion 5",
"precio": "500.00",
"categoria_id": 3,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 6,
"nombre": "Articulo 6",
"descripcion": "Descripcion 6",
"precio": "600.00",
"categoria_id": 3,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
}
],
"total_articulos": 2,
"precio_promedio_articulos": 550
},
{
"id": 4,
"nombre": "Categoria 4",
"descripcion": "Descripcion 4",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z",
"articulos": [
{
"id": 7,
"nombre": "Articulo 7",
"descripcion": "Descripcion 7",
"precio": "700.00",
"categoria_id": 4,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 8,
"nombre": "Articulo 8",
"descripcion": "Descripcion 8",
"precio": "800.00",
"categoria_id": 4,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
}
],
"total_articulos": 2,
"precio_promedio_articulos": 750
},
{
"id": 5,
"nombre": "Categoria 5",
"descripcion": "Descripcion 5",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z",
"articulos": [
{
"id": 9,
"nombre": "Articulo 9",
"descripcion": "Descripcion 9",
"precio": "900.00",
"categoria_id": 5,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 10,
"nombre": "Articulo 10",
"descripcion": "Descripcion 10",
"precio": "1000.00",
"categoria_id": 5,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
}
],
"total_articulos": 2,
"precio_promedio_articulos": 950
},
{
"id": 6,
"nombre": "Categoria nueva",
"descripcion": "Esta es una descripción de prueba",
"created_at": "2025-02-13T23:14:40.000000Z",
"updated_at": "2025-02-13T23:14:40.000000Z",
"articulos": [],
"total_articulos": 0,
"precio_promedio_articulos": null
}
]
}

RESPUESTA GET CON ID

http://127.0.0.1:8000/api/categoria_articulos/1

{
"status": "success",
"data": {
"id": 1,
"nombre": "Categoría Actualizada",
"descripcion": "Descripción actualizada",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-14T04:04:43.000000Z",
"articulos": [
{
"id": 1,
"nombre": "Articulo 1",
"descripcion": "Descripcion 1",
"precio": "100.00",
"categoria_id": 1,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 2,
"nombre": "Articulo 2",
"descripcion": "Descripcion 2",
"precio": "200.00",
"categoria_id": 1,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
}
],
"total_articulos": 2,
"precio_promedio_articulos": 150
}
}

RESPUESTA POST

http://127.0.0.1:8000/api/categoria_articulos

{
"status": "success",
"message": "Categoría creada exitosamente",
"data": {
"id": 7,
"nombre": "Categoria nueva",
"descripcion": "Esta es una descripción de prueba",
"created_at": "2025-02-14T04:23:54.000000Z",
"updated_at": "2025-02-14T04:23:54.000000Z",
"articulos": [],
"total_articulos": 0,
"precio_promedio_articulos": null
}
}

RESPUESTA PUT

http://127.0.0.1:8000/api/categoria_articulos/1

{
"status": "success",
"message": "Categoría actualizada exitosamente",
"data": {
"id": 1,
"nombre": "Categoría Actualizada 1",
"descripcion": "Descripción actualizada",
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-14T04:24:32.000000Z",
"articulos": [
{
"id": 1,
"nombre": "Articulo 1",
"descripcion": "Descripcion 1",
"precio": "100.00",
"categoria_id": 1,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 2,
"nombre": "Articulo 2",
"descripcion": "Descripcion 2",
"precio": "200.00",
"categoria_id": 1,
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
}
],
"total_articulos": 2,
"precio_promedio_articulos": 150
}
}
