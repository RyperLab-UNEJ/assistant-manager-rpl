<?php
namespace App\Http\Livewire\Cms\Role;


use App\Http\Livewire\Cms\Contract\PageAction;
use App\Models\Permission;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class FormRole extends Component
{
    use PageAction;
    public $operation;

    public Role $role;

    public $guards;
    public $permissionOptions = [];
    public $permissions = [];


    // POST
    protected $rules = [
       'role.name'=>'required|string|max:255',
       'role.guard_name'=>'required',
    ];

    public function mount(){
        foreach (config('auth.guards') as $key => $value) {
            $this->guards[$key] = $key;
        }
        $collection = Permission::all()->sortBy('name');

        foreach ($collection as $key => $value) {
           if (array_key_exists(explode('.',$value->name)[1],$this->permissionOptions)) {
                array_push($this->permissionOptions[explode('.',$value->name)[1]],$value->name);
           }else{
                $this->permissionOptions[explode('.',$value->name)[1]] = [$value->name];
           }

        }

        if ($this->operation != 'create') {
            $this->permissions = $this->role->permissions->pluck('name');
        }
        // dd($this->permissionOptions);

    }

    public function backToIndex()
    {
        return redirect(route('cms.roles.index'));
    }

    public function save()
    {

       $this->validate();

       $this->role->save();
       $this->role->syncPermissions($this->permissions);


       session()->flash('success', 'New competition successfully created.');
       return redirect(route('cms.roles.index'));
    }
}

?>
