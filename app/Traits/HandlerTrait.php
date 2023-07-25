<?php

namespace App\Traits;

use App\Models\Client;

trait HandlerTrait
{
	protected function handlerClient($email, $data)
    {
        $client = Client::handlerEmail($email)->first() ? Client::handlerEmail($email)->first()['id'] : null;

        $find = [
            'id'  => $client,
        ];
        $client = Client::updateOrCreate($find, $data);
        return $client;
	}

}

