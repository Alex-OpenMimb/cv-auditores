<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HandlerTrait;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Mockery\Undefined;
use Illuminate\Support\Facades\DB;

class ClintController extends Controller
{
    use HandlerTrait;

    public function index()
    {
        return view('webSite.unsubscription');
    }

    public function handleDelete(ClientRequest $request )
    {
        $email = $request->email;
       
        $client =  Client::handlerEmail($email)->first();

        try {

            $client->delete();
            $client->comments()->delete();
            $client->servicesHasclients()->delete();
    
             return redirect('/delete_user');

        } catch (\Throwable $th) {
            return redirect('/usurio-no-registrado');
        }
    }

}
