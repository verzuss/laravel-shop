<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProjectInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init project';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('storage:link');
        $this->call('migrate');

        return Command::SUCCESS;
    }
}
