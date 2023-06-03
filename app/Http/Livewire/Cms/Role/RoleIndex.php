<?php

namespace App\Http\Livewire\Cms\Role;


use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Http\Livewire\Cms\Contract\PageAction;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;


class RoleIndex extends LivewireDatatable
{
    use PageAction;
    public $model = Role::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID petugas')->sortable()->searchable(),
            Column::name('name')->searchable()
            ->editable(),
            Column::callback(['id', 'name'], function ($id, $name) {
                return view('components.cms.action', ['id' => $id, 'name' => $name]);
            })->unsortable()->label('action')
        ];
    }

    /**
     * Defines the base route name for current datatable component.
     *
     * @return string
     */
    public function getBaseRouteName(): string
    {
        return 'cms.roles.';
    }

}
