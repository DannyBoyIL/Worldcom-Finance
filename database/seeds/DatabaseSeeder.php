<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

const BAR = <<<FOOBAR

*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*
+                                      +
+     Duplicate PRIMARY KEY entry!     +
+                                      +
+     desc: DB:`Countries` table at    +
+    `abb` column have double value    +
+                                      +
*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*
+                                      +
+      RUN: php artisan db:seed        +
+                                      +
*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*
FOOBAR;

class DatabaseSeeder extends Seeder {


    /**
     * Seed the application's database.
     *
     * @return void
     * @throws Exception
     */
    public function run() {
        DB::beginTransaction();

        try {

            $this->call(CountriesTableSeeder::class);
            $this->call(PlacesTableSeeder::class);
            $this->call(ZipsTableSeeder::class);
            DB::commit();

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception(BAR);
        }
    }

}
