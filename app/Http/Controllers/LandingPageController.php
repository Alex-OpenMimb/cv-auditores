<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Traits\HandlerTrait;

class LandingPageController extends Controller
{
    use HandlerTrait;

    public function save(ClientRequest $request)
    {
        $data                   = $request->all();
        $data['description']    = Client::DESCRIPTION_LANDING;
        $this->handlerClient($request->email, $data);
        return redirect()->back()->with('success','Mensaje enviado con éxito');
    }
}
