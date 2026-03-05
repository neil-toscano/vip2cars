<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Client;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            ['doc' => '45218596', 'pl' => 'ABC-001', 'br' => 'Toyota', 'mo' => 'Corolla', 'yr' => 2020],
            ['doc' => '72145896', 'pl' => 'ABC-002', 'br' => 'Nissan', 'mo' => 'Sentra', 'yr' => 2019],
            ['doc' => '10254789', 'pl' => 'ABC-003', 'br' => 'Honda', 'mo' => 'Civic', 'yr' => 2021],
            ['doc' => '32541258', 'pl' => 'ABC-004', 'br' => 'Ford', 'mo' => 'Fiesta', 'yr' => 2018],
            ['doc' => '08547896', 'pl' => 'ABC-005', 'br' => 'Chevrolet', 'mo' => 'Onix', 'yr' => 2022],
            ['doc' => '55214789', 'pl' => 'ABC-006', 'br' => 'Hyundai', 'mo' => 'Accent', 'yr' => 2017],
            ['doc' => '44125874', 'pl' => 'ABC-007', 'br' => 'Kia', 'mo' => 'Rio', 'yr' => 2023],
            ['doc' => '12547854', 'pl' => 'ABC-008', 'br' => 'Mazda', 'mo' => '3', 'yr' => 2020],
            ['doc' => '22541258', 'pl' => 'ABC-009', 'br' => 'Volkswagen', 'mo' => 'Golf', 'yr' => 2021],
            ['doc' => '33652147', 'pl' => 'ABC-010', 'br' => 'Renault', 'mo' => 'Logan', 'yr' => 2019],
            ['doc' => '88541236', 'pl' => 'ABC-011', 'br' => 'Suzuki', 'mo' => 'Swift', 'yr' => 2022],
            ['doc' => '99541258', 'pl' => 'ABC-012', 'br' => 'Mitsubishi', 'mo' => 'Lancer', 'yr' => 2018],
            ['doc' => '77412589', 'pl' => 'ABC-013', 'br' => 'Subaru', 'mo' => 'Impreza', 'yr' => 2020],
            ['doc' => '66521478', 'pl' => 'ABC-014', 'br' => 'Peugeot', 'mo' => '208', 'yr' => 2021],
            ['doc' => '55412589', 'pl' => 'ABC-015', 'br' => 'BMW', 'mo' => 'X1', 'yr' => 2023],
        ];

        foreach ($vehicles as $v) {
            $client = Client::where('document_number', $v['doc'])->first();

            if ($client) {
                Vehicle::create([
                    'client_id'        => $client->id,
                    'plate'            => $v['pl'],
                    'brand'            => $v['br'],
                    'model'            => $v['mo'],
                    'manufacture_year' => $v['yr'],
                ]);
            }
        }
    }
}
