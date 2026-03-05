<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            ['first_name' => 'Juan', 'last_name' => 'Perez', 'document_number' => '45218596', 'email' => 'juan@test.com', 'phone' => '955621487'],
            ['first_name' => 'Maria', 'last_name' => 'Gomez', 'document_number' => '72145896', 'email' => 'maria@test.com', 'phone' => '944125873'],
            ['first_name' => 'Carlos', 'last_name' => 'Lopez', 'document_number' => '10254789', 'email' => 'carlos@test.com', 'phone' => '988547125'],
            ['first_name' => 'Ana', 'last_name' => 'Martinez', 'document_number' => '32541258', 'email' => 'ana@test.com', 'phone' => '966325147'],
            ['first_name' => 'Luis', 'last_name' => 'Rodriguez', 'document_number' => '08547896', 'email' => 'luis@test.com', 'phone' => '911254789'],
            ['first_name' => 'Elena', 'last_name' => 'Sanchez', 'document_number' => '55214789', 'email' => 'elena@test.com', 'phone' => '922365412'],
            ['first_name' => 'Pedro', 'last_name' => 'Ramirez', 'document_number' => '44125874', 'email' => 'pedro@test.com', 'phone' => '933214587'],
            ['first_name' => 'Sonia', 'last_name' => 'Torres', 'document_number' => '12547854', 'email' => 'sonia@test.com', 'phone' => '944521478'],
            ['first_name' => 'Jorge', 'last_name' => 'Diaz', 'document_number' => '22541258', 'email' => 'jorge@test.com', 'phone' => '955847125'],
            ['first_name' => 'Lucia', 'last_name' => 'Vargas', 'document_number' => '33652147', 'email' => 'lucia@test.com', 'phone' => '966958412'],
            ['first_name' => 'Miguel', 'last_name' => 'Castro', 'document_number' => '88541236', 'email' => 'miguel@test.com', 'phone' => '977412589'],
            ['first_name' => 'Rosa', 'last_name' => 'Flores', 'document_number' => '99541258', 'email' => 'rosa@test.com', 'phone' => '988125478'],
            ['first_name' => 'Raul', 'last_name' => 'Mendoza', 'document_number' => '77412589', 'email' => 'raul@test.com', 'phone' => '999321458'],
            ['first_name' => 'Sofia', 'last_name' => 'Reyes', 'document_number' => '66521478', 'email' => 'sofia@test.com', 'phone' => '911478523'],
            ['first_name' => 'Diego', 'last_name' => 'Morales', 'document_number' => '55412589', 'email' => 'diego@test.com', 'phone' => '922587412'],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
