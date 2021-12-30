<?php

namespace App\Models;
use App\Models\Icons;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'picture'

    ];
    protected $guarded=[
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function slider()
    {
        return $this->hasMany(Slider::class);
    }

    public function icon()
    {
        return $this->hasMany(Icons::class);
    }

}
