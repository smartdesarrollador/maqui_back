RESPUESTAS API JSON ARTICULOS

1. Obtener todos los artículos - GET

http://127.0.0.1:8000/api/articulos/1

{
"data": [
{
"id": 1,
"nombre": "Articulo 1",
"descripcion": "Descripcion 1",
"precio": "100.00",
"categoria_id": 1,
"categoria": {
"id": 1,
"nombre": "Categoría Actualizada 1",
"descripcion": "Descripción actualizada"
},
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 2,
"nombre": "Articulo 2",
"descripcion": "Descripcion 2",
"precio": "200.00",
"categoria_id": 1,
"categoria": {
"id": 1,
"nombre": "Categoría Actualizada 1",
"descripcion": "Descripción actualizada"
},
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 3,
"nombre": "Articulo 3",
"descripcion": "Descripcion 3",
"precio": "300.00",
"categoria_id": 2,
"categoria": {
"id": 2,
"nombre": "Categoria nuevo",
"descripcion": "Descripcion 2"
},
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 4,
"nombre": "Articulo 4",
"descripcion": "Descripcion 4",
"precio": "400.00",
"categoria_id": 2,
"categoria": {
"id": 2,
"nombre": "Categoria nuevo",
"descripcion": "Descripcion 2"
},
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 5,
"nombre": "Articulo 5",
"descripcion": "Descripcion 5",
"precio": "500.00",
"categoria_id": 3,
"categoria": {
"id": 3,
"nombre": "Categoria 3",
"descripcion": "Descripcion 3"
},
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 6,
"nombre": "Articulo 6",
"descripcion": "Descripcion 6",
"precio": "600.00",
"categoria_id": 3,
"categoria": {
"id": 3,
"nombre": "Categoria 3",
"descripcion": "Descripcion 3"
},
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 7,
"nombre": "Articulo 7",
"descripcion": "Descripcion 7",
"precio": "700.00",
"categoria_id": 4,
"categoria": {
"id": 4,
"nombre": "Categoria 4",
"descripcion": "Descripcion 4"
},
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 8,
"nombre": "Articulo 8",
"descripcion": "Descripcion 8",
"precio": "800.00",
"categoria_id": 4,
"categoria": {
"id": 4,
"nombre": "Categoria 4",
"descripcion": "Descripcion 4"
},
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 9,
"nombre": "Articulo 9",
"descripcion": "Descripcion 9",
"precio": "900.00",
"categoria_id": 5,
"categoria": {
"id": 5,
"nombre": "Categoria 5",
"descripcion": "Descripcion 5"
},
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
},
{
"id": 10,
"nombre": "Articulo 10",
"descripcion": "Descripcion 10",
"precio": "1000.00",
"categoria_id": 5,
"categoria": {
"id": 5,
"nombre": "Categoria 5",
"descripcion": "Descripcion 5"
},
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
}
]
}

2. Obtener un artículo específico - GET

http://127.0.0.1:8000/api/articulos/3

{
"data": {
"id": 3,
"nombre": "Articulo 3",
"descripcion": "Descripcion 3",
"precio": "300.00",
"categoria_id": 2,
"categoria": {
"id": 2,
"nombre": "Categoria nuevo",
"descripcion": "Descripcion 2"
},
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-13T04:02:49.000000Z"
}
}

3. Crear un nuevo artículo - POST

http://127.0.0.1:8000/api/articulos

{
"data": {
"id": 12,
"nombre": "Artículo nuevo",
"descripcion": "Descripción nueva",
"precio": 149.99,
"categoria_id": 2,
"categoria": {
"id": 2,
"nombre": "Categoria nuevo",
"descripcion": "Descripcion 2"
},
"created_at": "2025-02-14T17:06:04.000000Z",
"updated_at": "2025-02-14T17:06:04.000000Z"
}
}

4. Actualizar un artículo específico - PUT

http://127.0.0.1:8000/api/articulos/1

{
"data": {
"id": 1,
"nombre": "Artículo actualizado",
"descripcion": "Descripción actualizada",
"precio": "149.99",
"categoria_id": 2,
"categoria": {
"id": 2,
"nombre": "Categoria nuevo",
"descripcion": "Descripcion 2"
},
"created_at": "2025-02-13T04:02:49.000000Z",
"updated_at": "2025-02-14T17:04:36.000000Z"
}
}

5. Eliminar un artículo específico - DELETE

http://127.0.0.1:8000/api/articulos/1

{
"message": "Artículo eliminado correctamente"
}
