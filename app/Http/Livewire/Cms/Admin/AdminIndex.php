<?php

namespace App\Http\Livewire\Cms\Admin;


use App\Models\Admin;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Cms\Contract\PageAction;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Illuminate\Auth\Access\AuthorizationException;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AdminIndex extends LivewireDatatable
{
    use PageAction;
    public $hideable = 'select';
    public $model = Admin::class;
    public $roles;
    public $operation = 'viewAny';


    public function __construct()
    {
        $this->roles = Role::plucK('name');
        $this->confirmAuthorization();

    }

    public function Builder(){
        return Admin::query()
        ->leftJoin('model_has_roles', function ($pivot) {
            $pivot->on('admins.id', 'model_has_roles.model_id')
                ->where('model_has_roles.model_type', 'App\Models\Admin')
                ->leftJoin('roles', function ($role) {
                    $role->on('model_has_roles.role_id', 'roles.id');
                });
         });
    }

    public function columns()
    {
        return [
            NumberColumn::name('admins.id')->label('ID petugas')->sortable()->searchable(),
            Column::name('name')->searchable()->editable(),
            Column::name('address')->searchable()->editable(),
            Column::name('email')->searchable()->editable(),
            Column::name('roles.name')->label('jabatan')->filterable($this->roles),
            Column::callback(['id', 'name'], function ($id, $name) {
                return view('components.cms.action', ['id' => $id, 'name' => $name,'permissions'=>$this->permission()]);
            })->unsortable()->label('action')
        ];
    }

    public function permission()
    {
        // dd($this->getBasePermission((new Admin())));
        return $this->getBasePermission((new Admin()));
    }

    /**
     * Defines the base route name for current datatable component.
     *
     * @return string
     */
    public function getBaseRouteName(): string
    {
        return 'cms.admin.';
    }

    /**
     * Confirm Admin authorization to access the datatable resources.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \ErrorException
     */
    protected function confirmAuthorization(): void
    {
        $permission = 'cms.' . (new Admin())->getTable() . '.' . $this->operation;

        if (!Auth::guard('cms')->user()->can($permission)) {
            throw new AuthorizationException();
        }
    }


}
