<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logName = __DIR__ . "/activity.csv";
        $file = new \SplFileObject($logName);
        $file->setFlags(\SplFileObject::READ_CSV);

        foreach ($file as $row) {
            if (!is_null($row[0]) && $row[0] != "user_id") {
                $m = new Activity;
                $m->user_id = $row[0];
                $m->act_timestamp = $row[1];
                $m->act_type = $row[2];
                $m->save();
            }
        }
    }
}
