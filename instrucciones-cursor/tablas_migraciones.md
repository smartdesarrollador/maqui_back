TABLAS

Schema::create('cliente', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('email')->unique();
            //$table->string('contraseña');
            $table->string('telefono')->nullable();
            $table->string('tipo_usuario')->default('cliente'); // cliente o admin
            $table->string('tipo_documento')->nullable(); // DNI, Pasaporte, etc.
            $table->string('numero_documento')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('departamento')->nullable();
            $table->string('provincia')->nullable();
            $table->string('distrito')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });


Schema::create('marcas', function (Blueprint $table) {
            $table->id('id_marca');
            $table->string('nombre');
            $table->string('origen')->nullable();
            $table->year('fundacion')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });

    Schema::create('modelos', function (Blueprint $table) {
            $table->id('id_modelo');
            $table->unsignedBigInteger("marca_id")->nullable();
            $table->foreign("marca_id")->references("id_marca")->on("marcas")->onDelete("set null");
            $table->string('nombre')->nullable();
            $table->string('tipo')->nullable(); // Deportiva, Touring, etc.
            $table->integer('cilindrada')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
        
Schema::create('tipo_motos', function (Blueprint $table) {
            $table->id('id_tipo_moto');
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps();
        });

Schema::create('motos', function (Blueprint $table) {
            $table->id('id_moto');
            $table->unsignedBigInteger("modelo_id")->nullable();
            $table->foreign("modelo_id")->references("id_modelo")->on("modelos")->onDelete("set null");
            $table->unsignedBigInteger("tipo_moto_id")->nullable();
            $table->foreign("tipo_moto_id")->references("id_tipo_moto")->on("tipo_motos")->onDelete("set null");
            $table->year('año')->nullable();
            $table->decimal('precio_base', 10, 2)->nullable();
            $table->string('color')->nullable();
            $table->integer('stock')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();

            // Nuevos atributos
            $table->decimal('cilindrada', 10, 1)->nullable();
            $table->string('motor')->nullable();
            $table->string('potencia')->nullable();
            $table->string('arranque')->nullable();
            $table->string('transmision')->nullable();
            $table->decimal('capacidad_tanque', 10, 1)->nullable();

            $table->integer('peso_neto')->nullable();
            $table->integer('carga_util')->nullable();
            $table->integer('peso_bruto')->nullable();
            $table->integer('largo')->nullable();
            $table->integer('ancho')->nullable();
            $table->integer('alto')->nullable();

            $table->string('neumatico_delantero')->nullable();
            $table->string('neumatico_posterior')->nullable();
            $table->string('freno_delantero')->nullable();
            $table->string('freno_posterior')->nullable();

            $table->boolean('cargador_usb')->default(false);
            $table->boolean('luz_led')->default(false);
            $table->boolean('alarma')->default(false);
            $table->boolean('cajuela')->default(false);
            $table->boolean('tablero_led')->default(false);
            $table->boolean('mp3')->default(false);
            $table->boolean('bluetooth')->default(false);
            $table->timestamps();
        });

Schema::create('tipo_accesorios', function (Blueprint $table) {
            $table->id('id_tipo_accesorio');
            $table->string('nombre')->nullable(); // Nombre del tipo de accesorio
    $table->text('descripcion')->nullable(); // Descripción del tipo de accesorio
            $table->timestamps();
        });

    
Schema::create('accesorios', function (Blueprint $table) {
            $table->id('id_accesorio');
            $table->string('nombre')->nullable();
            $table->string('tipo')->nullable(); // Casco, guantes, etc.
            $table->decimal('precio', 10, 2)->nullable();
            $table->integer('stock')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();

            $table->unsignedBigInteger("tipo_accesorio_id")->nullable();
            $table->foreign("tipo_accesorio_id")->references("id_tipo_accesorio")->on("tipo_accesorios")->onDelete("set null");
            $table->timestamps();
        });

Schema::create('accesorio_moto', function (Blueprint $table) {
            $table->id('id_accesorio_moto');
            $table->unsignedBigInteger("moto_id")->nullable();
            $table->foreign("moto_id")->references("id_moto")->on("motos")->onDelete("set null");
            $table->unsignedBigInteger("accesorio_id")->nullable();
            $table->foreign("accesorio_id")->references("id_accesorio")->on("accesorios")->onDelete("set null");
            $table->timestamps();
        });

Schema::create('tipo_repuestos', function (Blueprint $table) {
            $table->id('id_tipo_repuesto');
            $table->string('nombre')->nullable(); // Nombre del tipo de repuesto
            $table->text('descripcion')->nullable(); // Descripción del tipo de repuesto
            $table->timestamps();
        });

Schema::create('repuestos', function (Blueprint $table) {
            $table->id('id_repuesto');
            $table->string('nombre')->nullable();
            $table->string('tipo')->nullable(); // Motor, frenos, suspensión, etc.
            $table->decimal('precio', 10, 2)->nullable();
            $table->integer('stock')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();

            $table->unsignedBigInteger("tipo_repuesto_id")->nullable();
            $table->foreign("tipo_repuesto_id")->references("id_tipo_repuesto")->on("tipo_repuestos")->onDelete("set null");
            $table->timestamps();
        });

Schema::create('repuesto_moto', function (Blueprint $table) {
            $table->id('id_repuesto_moto');
            $table->unsignedBigInteger("moto_id")->nullable();
            $table->foreign("moto_id")->references("id_moto")->on("motos")->onDelete("set null");
            $table->unsignedBigInteger("repuesto_id")->nullable();
            $table->foreign("repuesto_id")->references("id_repuesto")->on("repuestos")->onDelete("set null");
            $table->timestamps();
        });

Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id('id_cotizacion');
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->foreign("cliente_id")->references("id_cliente")->on("cliente")->onDelete("set null");
            $table->unsignedBigInteger("moto_id")->nullable();
            $table->foreign("moto_id")->references("id_moto")->on("motos")->onDelete("set null");
            $table->decimal('precio_total', 10, 2)->nullable();
            $table->string('estado')->default('pendiente')->nullable();
            $table->timestamps();
        });

