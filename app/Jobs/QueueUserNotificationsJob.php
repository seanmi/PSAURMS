<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Document;

use App\User;

use Notification;


class QueueUserNotificationsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $id = null;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $id = $this->id;
        $document = Document::find($id);

        $assign = array($document->assign_user);

        $ccs = array();

        foreach($document->cc_users as $cc):
            array_push($ccs, $cc);
        endforeach;

        
         Notification::send($ccs, new \App\Notifications\CCDocument());
         Notification::send($assign, new \App\Notifications\AssignedDocument());
    }
}
