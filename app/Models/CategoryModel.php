<?php
/**
 * Created by PhpStorm.
 * User: headit74
 * Date: 9/1/20
 * Time: 3:07 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'status'];

}