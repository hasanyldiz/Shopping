<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WriteInfocommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    public $signature = 'Write:info';

    /**
     * The console command description.
     *
     * @var string
     */
    public $description = 'Write info ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info('test message');
        return Command::SUCCESS;
        
    }
}
