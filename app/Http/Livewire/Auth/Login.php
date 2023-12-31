<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Login extends Component
{

    public $password;
    public $email;
    public $keeplogin;
    public $passwordVisible = false;
    public $passwordConfirmationVisible = false;

    protected $rules = [
        'password' => 'required',
        'email' => 'required|email:dns|exists:users,email'
    ];

    public function login()
    {
        $data_credential = $this->validate();
        if (\Auth::attempt($data_credential, $this->keeplogin)) {
            if(Auth::user()->role =='pengguna'){
                $this->redirectRoute('dokumentasi_api');
            }else{
                $this->redirectRoute('home');
            }
        }else{
            $this->reset();
            $this->dispatchBrowserEvent('show-message', [
                'type' => 'error',
                'message' => 'Login Gagal Pastikan email dan password yang anda inputkan benar.'
            ]);
        }
    }

    public function togglePasswordVisibility()
    {
        $this->passwordVisible = !$this->passwordVisible;
    }

    public function togglePasswordConfirmationVisibility()
    {
        $this->passwordConfirmationVisible = !$this->passwordConfirmationVisible;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.plain');
    }
}
