<?php

namespace Raid\Core\Model\Commands;

use Raid\Core\Command\Commands\PublishCommand;

class PublishModelCommand extends PublishCommand
{
    /**
     * The console command name.
     */
    protected $name = 'core:publish-model';

    /**
     * The console command description.
     */
    protected $description = 'Publish core model config files.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->publishCommand('config-model');
    }
}