Schema::create('cotizaciones_accesorio', function (Blueprint $table) {
            $table->id('id_cotizacion_accesorio');
            $table->unsignedBigInteger("cotizacion_id")->nullable();
            $table->foreign("cotizacion_id")->references("id_cotizacion")->on("cotizaciones")->onDelete("set null");
            $table->unsignedBigInteger("accesorio_id")->nullable();
            $table->foreign("accesorio_id")->references("id_accesorio")->on("accesorios")->onDelete("set null");
            $table->timestamps();
        });

Schema::create('cotizacion_repuesto', function (Blueprint $table) {
            $table->id('id_cotizacion_repuesto');
            $table->unsignedBigInteger("cotizacion_id")->nullable();
            $table->foreign("cotizacion_id")->references("id_cotizacion")->on("cotizaciones")->onDelete("set null");
            $table->unsignedBigInteger("repuesto_id")->nullable();
            $table->foreign("repuesto_id")->references("id_repuesto")->on("repuestos")->onDelete("set null");
            $table->timestamps();
        });

Schema::create('financiamientos', function (Blueprint $table) {
            $table->id('id_financiamiento');
            $table->unsignedBigInteger("cotizacion_id")->nullable();
            $table->foreign("cotizacion_id")->references("id_cotizacion")->on("cotizaciones")->onDelete("set null");
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->foreign("cliente_id")->references("id_cliente")->on("cliente")->onDelete("set null");
            $table->decimal('monto_financiado', 10, 2)->nullable();
            $table->integer('plazo')->nullable(); // En meses
            $table->decimal('interes', 5, 2)->nullable(); // En porcentaje
            $table->decimal('cuota_mensual', 10, 2)->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('estado')->default('activo')->nullable(); // Activo, pagado, cancelado
            $table->string('situacion_laboral')->nullable(); // Dependiente o Independiente
            $table->decimal('cuota_inicial', 10, 2)->nullable();
            $table->decimal('ingreso_mensual', 10, 2)->nullable();
            $table->timestamps();
        });

Schema::create('resenas', function (Blueprint $table) {
            $table->id('id_resena');
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->foreign("cliente_id")->references("id_cliente")->on("cliente")->onDelete("set null");
            $table->unsignedBigInteger("moto_id")->nullable();
            $table->foreign("moto_id")->references("id_moto")->on("motos")->onDelete("set null");
            $table->integer('calificacion')->nullable(); // 1 a 5
            $table->text('comentario')->nullable();
            $table->timestamps();
        });

