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
        $client = Client::where('client_id', $id)->firstOrFail();
        return view('app.admin.clients.edit', compact('client'));
    }
    
 
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string|max:20',
            'picture' => 'nullable|string',
            'occupation' => 'nullable|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'password' => 'nullable|string|min:6',
        ]);

        // Ambil data client berdasarkan client_id
        $client = Client::where('client_id', $id)->firstOrFail();

        // Jika ada input password, update password
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            unset($validatedData['password']); // Hapus password dari data yang akan di-update jika tidak ada input
        }

        // Update data client
        $client->update($validatedData);

        // Redirect ke halaman list client dengan pesan sukses
        return redirect()->route('app.admin.clients.index')->with('success', 'Client updated successfully');
    }
    
    public function destroy($id)
    {
        $client = Client::where('client_id', $id)->firstOrFail();
        $client->delete();
        return redirect()->route('app.admin.clients.index')->with('success', 'Client deleted successfully');
    }
}