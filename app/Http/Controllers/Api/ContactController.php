<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'file' => 'nullable|file' 
        ]);

        //se ricevo un ffile in allegato 
        if ($request->has('file')){
            //salvo il file e il suo percorso
            $data['file'] = Storage::put('/contacts', $data['file']);
        }

        $newContact = Contact::create($data);

        return response()->json($newContact);
    }
}
