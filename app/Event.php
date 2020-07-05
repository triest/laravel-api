<?php

    namespace App;

    use App\Jobs\SendEmailToUser;
    use Illuminate\Database\Eloquent\Model;

    class Event extends Model
    {
        //
        protected $table = 'events';

        public static function get($id = null)
        {
            if($id!=null) {
                return Event::select(['*'])->where('id', $id)->first();
            }else{
               return Event::select(['*'])->get();
            }
        }

        public function user()
        {
            return $this->belongsToMany('App\User');
        }

        public function attachUser($user)
        {
            if (!$this->user->contains($user)) {
                $this->user()->attach($user);
            } else {
                return false;
            }

            /*
             * отправляем уведомление через очередь
             * */

            SendEmailToUser::dispatchAfterResponse($user, $this);
            return true;
        }

        public function datachUser($user){
            $this->user()->detach($user);
        }
    }
