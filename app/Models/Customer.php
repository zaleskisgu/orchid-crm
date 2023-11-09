<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Customer extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'place',
        'company',
        'comment'
    ];

    protected $allowedSorts = [
        'name'
    ];

    protected $allowedFilters = [
        'name' => Like::class,
    ];
}
