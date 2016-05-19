<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CustCompanySeeder::class);
        $this->call(CustIndividualSeeder::class);
        $this->call(EmployeeRoleSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(MaterialThreadSeeder::class);
        $this->call(MaterialNeedleSeeder::class);
        $this->call(MaterialButtonSeeder::class);
        $this->call(MaterialZipperSeeder::class);
        $this->call(MaterialHookEyeSeeder::class);
        $this->call(FabricTypeSeeder::class);
        $this->call(SwatchSeeder::class);
        $this->call(GarmentCategorySeeder::class);
        $this->call(SegmentSeeder::class);
        $this->call(SegmentPatternSeeder::class);
        $this->call(CatalogueSeeder::class);
        $this->call(MeasurementDetailSeeder::class);
        $this->call(MeasurementCategorySeeder::class);
        $this->call(AlterationMaintenanceSeeder::class);

        Model::reguard();
    }
}
