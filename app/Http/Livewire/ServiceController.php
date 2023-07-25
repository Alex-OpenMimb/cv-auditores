<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Route;

class ServiceController extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';//poder utilizar la paginación en laravel 8

    public $pagination = 10, $search, $action = 1, $edit = 1, $component = 'servicio';
    public $name, $service, $description, $image, $imageUpdate, $status = 'Elegir', $selected_id;

    public function mount(){
        $this->url = Route::current()->getName();
    }

    public function render()
    {

        try {
            if ($this->search) {
                $services = Service::Search($this->search);
            }else{
                $services = Service::orderBy('id','desc');
            }
            return view('livewire.service.component',[
                'services'  => $services->paginate($this->pagination),
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
        $this->service          = '';
        $this->description      = '';
        $this->count            = 1;
        $this->action           = $action;
        $this->edit             = 1;
        $this->selected_id      = null;
        $this->image            = null;
        $this->status           = 'Elegir';
        $this->emit('clearCkEditorService');
        $this->emit('initializeCkEditorService');
    }

    public function StoreOrUpdate($action)
    {
        $this->validate([
                'description'           => 'bail|required|min:3|max:2000|string',
                'name'                  => 'bail|required|string|min:3|max:255|unique:services,name,'.$this->selected_id,
                'image'                 => 'bail|nullable|image|max:4112',
                'status'                => 'bail|required|not_in:Elegir',
            ],
            [
                'name.unique'          => 'El nombre ya se encuentra registrado',
            ]
        );

        $find = [
            'id'  => $this->selected_id,
        ];
        $data = [
            'name'              => $this->name,
            'description'       => $this->description,
            'slug'              => strtr($this->name, " ", "-"),
            'status'            => $this->status,
        ];

        if ($this->selected_id) {
            $updateOrCreate = 'actualizado';
        }else{
            $updateOrCreate = 'creado';
        }

        $service = Service::updateOrCreate($find, $data);

        if ($this->image) {
            $image      = $this->image;
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $moved      = \Image::make($image)->save('image/service/'.$fileName);
            if ($moved) {
                $service->image = $fileName;
                $service->save();
            }
        }

        $this->emit('msgok','El servicio '.$service->name.', ha sido '.$updateOrCreate);
        $this->emit('modalsClosed', $this->component.'-component');

        $this->handleReset($action);
    }

    public function edit(Service $service, $action)
    {
    	$this->service          = $service;
    	$this->selected_id      = $service->id;
    	$this->name             = $service->name;
    	$this->description      = $service->description;
    	$this->status           = $service->status;
    	$this->edit             = 2;
        $this->image            = null;
        $this->emit('clearCkEditorService', $this->description);
        $this->emit('initializeCkEditorService');
    }

    protected $listeners = ['handleDelete'];

    public function handleDelete(Service $service, $action ){
        $service->delete();
        $service->subServices()->delete();
        $service->servicesHasclients()->delete();
        $this->emit('msgok','Servicio '.$service->name.', ha sido eliminado');
        $this->handleReset($action);
    }
}
