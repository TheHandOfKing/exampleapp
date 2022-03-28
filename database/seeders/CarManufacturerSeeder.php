<?php

namespace Database\Seeders;

use App\Models\CarModel;
use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarModel::truncate();
        Manufacturer::truncate();

        $manufacturers = ["Ford", "Honda"];
        $modelFord = ["Mustang", "Maverick"];
        $modelHonda = ["HR-V", "CR-V", "Accord"];

        foreach ($manufacturers as $manu) {
            $manufacturer = Manufacturer::factory()->create([
                'name' => $manu,
                'user_id' => 1
            ]);

            if ($manufacturer->name == "Ford") {
                foreach ($modelFord as $ford) {
                    CarModel::factory()->create([
                        'name' => $ford,
                        'manufac_id' => $manufacturer->id,
                    ]);
                }
            } else {
                foreach ($modelHonda as $ford) {
                    CarModel::factory()->create([
                        'name' => $ford,
                        'manufac_id' => $manufacturer->id
                    ]);
                }
            }
        }
    }
}
