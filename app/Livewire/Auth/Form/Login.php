<?php

namespace App\Livewire\Auth\Form;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $credentials = $this->validate();

        Auth::guard('guardian')->attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ]);

        if (!Auth::guard('guardian')->check()) {
            throw ValidationException::withMessages([
                'password' => 'The provided credentials do not match our records.',
            ]);
        } 

        return $this->redirectIntended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.form.login');
    }

    
}
