<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logName = __DIR__."/members.csv";
        $file = new \SplFileObject($logName);
        $file->setFlags(\SplFileObject::READ_CSV);

        foreach($file AS $row) {
            if( !is_null($row[0]) && $row[0] != "user_id") {
                $m = new Member;
                $m->user_id = $row[0];
                $m->signup_date = $row[1];
                $m->channel = $row[2];
                $m->save();

            }
        }

    }
}
