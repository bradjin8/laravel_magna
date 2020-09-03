<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackRecordModel extends Model
{
    //
    protected $table = 'track_records';
    protected $fillable = [
        'category_id',          // category id on Category Table
        'type',                 // page / video / pdf
        'duration_in_sec',      // duration in sec if type is video
        'file_name',            // name of file visited
        'visitor_id',           // visitor's id
    ];
}
