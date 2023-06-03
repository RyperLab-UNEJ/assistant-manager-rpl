<?php

namespace App\Http\Livewire\Cms\Admin;

use App\Models\Admin;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Livewire\Cms\Admin\FormAdmin;

class CreateAdmin extends FormAdmin
{

     /**
     * Handle the `mount` lifecycle event.
     */
    public function mount(): void
    {
        $this->admin = new Admin();
        $this->operation = 'create';
        parent::mount();
    }



    public function render()
    {
       return view('livewire.cms.admin.create-admin')
        ->extends('layouts.cms_layout')
        ->section('main-content');
    }
}
