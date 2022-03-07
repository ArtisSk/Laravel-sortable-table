<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [ 'ean_13', 'title', 'stock', 'cost' ];
    
    public $sortable = [ 'ean_13', 'title', 'stock', 'cost' ];
}
