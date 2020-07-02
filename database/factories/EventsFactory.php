<?php

    /** @var \Illuminate\Database\Eloquent\Factory $factory */

    use App\Event;
    use Faker\Generator as Faker;
    use Illuminate\Support\Facades\DB;

    $factory->define(Event::class, function (Faker $faker) {
        return [
            //
                'title' => $faker->title,
                'date' => $faker->dateTimeBetween(\Illuminate\Support\Carbon::now()->toDateTimeString(),
                        \Illuminate\Support\Carbon::now()->addDays(rand(1, 60))),
                'city_id' => function () {
                    $city = \App\City::select(['*'])->orderBy(DB::raw('RAND()'))->first();
                    return $city->id;
                }
        ];
    });
