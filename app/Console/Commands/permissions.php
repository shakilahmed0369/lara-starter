<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class permissions extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'lara:permissions {model : your model name} {--single=* : if you dont want to auto create 4 basic permisson use --singel=your permisson} {--delete=* : delete permission ModelName --delete=permisson name}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'make 4 basic permisson (c, r, e, d) for a specific model';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $model            = $this->argument('model');
    $singlePermission = $this->option('single');
    $deletePermission = $this->option('delete');
    if ($singlePermission) {
      $this->info('Creating Permission');
      foreach ($singlePermission as $permission) {
        Permission::create(['name' => $permission . $model, 'group_name' => $model, 'guard_name' => 'admin']);
        $this->info($permission . $model);
      }

      $this->info('Done...');
    } elseif ($deletePermission) {  
      $this->info('Deleteing Permission');
      foreach ($deletePermission as $permission) {
        $destroy = Permission::where('name', $permission . $model)->orWhere('group_name', $model);
        if ($destroy->count() > 0) {
          $destroy->delete();
          $this->info($permission . $model);
          $this->info('Done...');
        } else {
          $this->info('No permission to delete...');
        }
      }
    } else {

      $permissions = [
        "read-$model",
        "create-$model",
        "edit-$model",
        "delete-$model"
      ];
      $this->info('Creating permissions...');
      foreach ($permissions as $permission) {
        Permission::create(['name' => $permission, 'group_name' => $model, 'guard_name' => 'admin']);
        $this->info($permission);
      }
      $this->info('Done...');
    }
  }
}
