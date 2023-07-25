<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Route;

class ClientController extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';//poder utilizar la paginación en laravel 8

    public $pagination = 10, $search, $action = 1, $edit = 1, $component = 'clientes';
    public $selected_id, $client;

    public function mount(){
        $this->url = Route::current()->getName();
    }

    public function render()
    {

        try {
            if ($this->search) {
                $clients = Client::Search($this->search);
            }else{
                $clients = Client::orderBy('id','desc');
            }
            return view('livewire.Client.component',[
                'clients'  => $clients->paginate($this->pagination),
            ])->extends('layouts.dashboard')->section('content');
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

    public function edit(Client $client)
    {
        $this->edit             = 2;
    	$this->client           = $client;
    	$this->selected_id      = $client->id;
    }

    protected $listeners = ['handleDelete'];

    public function handleDelete(Client $client, $action ){
        $client->delete();
        $client->comments()->delete();
        $client->servicesHasclients()->delete();
        $this->emit('msgok','El cliente '.$client->name.', ha sido eliminado');
        $this->handleAction($action);
    }

}
