RESPUESTA GET

http://127.0.0.1:8000/api/categoria_articulos

{"status":"success","data":[{"id":1,"nombre":"Categoria 1","descripcion":"Descripcion 1","created_at":"2025-02-14T21:17:01.000000Z","updated_at":"2025-02-14T21:17:01.000000Z"},{"id":2,"nombre":"Categoria 2","descripcion":"Descripcion 2","created_at":"2025-02-14T21:17:01.000000Z","updated_at":"2025-02-14T21:17:01.000000Z"},{"id":3,"nombre":"Categoria 3","descripcion":"Descripcion 3","created_at":"2025-02-14T21:17:01.000000Z","updated_at":"2025-02-14T21:17:01.000000Z"},{"id":4,"nombre":"Categoria 4","descripcion":"Descripcion 4","created_at":"2025-02-14T21:17:01.000000Z","updated_at":"2025-02-14T21:17:01.000000Z"},{"id":5,"nombre":"Categoria 5","descripcion":"Descripcion 5","created_at":"2025-02-14T21:17:01.000000Z","updated_at":"2025-02-14T21:17:01.000000Z"}]}

RESPUESTA GET CON ID

http://127.0.0.1:8000/api/categoria_articulos/1

{"status":"success","data":{"id":1,"nombre":"Categoria 1","descripcion":"Descripcion 1","created_at":"2025-02-14T21:17:01.000000Z","updated_at":"2025-02-14T21:17:01.000000Z"}}

RESPUESTA POST

http://127.0.0.1:8000/api/categoria_articulos

{"status":"success","message":"Categor\u00eda creada exitosamente","data":{"id":6,"nombre":"Art\u00edculo nuevo","descripcion":"Descripci\u00f3n nueva","created_at":"2025-02-16T15:54:12.000000Z","updated_at":"2025-02-16T15:54:12.000000Z"}}

RESPUESTA PUT

http://127.0.0.1:8000/api/categoria_articulos/1

{"status":"success","message":"Categor\u00eda actualizada exitosamente","data":{"id":1,"nombre":"Art\u00edculo actualizado","descripcion":"Descripci\u00f3n actualizada","created_at":"2025-02-14T21:17:01.000000Z","updated_at":"2025-02-16T15:54:34.000000Z"}}

RESPUESTA DELETE

http://127.0.0.1:8000/api/categoria_articulos/1

{"status":"success","message":"Categor\u00eda actualizada exitosamente","data":{"id":1,"nombre":"Art\u00edculo actualizado","descripcion":"Descripci\u00f3n actualizada","created_at":"2025-02-14T21:17:01.000000Z","updated_at":"2025-02-16T15:54:34.000000Z"}}
