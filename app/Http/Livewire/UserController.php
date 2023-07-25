<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


class UserController extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';//poder utilizar la paginación en laravel 8

    public $pagination = 10, $action = 1, $edit = 1, $component = 'usuario';
    public $roles;
    public $name, $user, $password, $email, $status = 'Elegir', $role = 'Elegir', $selected_id;


    public function mount(){
        $this->roles = Role::active()->orderBy('name')->get();
        $this->url   = Route::current()->getName();

    }

    public function render()
    {
        $users = User::admin();

        try {
            return view('livewire.user.component',[
                'users'  => $users->paginate($this->pagination),
            ]);
        } catch (\Exception $e) {
           return $e;
        }
    }

    //permite la búsqueda cuando se navega entre el paginado
    public function updatingSearch(){
        $this->gotoPage(1);
    }

    public function handleAction($action)
    {
        $this->handleReset($action);
    }

    // limpiar
    public function handleReset($action)
    {
        $this->name             = '';
        $this->user             = '';
        $this->password         = '';
        $this->email            = '';
        $this->count            = 1;
        $this->action           = $action;
        $this->edit             = 1;
        $this->selected_id      = null;
        $this->role             = 'Elegir';
        $this->status           = 'Elegir';
    }

    public function StoreOrUpdate($action)
    {
        $this->validate([
                'name'                  => 'bail|required|min:3|max:20|string',
                'email'                 => 'bail|required|email|string|min:3|max:255|unique:users,email,'.$this->selected_id,
                // 'email'                 => ['bail','required','string','email','max:60', 'min:4', Rule::unique('users')->ignore($this->selected_id)->whereNull('deleted_at')],
                'password'              => 'bail|required|min:4',
                'role'                  => 'bail|required|not_in:Elegir',
                'status'                => 'bail|required|not_in:Elegir',
            ],
            [
                'email.unique'          => 'El email ya se encuentra registrado',
            ]
        );

        $find = [
            'id'  => $this->selected_id,
        ];
        $data = [
            'name'              => $this->name,
            'email'             => $this->email,
            'role_id'           => $this->role,
            'status'            => $this->status,
        ];

        if ($this->selected_id) {
            $updateOrCreate = 'actualizado';
        }else{
            $updateOrCreate = 'creado';
            $data['password'] = Hash::make($this->password);
        }

        $user = User::updateOrCreate($find, $data);

        $this->emit('msgok','El usuario '.$user->name.', ha sido '.$updateOrCreate);
        $this->emit('modalsClosed','usuario-component');

        // limpiar inpunts
        $this->handleReset($action);
    }

    public function edit(User $user)
    {
    	$this->user             = $user;
    	$this->selected_id      = $user->id;
    	$this->name             = $user->name;
    	$this->email            = $user->email;
    	$this->password         = $user->password;
    	$this->role             = $user->role_id;
    	$this->status           = $user->status;
    	$this->edit             = 2;
    }

    protected $listeners = ['handleDelete','handlePassword'];


    public function handleDelete(User $user, $action ){
        $user->delete();
        $this->emit('msgok','Usuario '.$user->name.', ha sido eliminado');
        $this->handleReset($action);
    }

    public function handlePassword(User $user, $action, $password){
        $user->update([
            'password' => Hash::make($password)
        ]);
        $this->emit('msgok','Usuario '.$user->name.', se la ha cambio la contraseña');
        $this->handleReset($action);
        $this->emit('modalsClosed','usuario-component');
    }
}
