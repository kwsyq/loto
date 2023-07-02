<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $table="customers";
    
    protected $primaryKey = 'id';

    protected $guarded=[];

    public function emails()
    {
        return $this->hasMany(Emails::class);
    }    
}
