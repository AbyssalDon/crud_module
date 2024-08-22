<?php

namespace Abbas\CrudModule;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'name',
		'description',
		'price',
    ];
	
	public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
