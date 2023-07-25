<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class Prepare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prepare {env}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepare specific environment (prod, dev)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $env = $this->argument('env');
        $this->info("Preparing {$env} ...");

        if ($env == 'prod') {
            Process::run('cp .env.prod .env');
            Process::run('cp .htaccess.prod .htaccess');

            /* TODO: zip command inside Docker (macOS) is too slow :(

                Illuminate\Process\Exceptions\ProcessTimedOutException 
                The process "cd ../; zip -r CatLink.zip CatLink" exceeded the timeout of 60 seconds.
            */
            //Process::run('cd ../; zip -r CatLink.zip CatLink');

        } else if ($env == 'dev') {
            Process::run('cp .env.dev .env');
            Process::run('cp .htaccess.dev .htaccess');

        } else {
            $this->error("Wrong environment: {$env}");
        }

        $this->info("Done!");
    }
}
