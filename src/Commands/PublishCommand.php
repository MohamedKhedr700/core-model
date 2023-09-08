<?php

namespace Raid\Core\Model\Commands;

use \Illuminate\Console\Command;
class PublishCommand extends Command
{
    /**
     * The console command name.
     */
    protected $name = 'publish:core-model';

    /**
     * The console command description.
     */
    protected $description = 'Publish core model config files.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('vendor:publish', [
            '--tag' => 'config-model'
        ]);
    }
}