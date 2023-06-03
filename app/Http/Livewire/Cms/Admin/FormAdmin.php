<?php
namespace App\Http\Livewire\Cms\Admin;

use App\Http\Livewire\Cms\Contract\PageAction;
use App\Models\Admin;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class FormAdmin extends Component
{
    use PageAction;
    // define eloquent model to use direct data binding
    public Admin $admin;
    public $password;
    public $confirmPassword;
    public $isVisible = false;
    public $role;
    public $email;
    public $roles;

    public $operation;

    // POST
    protected $rules = [
       'admin.name'=>'required|string|max:255',
       'admin.address'=>'required',
       'email'=>'required|email',
       'role'=>'required'
    ];

    public function mount(){
        $this->roles = Role::pluck('name','name');

        // dd($this->operation );
        if ($this->operation != 'create') {
            $this->email = $this->admin->email;
            $this->role = $this->admin->getRoleNames()[0];
        }
    }

    public function backToIndex()
    {
        return redirect(route('cms.admin.index'));
    }

    public function save()
    {

       $this->validate();
       if ($this->operation === 'create') {
            if ($this->password != $this->confirmPassword) {
                session()->flash('alertType', 'danger');
                session()->flash('alertMessage', 'Password not match');
                return redirect()->back();
            }
            $validatedData = $this->validate([
                'admin.name'=>'required|string|max:255',
                'admin.address'=>'required',
                'email'=>'required|email|unique:admins,email',
                'password'=>'required|string|min:8|alpha_num',
                'confirmPassword'=>'required|string|min:8|alpha_num',
                'role'=>'required'
            ]);
            $this->admin->password = Hash::make($this->password);
       }


       $this->admin->email = $this->email;
       $this->admin->save();
       $this->admin->assignRole($this->role);


       session()->flash('success', 'New competition successfully created.');
       return redirect(route('cms.admin.index'));
    }
}

?>
