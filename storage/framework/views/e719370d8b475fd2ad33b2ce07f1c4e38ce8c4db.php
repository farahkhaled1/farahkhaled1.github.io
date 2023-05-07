<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CallPythonCommand extends Command
{
    protected $signature = 'python:call {arg}';

    protected $description = 'Call a Python script from Laravel';

    public function handle()
    {
        $arg = $this->argument('arg');
        $output = shell_exec("python /python/English/English.ipynb $arg");
        $this->info($output);
    }
}
 ?><?php /**PATH /Users/farahkhaled/Desktop/seopro/resources/views/another.blade.php ENDPATH**/ ?>