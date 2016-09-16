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

        $this->call(UserSeeder::class);
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
        $this->call(GarmentCategorySeeder::class);
        $this->call(SegmentSeeder::class);
        $this->call(SegmentStyleSeeder::class);
        $this->call(SegmentPatternSeeder::class);
        $this->call(CatalogueSeeder::class);
        $this->call(AlterationSeeder::class);
        $this->call(FabricThreadCountSeeder::class);
        $this->call(PackagesSeeder::class);
        $this->call(FabricPatternSeeder::class);
        $this->call(FabricColorSeeder::class);
        $this->call(FabricSeeder::class);
        $this->call(BodyPartCategorySeeder::class);
        $this->call(BodyPartFormsSeeder::class);
        $this->call(MeasurementCategorySeeder::class);
        $this->call(StandardSizeCategorySeeder::class);
        $this->call(MeasurementDetailSeeder::class); 
        $this->call(StandardSizeDetailSeeder::class); 
        $this->call(JobOrderSeeder::class); 
        $this->call(JobOrderSpecificSeeder::class);
        $this->call(JobOrderProgressSeeder::class);
        $this->call(ChargeCategorySeeder::class);
        $this->call(ChargeDetailSeeder::class);
        $this->call(CustCompEmployeeSeeder::class);
        $this->call(UtilitiesGeneralSeeder::class);
        //$this->call(CustomerSeeder::class);
        // $this->call(NonShopAlterationSeeder::class);

        Model::reguard();
    }
}
