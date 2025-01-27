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
use Illuminate\Support\Facades\Log;

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

        // Convertir a array para debug
        $motoArray = $moto->toArray();

        // Verificar estructura completa
        $this->assertArrayHasKey('modelo', $motoArray);
        $this->assertArrayHasKey('marca', $moto->modelo->toArray());
        $this->assertArrayHasKey('tipo_moto', $motoArray, 'La relación tipo_moto no existe');
        $this->assertArrayHasKey('accesorios', $motoArray);
        $this->assertArrayHasKey('repuestos', $motoArray);
        $this->assertArrayHasKey('resenas', $motoArray);
        $this->assertArrayHasKey('cotizaciones', $motoArray);

        // Verificar que las relaciones tienen la estructura correcta
        $this->assertIsArray($motoArray['tipo_moto']);
        $this->assertIsArray($motoArray['accesorios']);
        $this->assertIsArray($motoArray['repuestos']);
        $this->assertIsArray($motoArray['resenas']);
        $this->assertIsArray($motoArray['cotizaciones']);
    }

    /**
     * Test relaciones del Cliente
     */
    public function test_cliente_relationships()
    {
        $cliente = ClienteModel::has('resenas')->first();
        
        $this->assertNotNull($cliente, 'No se encontró ningún cliente con reseñas.');
        $this->assertInstanceOf(Resena::class, $cliente->resenas->first());
        
        // Probar relación con cotizaciones
        $cliente = ClienteModel::has('cotizaciones')->first();
        $this->assertNotNull($cliente, 'No se encontró ningún cliente con cotizaciones.');
        $this->assertInstanceOf(Cotizacion::class, $cliente->cotizaciones->first());
        
        // Probar relación con motos reseñadas
        $cliente = ClienteModel::has('motosResenadas')->first();
        $this->assertNotNull($cliente, 'No se encontró ningún cliente con motos reseñadas.');
        $this->assertInstanceOf(Moto::class, $cliente->motosResenadas->first());
        
        // Probar relación con motos cotizadas
        $cliente = ClienteModel::has('motosCotizadas')->first();
        $this->assertNotNull($cliente, 'No se encontró ningún cliente con motos cotizadas.');
        $this->assertInstanceOf(Moto::class, $cliente->motosCotizadas->first());
    }

    /**
     * Test estructura completa de relaciones del Cliente
     */
    public function test_full_cliente_relationship_structure()
    {
        $cliente = ClienteModel::with([
            'resenas.moto',
            'cotizaciones.moto',
            'motosResenadas',
            'motosCotizadas'
        ])->first();

        $this->assertNotNull($cliente, 'No se encontró ningún cliente.');

        $clienteArray = $cliente->toArray();

        // Verificar estructura completa
        $this->assertArrayHasKey('resenas', $clienteArray);
        $this->assertArrayHasKey('cotizaciones', $clienteArray);
        $this->assertArrayHasKey('motos_resenadas', $clienteArray);
        $this->assertArrayHasKey('motos_cotizadas', $clienteArray);

        // Verificar que las relaciones tienen la estructura correcta
        $this->assertIsArray($clienteArray['resenas']);
        $this->assertIsArray($clienteArray['cotizaciones']);
        $this->assertIsArray($clienteArray['motos_resenadas']);
        $this->assertIsArray($clienteArray['motos_cotizadas']);

        // Verificar relaciones anidadas
        if (!empty($clienteArray['resenas'])) {
            $this->assertArrayHasKey('moto', $clienteArray['resenas'][0]);
        }
        if (!empty($clienteArray['cotizaciones'])) {
            $this->assertArrayHasKey('moto', $clienteArray['cotizaciones'][0]);
        }
    }

    /**
     * Test relaciones inversas con Cliente
     */
    public function test_inverse_cliente_relationships()
    {
        // Probar relación inversa desde Reseña
        $resena = Resena::with('cliente')->first();
        $this->assertNotNull($resena, 'No se encontró ninguna reseña.');
        $this->assertInstanceOf(ClienteModel::class, $resena->cliente);

        // Probar relación inversa desde Cotización
        $cotizacion = Cotizacion::with('cliente')->first();
        $this->assertNotNull($cotizacion, 'No se encontró ninguna cotización.');
        $this->assertInstanceOf(ClienteModel::class, $cotizacion->cliente);
    }
} 