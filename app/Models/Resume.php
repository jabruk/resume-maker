<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resume extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'it_position',
        'introduction_text',
        'inspire_phrase',
        'about_me',
    ];

     /**
     * Get the user that owns the resume.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
       
    
    /**
     * Get the resume associated with the images.
     */
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

        /**
     * Get the resume associated with the images.
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
 