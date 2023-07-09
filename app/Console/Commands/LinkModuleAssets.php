<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LinkModuleAssets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:link-assets {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create symbolic link to root assets/js for given module.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $moduleName = $this->argument('module');
        if(empty($moduleName)) $this->error('Module name required.');
        $target = module_path($moduleName, 'Resources/assets/js');
        $link = resource_path('js/Pages/' . ucfirst($moduleName));
        symlink($target, $link);
        $this->info('Link created successfully');
    }
}
