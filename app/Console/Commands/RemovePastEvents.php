<?php

namespace App\Console\Commands;

use App\Models\Event;
use Illuminate\Console\Command;

class RemovePastEvents extends Command
{
    protected $signature = 'remove:past-events';

    protected $description = 'Remove events that have already happened';

    public function handle()
    {
        Event::where('date', '<', now())->delete();
        $this->info('Past events removed successfully.');
    }
}
