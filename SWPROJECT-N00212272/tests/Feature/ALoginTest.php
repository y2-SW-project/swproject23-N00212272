<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ALoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testAdminCanLogin(): void
    {
        $role_admin = Role::where('name', 'admin')->first();
        
            $admin = new User();
          $admin->fName = 'greg';
          $admin->lName = 'Agatowski';
          $admin->email = 'greg.agatowski@gmail.com';
          $admin->password = Hash::make('password');
          $admin->address1 = '24a rossana close';
          $admin->address2 = 'ashford';
          $admin->address3 = 'wicklow';
          $admin->save();

          $admin->roles()->attach($role_admin);
        
            $response = $this->post('/login', [
                'email' => 'greg.agatowski@gmail.com',
                'password' => 'password',
            ]);
        
            $response->assertRedirect('/home');
            $this->assertTrue(Auth::check());
            $this->assertTrue(Auth::user()->hasRole('admin'));
        }
        
    }

