<?php

namespace App\Http\Livewire;

use App\Models\ServicesHasclient;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Route;


class ServiceHasClientController extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';//poder utilizar la paginación en laravel 8

    public $pagination = 10, $search, $action = 1, $edit = 1, $component = 'servicio-por-cliente';
    public $selected_id;

    public function mount(){
        $this->url = Route::current()->getName();
    }

    public function render()
    {

        try {
            if ($this->search) {
                $services = ServicesHasclient::Search($this->search);
            }else{
                $services = ServicesHasclient::orderBy('id','desc');
            }
            return view('livewire.ServiceHasClient.component',[
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
        $this->action = $action;
    }

    public function handleView(ServicesHasclient $service, $action, $status)
    {
        $service->update([
            'status' => $status == 'LEIDO' ? 'NOT_LEIDO':'LEIDO'
        ]);
        $this->handleAction($action);
        $this->emit('msgok','El registro se ha guardado con exito');
        $this->emit('modalsClosed', $this->component.'-component');
    }

    public function edit(ServicesHasclient $service)
    {
        $this->edit             = 2;
    	$this->service          = $service;
    	$this->selected_id      = $service->id;
    }

}
