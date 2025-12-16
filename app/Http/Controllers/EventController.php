<?php
namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('tanggal')->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama_event'=>'required',
            'tanggal'=>'required|date',
            'lokasi'=>'required',
            'harga'=>'required|integer',
            'stok'=>'required|integer',
        ]);
        Event::create($req->all());
        return redirect()->route('events.index')->with('success','Event dibuat');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $req, Event $event)
    {
        $req->validate([
            'nama_event'=>'required',
            'tanggal'=>'required|date',
            'lokasi'=>'required',
            'harga'=>'required|integer',
            'stok'=>'required|integer',
            'deskripsi'=>'nullable|string',
        ]);

        $event->update($req->all()); // pastikan $fillable di model Event ada

        return redirect()->route('events.index')->with('success', 'Event berhasil diupdate!');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard', [
            'events' => Event::all()
        ]);
    }


}
