<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perawatan extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $table = 'perawatan';
    protected $fillable = [
        'id',
        'pasien_id',
        'kamar_id',
    ];
    
    /**
     * Get the kamars that owns the Perawatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kamars(): BelongsTo
    {
        return $this->belongsTo(Kamar::class);
    }

    /**
     * Get the user that owns the Perawatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pasiens(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
