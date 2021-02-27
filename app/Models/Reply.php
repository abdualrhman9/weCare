<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function report(){
        return $this->belongsTo(Report::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
