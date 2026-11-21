<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZipUpload extends Model
{
    protected $fillable = ['nim', 'nama', 'email', 'zip'];

    public function user(){
        return $this->belongsTo('App\Item');
    }
}
