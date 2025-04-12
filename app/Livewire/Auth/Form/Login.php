<?php

namespace App\Livewire\Auth\Form;

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

        dd($this->email, $this->password);

        return redirect()->intended('/dashboard');

    }

    public function render()
    {
        return view('livewire.auth.form.login');
    }

    
}
