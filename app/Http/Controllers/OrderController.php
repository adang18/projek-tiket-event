<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // FORM PEMESANAN (user)
    public function form(Event $event)
    {
        return view('orders.form', compact('event'));
    }

    // SIMPAN PEMESANAN
    public function store(Request $req, Event $event)
    {
        $req->validate([
            'nama_pemesan'   => 'required',
            'email'          => 'required|email',
            'jumlah_tiket'   => 'required|integer|min:1',
            'payment_method' => 'required|in:cod,transfer,ewallet',
            'payment_proof'  => 'nullable|image|max:2048'
        ]);

        if ($req->jumlah_tiket > $event->stok) {
            return back()->withErrors(['jumlah_tiket' => 'Stok tiket tidak cukup'])->withInput();
        }

        $total = $event->harga * $req->jumlah_tiket;

        // Upload bukti pembayaran (opsional)
        $proof = null;
        if ($req->hasFile('payment_proof')) {
            $proof = $req->file('payment_proof')->store('payment_proof', 'public');
        }

        // Simpan pesanan (user_id = null karena tanpa login)
        Order::create([
            'user_id'        => null,
            'event_id'       => $event->id,
            'nama_pemesan'   => $req->nama_pemesan,
            'email'          => $req->email,
            'jumlah_tiket'   => $req->jumlah_tiket,
            'total_harga'    => $total,
            'payment_method' => $req->payment_method,
            'payment_status' => 'pending',
            'payment_proof'  => $proof
        ]);

        // Kurangi stok
        $event->decrement('stok', $req->jumlah_tiket);

        return redirect('/')->with('success', 'Tiket berhasil dipesan! Menunggu konfirmasi admin.');
    }

    // =======================
    // == BAGIAN ADMIN ==
    // =======================

    // LIST PESANAN
    public function index()
    {
        $orders = Order::with('event')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    // KONFIRMASI PESANAN
    public function confirm(Order $order)
    {
        $order->payment_status = 'paid';
        $order->save();

        return back()->with('success', 'Pesanan berhasil dikonfirmasi!');
    }

    public function history()
    {
        // kalau nanti sudah login, ganti menjadi ->where('user_id', auth()->id())
        $orders = Order::with('event')->latest()->get();

        return view('admin.orders.history', compact('orders'));
    }

}
