<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslations extends Model
{

    public $timestamps  = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category_translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'url',
        'name',
        'locale',
    ];
}
