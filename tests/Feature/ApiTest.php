<?php

    namespace Tests\Feature;

    use Illuminate\Foundation\Testing\DatabaseMigrations;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Illuminate\Foundation\Testing\WithFaker;
    use Tests\TestCase;

    class ApiTest extends TestCase
    {
        use RefreshDatabase;

        /**
         * @return void
         */
        /*
        public function testReturnAllEventsItem()
        {
            // $this->get('/events?api_token=R7VPUFVie1')->assertStatus(200);
            //   $response = $this->get(route('events.getAll'));

            $this->get( '/events/1/users', ['user_id' => 1, 'api_token' => 'EOsHhAkqEt'])->assertStatus(200);;
            //  $response = $this->json('get', '/events/1/users');

        }
*/

        /**
         * @return void
         */
        public function testReturnOneEventsItem()
        {
          $this->call('GET','/events/1?api_token=EOsHhAkqEt1')->assertStatus(200);
            //  $response = $this->get('http://api/events');

        }



    }
