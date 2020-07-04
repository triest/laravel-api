<?php

    namespace Tests\Unit;

    use App\City;
    use App\Event;
    use App\User;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Tests\TestCase;

    class EventTest extends TestCase
    {
        use RefreshDatabase;

        /**
         * A basic unit test example.
         *
         * @return void
         */
        public function testExample()
        {
            $this->assertTrue(true);
        }


        /**
         * A basic unit test One.
         *
         * @return void
         */
        public function testGetone()
        {
            $city = factory(City::class)->create();
            $event = factory(Event::class)->create();

            $this->get('events/' . $event->id)
                    ->assertStatus(200)->assertJson([
                            'id' => $event->id,
                    ]);;
        }

        /**
         * A basic unit test All.
         *
         * @return void
         */

        public function testGetall()
        {
            $city = factory(City::class)->create();
            $event1 = factory(Event::class)->create();
            $event2 = factory(Event::class)->create();
            $event3 = factory(Event::class)->create();

            $this->get('http://api/events')
                    ->assertStatus(200)
                    ->assertJson([
                            ['title' => $event1->title],
                            ['title' => $event2->title],
                            ['title' => $event3->title]
                    ]);
        }

        public function testAdduser()
        {
            $city = factory(City::class)->create();
            $event1 = factory(Event::class)->create();
            $user = factory(User::class)->create();

            $this->put('http://api/events/' . $event1->id . '/users?user_id=' . $user->id);


            $this->get('http://api/events/' . $event1->id . '/users')
                    ->assertStatus(200)
                    ->assertJson([
                                    ['id' => $user->id]
                            ]
                    );
        }

        public function testDeleteuser()
        {

            $city = factory(City::class)->create();
            $event1 = factory(Event::class)->create();
            $user = factory(User::class)->create();

            $this->delete('http://api/events/' . $event1->id . '/users?user_id=' . $user->id);

            $this->get('http://api/events/' . $event1->id . '/users')
                    ->assertStatus(200)
                    ->assertJson([

                            ]
                    );


        }


    }
