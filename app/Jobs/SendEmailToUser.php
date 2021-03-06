<?php

    namespace App\Jobs;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Foundation\Bus\Dispatchable;
    use Illuminate\Queue\InteractsWithQueue;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Support\Facades\Log;
    use Monolog\Handler\StreamHandler;
    use Monolog\Logger;

    class SendEmailToUser implements ShouldQueue
    {
        use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

        protected $user;

        protected $event;

        /**
         * Create a new job instance.
         *
         * @return void
         */
        public function __construct($user, $event)
        {
            //
            $this->user = $user;
            $this->event = $event;
        }

        /**
         * Execute the job.
         *
         * @return void
         */
        public function handle()
        {
            //
            $message = "Send email to " . $this->user->email . " about event " . $this->event->title;
            Log::info($message);
            $orderLog = new Logger('SendEventMessage');
            $log = [
                    'message' => $message,
            ];

            $orderLog->pushHandler(new StreamHandler(storage_path('logs/message.log')), Logger::INFO);
            $orderLog->info('OrderLog', $log);
        }
    }
