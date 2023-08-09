<?php

namespace App\Console\Commands;

use App\Models\Permission;
use Illuminate\Console\Command;

class PermissionScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permit:change {permit} {value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $permit = $this->argument('permit');
        $value = $this->argument('value');

        $values = (['value' => $value]);
        Permission::where('permit', $permit)->update($values);
    }
}
