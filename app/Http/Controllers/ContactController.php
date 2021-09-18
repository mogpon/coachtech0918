<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function show(ContactRequest $request)
    {
        $inputs = $request->all();
        return view('/show', ['inputs' => $inputs]);
    }
    public function send(Request $request)
    {
        $action = $request->get('action','back');
        $input = $request->except('action');

        if ($action === 'submit') {

            $contact = new Contact();
            $contact->fill($input);
            $contact->save();

            $request->session()->regenerateToken();
            return view('complete');
        } else {
            return redirect()
                ->route('index')
                ->withInput($input);
        }
    }
    public function search(Request $request)
    {
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $created_at = $request->input('created_at');

        $query = Contact::query();

        if (!empty($last_name)) {
            $query->where('last_name', 'LIKE', "%{$last_name}%");
        }

        if (!empty($email)) {
            $query->where('email', 'LIKE', "%{$email}%");
        }
        if (!empty($created_at)) {
            $query->where('created_at', "{$created_at}");
        }

        $items = $query->Paginate(10);
        return view('find', compact('items', 'last_name', 'email', 'created_at'));
    }
    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/find');
    }
}

