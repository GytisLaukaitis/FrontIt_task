<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;


class ClientController extends Controller
{


    public function index()
    {
        return Client::orderBy('id')->get();
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:clients'],
            'surname' => ['required', 'string', 'max:255'],
            'yearOfBirth' => 'required|date_format:Y-m-d|before:today'
        ],
            [
                'name.required' => 'Enter name',
                'surname.required' => 'Enter surname',
                'yearOfBirth.required' => 'Enter year of birth',
                'name.unique' => 'Name already exist',
            ]);


        $client = new Client();
        $client->fill($request->all());
        $client->save();
        return response()->json($client, 201);
    }


}
