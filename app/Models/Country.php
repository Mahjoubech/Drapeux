<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
   protected $fillable = [
    'name',
    'capital',
    'population',
    'region',
    'flag_url'
   ];
   public function user(){
    return $this->belongsTo(User::class);
 }
}
