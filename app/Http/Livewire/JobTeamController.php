<?php

namespace App\Http\Livewire;

use App\Models\JobTeam;
use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class JobTeamController extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';//poder utilizar la paginación en laravel 8

    public $pagination = 10, $search, $action = 1, $edit = 1, $component = 'Colaboradores';
    public $roles;
    public $name, $user, $position, $profile, $phone, $image, $status = 'Elegir', $selected_id;


    public function mount(){
        $this->url   = Route::current()->getName();

    }

    public function render()
    {
        try {
            if ($this->search) {
                $jobTeams = JobTeam::Search($this->search);
            }else{
                $jobTeams = JobTeam::orderBy('id','desc');
            }
            return view('livewire.jobTeam.component',[
                'jobTeams'  => $jobTeams->paginate($this->pagination),
            ]);
        } catch (\Exception $e) {
           $this->emit('msg-error', $e->getMessage());
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
        $this->position         = '';
        $this->profile          = '';
        $this->phone            = '';
        $this->count            = 1;
        $this->action           = $action;
        $this->edit             = 1;
        $this->image            = null;
        $this->selected_id      = null;
        $this->status           = 'Elegir';
    }

    public function StoreOrUpdate($action)
    {
        $this->validate([               
                'name'                => 'bail|required|string|min:3|max:255',
                'phone'               => 'bail|required|numeric|digits_between:5,10|unique:job_teams,phone,'.$this->selected_id,
                'position'            => 'bail|required|string|min:3|max:255',
                'profile'             => 'bail|required|string|min:3|max:255',
                'image'               => 'bail|nullable|image|max:4112',
                'status'              => 'bail|required|string|min:3|max:255',
            ],
            [
                'phone.unique'          => 'El telefono ya se encuentra registrado',
            ]
        );
        try {


            $find = [
                'id'  => $this->selected_id,
            ];
            $data = [
                'name'              => $this->name,
                'position'          => $this->position,
                'profile'           => $this->profile,
                'phone'             => $this->phone,
                'status'            => $this->status,
            ];

            if ($this->selected_id) {
                $updateOrCreate = 'actualizado';
            }else{
                $updateOrCreate = 'creado';
            }

            $jobTeam = JobTeam::updateOrCreate($find, $data);

            if ($this->image) {
                $image      = $this->image;
                $fileName   = time() . '.' . $image->getClientOriginalExtension();
                $moved      = \Image::make($image)->save('image/jobTeams/'.$fileName);
                if ($moved) {
                    $jobTeam->image = $fileName;
                    $jobTeam->save();
                }
            }

            $this->emit('msgok','El usuario '.$jobTeam->name.', ha sido '.$updateOrCreate);
            $this->emit('modalsClosed', $this->component.'-component');

        } catch (\Exception $e) {
            $this->emit('msg-error', $e->getMessage());
        }

        $this->handleReset($action);
    }

    public function edit(JobTeam $user)
    {
    	$this->user             = $user;
    	$this->selected_id      = $user->id;
    	$this->name             = $user->name;
    	$this->position         = $user->position;
    	$this->profile          = $user->profile;
    	$this->phone            = $user->phone;
    	$this->status           = $user->status;
    	$this->edit             = 2;
    }

    protected $listeners = ['handleDelete'];


    public function handleDelete(JobTeam $user, $action ){
        $user->delete();
        $this->emit('msgok','Usuario '.$user->name.', ha sido eliminado');
        $this->handleReset($action);
    }
}
