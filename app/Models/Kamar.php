<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;
    public $table = 'kamar';
    protected $fillable = [
        'nama_kamar',
        'no_kamar',
        'pasien_id',
    ];

    /**
     * Get the user that owns the Kamar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pasiens(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }


}
