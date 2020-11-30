<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;

/**
 * Model - Member
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
class Member extends Model
{
    protected $table = "members";
    public $timestamps = false;
    public $primaryKey = 'user_id';


    /**
     * Foreign Relation - Activity
     *
     * @return Activity
     */
    public function activities()
    {
        return $this->hasMany(Activity::class, 'user_id', 'user_id');
    }


}
