<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\TvCategory;

class CategoriesList extends Model
{
    protected $table="category_list";
    protected $fillable=[
        'category_id',
    ];

    public function TvCategory(){
        return $this->belongsTo(TvCategory::class, 'category_id', 'id');
    }

}
