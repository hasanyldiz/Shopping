<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [ 'is_deleted','user_id'];
    public function scopeNotDeleteds($query)
    {
        return $query->where('is_deleted', 0);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function takeback()
    {
        // Kitabın silinmiş olup olmadığını kontrol edin
        if ($this->trashed()) {
            // Kitabı silinmişten geri al
            $this->restore();
        }
    }

}
