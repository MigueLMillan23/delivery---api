<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Producto;
use Laravel\Sanctum\Sanctum;

class ProductoApiTest extends TestCase
{
    public function test_index_requires_auth()
    {
        $res = $this->getJson('/api/productos');
        $res->assertStatus(401);
    }

    public function test_crud_producto()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        // create
        $payload = ['nombre'=>'TestProd','descripcion'=>'x','precio'=>10,'stock'=>5];
        $this->postJson('/api/productos', $payload)->assertStatus(201);

        // list
        $this->getJson('/api/productos')->assertStatus(200)->assertJsonFragment(['nombre'=>'TestProd']);

        $producto = Producto::where('nombre','TestProd')->first();
        $this->getJson("/api/productos/{$producto->id}")->assertStatus(200);

        // update
        $this->putJson("/api/productos/{$producto->id}", ['nombre'=>'TestProd2','precio'=>20,'stock'=>1])
            ->assertStatus(200)->assertJsonFragment(['nombre'=>'TestProd2']);

        // delete
        $this->deleteJson("/api/productos/{$producto->id}")->assertStatus(200);
    }
}
