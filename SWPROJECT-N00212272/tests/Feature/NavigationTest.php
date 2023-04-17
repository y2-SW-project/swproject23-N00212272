<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NavigationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_admin_to_showPage(): void
    {   
        //if you do not provide a login or a customer login it will comeback with an error
        $response = $this->post('/login', [
            'email' => 'kacper.agatowski75@gmail.com',
            'password' => 'password',
        ]);
    
        $response->assertRedirect('/home');
        $response = $this->get('/admin/products/12');

        $response->assertStatus(200);
    }
    public function test_customer_to_sellPage(): void
    {   
        //if you do not provide a login or a customer login it will comeback with an error
        $response = $this->post('/login', [
            'email' => 'n00212272@iadt.ie',
            'password' => 'password',
        ]);
    
        $response->assertRedirect('/home');
        $response = $this->get('/customer/products/create');

        $response->assertStatus(200);
    }

    public function test_customer_to_buy(): void
    {   
        //if you do not provide a login or a customer login it will comeback with an error
        $response = $this->post('/login', [
            'email' => 'n00212272@iadt.ie',
            'password' => 'password',
        ]);
    
        $response->assertRedirect('/home');
        $response = $this->get('/customer/products/3/buy');

        $response->assertStatus(200);
    }
}
