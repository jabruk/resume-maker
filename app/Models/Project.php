<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category','github', '' 
    ]; 
  
    /**
     * Get the resume's  categories.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function category(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 

        /**
     * Get the resume associated with the images.
     */
    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

            /**
     * Get the resume associated with the images.
     */
    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
