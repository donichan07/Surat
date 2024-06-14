<?php
namespace App\Http\Controllers;

use App\Models\Inbox;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $inboxList = Inbox::query()
            ->where('sender', 'like', "%{$search}%")
            ->orWhere('title', 'like', "%{$search}%")
            ->get();

        return view('inbox.index', compact('inboxList'));
    }

    public function create()
    {
        return view('inbox.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sender' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'received_date' => 'required|date',
            'category' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        Inbox::create($request->all());

        return redirect()->route('inbox.index')->with('success', 'Surat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $inbox = Inbox::findOrFail($id);
        return view('inbox.edit', compact('inbox'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sender' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'received_date' => 'required|date',
            'category' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $inbox = Inbox::findOrFail($id);
        $inbox->update($request->all());

        return redirect()->route('inbox.index')->with('success', 'Surat berhasil diperbarui');
    }

    public function destroy(Request $request)
    {
        $inbox = Inbox::findOrFail($request->input('id'));
        $inbox->delete();

        return redirect()->route('inbox.index')->with('success', 'Surat berhasil dihapus');
    }
}
