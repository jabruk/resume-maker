<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

         /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
    ];

        /**
     * Get the resume associated with the user.
     */
    public function resume()
    {
        return $this->belongsTo(Resume::class);

    }

            /**
     * Get the resume associated with the user.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);

    }
}
