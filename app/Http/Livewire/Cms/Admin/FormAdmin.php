<?php
namespace App\Http\Livewire\Cms\Admin;

use App\Models\Admin;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Livewire\Cms\Contract\PageAction;
use Illuminate\Auth\Access\AuthorizationException;

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

    /**
     * Confirm Admin authorization to access the datatable resources.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \ErrorException
     */
    protected function confirmAuthorization(): void
    {
        $permission = 'cms.' . $this->admin->getTable() . '.' . $this->operation;
        if (!Auth::guard('cms')->user()->can($permission)) {
            throw new AuthorizationException();
        }
    }

    public function mount(){
        $this->confirmAuthorization();
        $this->roles = Role::pluck('name','name');

        // dd($this->operation );
        if ($this->operation != 'create') {
            $this->email = $this->admin->email;
            $this->role = $this->admin->getRoleNames()[0]??'';
        }
    }

    public function backToIndex()
    {
        return redirect(route('cms.admin.index'))->with('alertType','success')
        ->with('alertMessage','New competition successfully created.');
    }

    function getAlertMessage()
    {
        return $this->operation == 'create' ? 'New admin created successfully.'
        : "Admin #".$this->admin->id." updated successfully.";
    }

    public function save()
    {
        if (($this->operation !== 'create') && ($this->operation !== 'update')) {
            return redirect()->to(route('cms.admin.index'));
        }

        $this->confirmAuthorization();

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
       if ($this->operation === 'create') {
            $this->admin->assignRole($this->role);
       }else{
        $this->admin->syncRoles($this->role);
       }


       return redirect(route('cms.admin.index'))
       ->with('alertType','success')
       ->with('alertMessage',$this->getAlertMessage());
    }
}

?>
