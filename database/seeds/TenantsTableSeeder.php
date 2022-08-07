<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $plan = Plan::first();

    $plan->tenants()->create([
      'cnpj' => '17369451000101',
      'name' => 'Unitronica',
      'url' => 'unitronica',
      'email' => 'rafael@unitronica.com.br',
    ]);
  }
}
