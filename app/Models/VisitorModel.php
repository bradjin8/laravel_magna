<?php
/**
 * Created by PhpStorm.
 * User: headit74
 * Date: 9/2/20
 * Time: 12:56 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class VisitorModel extends Model
{
    protected $table = 'visitors';
    protected $fillable = ['relationship', 'country', 'how'];
}