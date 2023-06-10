<?php

namespace App\Http\Livewire\Cms\Admin;

use Livewire\Component;
use App\Http\Livewire\Cms\Admin\FormAdmin;
use App\Models\Admin;

class EditAdmin extends FormAdmin
{
     /**
     * Handle the `mount` lifecycle event.
     */
    public function mount(): void
    {

        $this->operation = 'update';
        parent::mount();
    }

    public function render()
    {
        return view('livewire.cms.admin.edit-admin')
        ->extends('layouts.cms_layout')
        ->section('main-content');
    }
}
