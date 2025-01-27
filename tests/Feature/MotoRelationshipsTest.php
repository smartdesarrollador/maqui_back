<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Moto;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\TipoMoto;
use App\Models\Accesorio;
use App\Models\Repuesto;
use App\Models\Resena;
use App\Models\Cotizacion;
use App\Models\ClienteModel;

class MotoRelationshipsTest extends TestCase
{
    /**
     * Test relación Moto -> Modelo -> Marca
     */
    public function test_moto_belongs_to_modelo_and_marca()
    {
        $moto = Moto::has('modelo.marca')->first();
        
        $this->assertNotNull($moto, 'No se encontró ninguna moto con modelo y marca.');
        $this->assertInstanceOf(Modelo::class, $moto->modelo);
        $this->assertInstanceOf(Marca::class, $moto->modelo->marca);
    }

    /**
     * Test relación Moto -> TipoMoto
     */
    public function test_moto_belongs_to_tipo_moto()
    {
        $moto = Moto::has('tipoMoto')->first();
        
        $this->assertNotNull($moto, 'No se encontró ninguna moto con tipo.');
        $this->assertInstanceOf(TipoMoto::class, $moto->tipoMoto);
    }

    /**
     * Test relación Moto <-> Accesorios (muchos a muchos)
     */
    public function test_moto_has_many_accesorios()
    {
        $moto = Moto::has('accesorios')->first();
        
        $this->assertNotNull($moto, 'No se encontró ninguna moto con accesorios.');
        $this->assertInstanceOf(Accesorio::class, $moto->accesorios->first());
        
        // Probar la relación inversa
        $accesorio = Accesorio::has('motos')->first();
        $this->assertNotNull($accesorio, 'No se encontró ningún accesorio con motos.');
        $this->assertInstanceOf(Moto::class, $accesorio->motos->first());
    }

    /**
     * Test relación Moto <-> Repuestos (muchos a muchos)
     */
    public function test_moto_has_many_repuestos()
    {
        $moto = Moto::has('repuestos')->first();
        
        $this->assertNotNull($moto, 'No se encontró ninguna moto con repuestos.');
        $this->assertInstanceOf(Repuesto::class, $moto->repuestos->first());
        
        // Probar la relación inversa
        $repuesto = Repuesto::has('motos')->first();
        $this->assertNotNull($repuesto, 'No se encontró ningún repuesto con motos.');
        $this->assertInstanceOf(Moto::class, $repuesto->motos->first());
    }

    /**
     * Test relación Moto -> Reseñas
     */
    public function test_moto_has_many_resenas()
    {
        $moto = Moto::has('resenas')->first();
        
        $this->assertNotNull($moto, 'No se encontró ninguna moto con reseñas.');
        $this->assertInstanceOf(Resena::class, $moto->resenas->first());
        
        // Verificar que la reseña pertenece a un cliente
        $resena = $moto->resenas->first();
        $this->assertInstanceOf(ClienteModel::class, $resena->cliente);
    }

    /**
     * Test relación Moto -> Cotizaciones
     */
    public function test_moto_has_many_cotizaciones()
    {
        $moto = Moto::has('cotizaciones')->first();
        
        $this->assertNotNull($moto, 'No se encontró ninguna moto con cotizaciones.');
        $this->assertInstanceOf(Cotizacion::class, $moto->cotizaciones->first());
        
        // Verificar que la cotización pertenece a un cliente
        $cotizacion = $moto->cotizaciones->first();
        $this->assertInstanceOf(ClienteModel::class, $cotizacion->cliente);
    }

    /**
     * Test relación Marca -> Motos (a través de modelos)
     */
    public function test_marca_has_many_motos_through_modelos()
    {
        $marca = Marca::has('motos')->first();
        
        $this->assertNotNull($marca, 'No se encontró ninguna marca con motos.');
        $this->assertInstanceOf(Moto::class, $marca->motos->first());
        
        // Verificar la relación a través de modelos
        $this->assertInstanceOf(Modelo::class, $marca->modelos->first());
        $this->assertInstanceOf(Moto::class, $marca->modelos->first()->motos->first());
    }

    /**
     * Test estructura completa de relaciones
     */
    public function test_full_moto_relationship_structure()
    {
        $moto = Moto::with([
            'modelo.marca',
            'tipoMoto',
            'accesorios.tipoAccesorio',
            'repuestos.tipoRepuesto',
            'resenas.cliente',
            'cotizaciones.cliente'
        ])->first();

        $this->assertNotNull($moto, 'No se encontró ninguna moto.');

        // Verificar estructura completa
        $this->assertArrayHasKey('modelo', $moto->toArray());
        $this->assertArrayHasKey('marca', $moto->modelo->toArray());
        $this->assertArrayHasKey('tipoMoto', $moto->toArray());
        $this->assertArrayHasKey('accesorios', $moto->toArray());
        $this->assertArrayHasKey('repuestos', $moto->toArray());
        $this->assertArrayHasKey('resenas', $moto->toArray());
        $this->assertArrayHasKey('cotizaciones', $moto->toArray());
    }
} 