<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','event_id','nama_pemesan','email','jumlah_tiket','total_harga','status'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
