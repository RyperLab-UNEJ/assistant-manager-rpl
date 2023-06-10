<?php

namespace App\Http\Livewire\Cms\Admin;

use Livewire\Component;
use App\Http\Livewire\Cms\Admin\FormAdmin;

class ShowAdmin extends FormAdmin
{
    /**
     * Handle the `mount` lifecycle event.
     */
    public function mount(): void
    {

        $this->operation = 'view';
        parent::mount();
    }

    public function render()
    {
        return view('livewire.cms.admin.show-admin')
        ->extends('layouts.cms_layout')
        ->section('main-content');;
    }
}
