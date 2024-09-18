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
        return view('app.admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('app.admin.clients.create');
    }

    public function store(Request $request)
    {
        $client = new Client();
        $client->email = $request->input('email');
        $client->password = bcrypt($request->input('password')); // Hash the password
        $client->phone_number = $request->input('phone_number');
        $client->name = $request->input('name');
        $client->picture = $request->file('picture'); // Assuming you want to store the uploaded file
        $client->occupation = $request->input('occupation');
        $client->facebook = $request->input('facebook');
        $client->instagram = $request->input('instagram');
        $client->save();
        return redirect()->route('app.admin.clients.index');
    }

    public function show($id)
    {
        $client = Client::find($id);
        return view('app.admin.clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('app.admin.clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->save();
        return redirect()->route('app.admin.clients.index');
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('app.admin.clients.index');
    }
}