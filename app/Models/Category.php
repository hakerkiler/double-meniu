<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \Dimsav\Translatable\Translatable;

//    public $useTranslationFallback = false;
    public $translatedAttributes = ['name'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'url',
        'name',
    ];
}
