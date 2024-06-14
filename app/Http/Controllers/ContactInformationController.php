<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;
use Illuminate\Http\Request;

class ContactInformationController extends Controller
{
    public function index()
    {
        $contacts = ContactInformation::all();
        return view('contact_information.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact_information.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contact_information,email',
            'phone_number' => 'nullable',
            'address' => 'nullable',
            'twitter' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'github' => 'nullable',
            'whatsapp' => 'nullable',
        ]);

        ContactInformation::create($request->all());
        return redirect()->route('contact_information.index')->with('success', 'Contact information created successfully.');
    }

    public function show(ContactInformation $contact_information)
    {
        return view('contact_information.show', compact('contact_information'));
    }

    public function edit(ContactInformation $contact_information)
    {
        return view('contact_information.edit', compact('contact_information'));
    }

    public function update(Request $request, ContactInformation $contact_information)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contact_information,email,' . $contact_information->id,
            'phone_number' => 'nullable',
            'address' => 'nullable',
            'twitter' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'github' => 'nullable',
            'whatsapp' => 'nullable',
        ]);

        $contact_information->update($request->all());
        return redirect()->route('contact_information.index')->with('success', 'Contact information updated successfully.');
    }

    public function destroy(ContactInformation $contact_information)
    {
        $contact_information->delete();
        return redirect()->route('contact_information.index')->with('success', 'Contact information deleted successfully.');
    }
}
