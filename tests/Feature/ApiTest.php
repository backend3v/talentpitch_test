<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_create_user(): void
    {
        
        $response = $this->post('/users', ['name' => 'Sally','email' => 'sally@mail.com']);
        $obj = json_decode($response->getContent());
        $path = '/users/'.$obj->id;
        $response_patch = $this->patch($path, ['email' => 'sally234@mail.com']);
        $response_delete = $this->delete($path);
        $response->assertStatus(201);
        $response_patch->assertStatus(200);
        $response_patch->assertJson([
            'email' => 'sally234@mail.com',
        ]);
        $response_delete->assertStatus(200);
    }
    public function test_create_program(): void
    {
        
        $response = $this->post('/programs', ['name' => 'TestFest']);
        $obj = json_decode($response->getContent());
        $path = '/programs/'.$obj->id;
        $response_patch = $this->patch($path, ['location' => 'Bogota']);
        $response_delete = $this->delete($path);
        $response->assertStatus(201);
        $response_patch->assertStatus(200);
        $response_patch->assertJson([
            'location' => 'Bogota',
        ]);
        $response_delete->assertStatus(200);
    }
    public function test_create_challenges(): void
    {
        
        $response = $this->post('/challenges', ['title' => 'Test','difficulty' => 'low']);
        $obj = json_decode($response->getContent());
        $path = '/challenges/'.$obj->id;
        $response_patch = $this->patch($path, ['difficulty' => 'medium']);
        $response_delete = $this->delete($path);
        $response->assertStatus(201);
        $response_patch->assertStatus(200);
        $response_patch->assertJson([
            'difficulty' => 'medium',
        ]);
        $response_delete->assertStatus(200);
    }
    public function test_create_companies(): void
    {
        
        $response = $this->post('/companies', ['name' => 'SallySofware','industry' => 'tech']);
        $obj = json_decode($response->getContent());
        $path = '/companies/'.$obj->id;
        $response_patch = $this->patch($path, ['industry' => 'software']);
        $response_delete = $this->delete($path);
        $response->assertStatus(201);
        $response_patch->assertStatus(200);
        $response_patch->assertJson([
            'industry' => 'software'
        ]);
        $response_delete->assertStatus(200);
    }
    public function test_create_partiipants(): void
    {
        $response_company = $this->post('/companies', ['name' => 'SallySofware','industry' => 'tech']);
        $company = json_decode($response_company->getContent());
        $id_company = $company->id;
        $response_program = $this->post('/programs', ['name' => 'TestFest','location' => 'Virtual']);
        $program = json_decode($response_program->getContent());
        $id_program = $program->id;
        $response = $this->post('/programs/participants', ['participant' => $id_company,'type' => 'company','program' => $id_program]);
        $obj = json_decode($response->getContent());
        $path = '/programs/participants/'.$obj->id;
        $path_company = '/companies/'.$id_company;
        $path_program = '/programs/'.$id_program;
        $response_delete = $this->delete($path);
        $response_delete_company = $this->delete($path_company);
        $response_delete_program = $this->delete($path_program);
        $response->assertStatus(201);
        $response_delete_company->assertStatus(200);
        $response_delete_program->assertStatus(200);
        $response_delete->assertStatus(200);
    }
    // public function test_create_duplicated_user(): void
    // {
    //     $response = $this->post('/users', ['name' => 'Sally','email' => 'sally@mail.com']);
    //     $response->assertStatus(400);
    // }
    // public function test_create_bad_user(): void
    // {
    //     $response = $this->post('/users', ['email' => 'sally@mail.com']);

    //     $response->assertStatus(400);
    // }
}
