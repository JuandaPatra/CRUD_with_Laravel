<?php

namespace App\Models;

use App\Models\Content;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Icons extends Model
{
    use HasFactory;

    // protected $foreignKey = ['content_id'];

    protected $fillable = [
        'content_id',
        'icon_image',

    ];
    protected $guarded=[
        'id'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
