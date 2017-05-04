<?php

use Illuminate\Database\Seeder;

class IndividualReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('individual_reservations')->delete();

        $reservations = array(
            array(
                'id' => 1,
                'user_id' => 1,
                'table_id' => 1,
                'start_date' => '2017-05-13 13:30:00',
                'end_date' => '2017-05-13 15:30:00',
                'price' => '200.00',
            ),
            array(
                'id' => 2,
                'user_ud' => 1,
                'table_id' => 2,
                'start_date' => '2017-08-13 13:30:00',
                'end_date' => '2017-08-13 16:30:00',
                'price' => '100.00',
            ),
            array(
                'id' => 3,
                'user_ud' => 1,
                'table_id' => 2,
                'start_date' => '2017-09-13 13:30:00',
                'end_date' => '2017-09-13 18:30:00',
                'price' => '200.00',
            ),
            array(
                'id' => 4,
                'user_ud' => 1,
                'table_id' => 1,
                'start_date' => '2017-10-13 13:30:00',
                'end_date' => '2017-10-13 14:30:00',
                'price' => '100.00',
            ),
            array(
                'id' => 5,
                'user_ud' => 1,
                'table_id' => 2,
                'start_date' => '2017-12-13 13:30:00',
                'end_date' => '2017-12-13 16:30:00',
                'price' => '200.00',
            )
        );

        DB::table('individual_reservations')->insert($reservations);
    }
}
