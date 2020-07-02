<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Event extends Model
    {
        //
        protected $table = "events";

        public static function get($id = null)
        {
            return Event::select(['*'])->where('id', $id)->first();
        }

        public function user()
        {
            return $this->belongsToMany('App\User');
        }
    }
