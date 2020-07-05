<?php

    namespace App;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Support\Str;

    class User extends Authenticatable
    {
        use Notifiable;

        protected $table = 'users';

        /**
         * @var string
         *
         * @ORM\Column(name="api_token", type="string", length=255, nullable=false)
         */
        private $api_token;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
                'first_name',
                'last_name',
                'name',
                'email',
                'password',
                'api_token'
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
                'password',
                'remember_token',
                'api_token'
        ];

        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [
                'email_verified_at' => 'datetime',
        ];

        public static function get($id)
        {
            return User::select(['id', 'first_name', 'last_name', 'email'])->where('id', $id)->first();
        }

        public function events()
        {
            return $this->belongsToMany('Event');
        }

        public static function generateUnickToken()
        {
            $user = true;
            while ($user != null) {
                $token = Str::random(10);
                $user = User::select(['*'])->where('api_token', $token)->first();
            }
            return $token;
        }
    }
