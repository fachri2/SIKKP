<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $table = 'pasien';
    protected $guarded = ['id'];

    /**
     * Get the user associated with the Pasien
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kamars(): HasOne
    {
        return $this->hasOne(Kamar::class, 'pasien_id');
    }

    /**
     * Get all of the comments for the Pasien
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function perawatans(): HasMany
    {
        return $this->hasMany(Perawatan::class, 'pasien_id');
    }
    
}
