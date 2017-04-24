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
                'start_date' => '2017/04/19 12:05:00',
                'end_date' => '2017/04/19 16:05:00',
                'price' => '200.00',
            ),
            array(
                'id' => 2,
                'user_ud' => 1,
                'table_id' => 2,
                'start_date' => '2017/04/17 12:00:00',
                'end_date' => '2017/04/17 14:00:00',
                'price' => '100.00',
            ),
            array(
                'id' => 3,
                'user_ud' => 1,
                'table_id' => 2,
                'start_date' => '2017/04/14 10:00:00',
                'end_date' => '2017/04/14 14:00:00',
                'price' => '200.00',
            ),
            array(
                'id' => 4,
                'user_ud' => 1,
                'table_id' => 1,
                'start_date' => '2017/03/17 12:00:00',
                'end_date' => '2017/03/17 14:00:00',
                'price' => '100.00',
            ),
            array(
                'id' => 5,
                'user_ud' => 1,
                'table_id' => 2,
                'start_date' => '2017/02/17 10:00:00',
                'end_date' => '2017/02/17 14:00:00',
                'price' => '200.00',
            )
        );

        DB::table('individual_reservations')->insert($reservations);
    }
}
