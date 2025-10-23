<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class CompteBancaire extends Model
{
    use HasFactory;

    protected $table = 'compte_bancaire';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'numero',
        'type_compte',
        'user_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
