<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Service;
use App\Models\ServicesHasclient;
use App\Traits\HandlerTrait;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use HandlerTrait;

    public function index($slug)
    {
        return view('webSite.service',[
            'service'  => Service::slug($slug)->first()
        ]);
    }

    public function save(ClientRequest $request)
    {
        $data                   = $request->only('name','phone','email','city','company');
        $data['description']    = Client::DESCRIPTION_SERVICE;
        $client                 = $this->handlerClient($request->email, $data);
        
        ServicesHasclient::create([
            'client_id'     => $client->id,
            'service_id'    => $request->service,
            'message'       => $request->message
        ]);
        return redirect()->back()->with('success','Mensaje enviado con éxito');
    }

}
