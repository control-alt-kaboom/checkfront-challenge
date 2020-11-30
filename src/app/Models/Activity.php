<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

/**
 * Model - Activity
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
class Activity extends Model
{
    protected $table = "activity";
    public $timestamps = false;
    public $incrementing = false;


    /**
     * Foreign Relation - Member
     *
     * @return Member
     */
    public function member()
    {
        return $this->belongsTo(Member::class, 'user_id', 'user_id');
    }
}
