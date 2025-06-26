<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class AuthModal extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $remember = false;

    // Properti untuk beralih antara mode login dan register
    public $isRegisterMode = false;

    public function render()
    {
        return view('livewire.auth-modal');
    }

    /**
     * Beralih ke mode register.
     */
    public function switchToRegister()
    {
        $this->resetValidation();
        $this->isRegisterMode = true;
    }

    /**
     * Beralih ke mode login.
     */
    public function switchToLogin()
    {
        $this->resetValidation();
        $this->isRegisterMode = false;
    }

    /**
     * Menangani proses registrasi pengguna.
     */
    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::guard('web')->login($user);

        session()->regenerate();

        // Tutup modal dan redirect
        $this->dispatch('close-modal', 'authModal');
        return $this->redirect(route('home'), navigate: true);
    }

    /**
     * Menangani proses login pengguna.
     */
    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        session()->regenerate();

        $this->dispatch('close-modal', 'authModal');
        return $this->redirect(route('home'), navigate: true);
    }
}
