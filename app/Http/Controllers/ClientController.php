<?php

namespace App\Http\Controllers;

//import model client
use App\Models\Client;

//import return type View
use Illuminate\View\View;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();
        return view('app.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $client = new Client();
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->save();
        return redirect()->route('clients.index');
    }

    public function show($id)
    {
        $client = Client::find($id);
        return view('clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->save();
        return redirect()->route('clients.index');
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('clients.index');
    }
}