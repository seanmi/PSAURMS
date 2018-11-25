<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;

use Notification;

use App\Document;

use App\User;

use Carbon\Carbon;

class ArchiveDocuments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'archive:documents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send document to archive';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $current_date_time = \Carbon\Carbon::now();
        $user_current_date = $current_date_time->format("Y-m-d");

        $documents = DB::table('documents')
                ->where('disposal_date','=', $user_current_date)
                ->where('archive', 0)
                ->get();

         DB::table('documents')
            ->where('disposal_date', $user_current_date)
            ->update(['archive' => 1]);
        
        // $users = DB::table('users')->where('administrator', 1)->get(); 
        $users = User::where('administrator', '=', 1)->get();
        //dd($users);

        if(count($documents) !== 0){
            Notification::send($users, new \App\Notifications\RetentionReminder($documents));          
        }
        
        echo $documents;
    }
}
