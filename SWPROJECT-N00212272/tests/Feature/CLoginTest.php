<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCustomerCanLogin(): void
    {
        $role_customer = Role::where('name', 'customer')->first();
        
            $customer = new User();
          $customer->fName = 'dan';
          $customer->lName = 'malloy';
          $customer->email = 'dan.malloy@gmail.com';
          $customer->password = Hash::make('password');
          $customer->address1 = '45 dalkey house';
          $customer->address2 = 'dalkey';
          $customer->address3 = 'dublin';
          $customer->save();

          $customer->roles()->attach($role_customer);
        
            $response = $this->post('/login', [
                'email' => 'dan.malloy@gmail.com',
                'password' => 'password',
            ]);
        
            $response->assertRedirect('/home');
            $this->assertTrue(Auth::check());
            $this->assertTrue(Auth::user()->hasRole('customer'));
        }
        
    }

