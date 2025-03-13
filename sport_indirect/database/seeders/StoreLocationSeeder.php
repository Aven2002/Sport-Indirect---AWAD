<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StoreLocation;

class StoreLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stores = [
            [
                'storeName' => 'Sport Indirect - IOI CITY MALL',
                'imgPath' => 'Store/Sport Indirect - IOI CITY MALL.png',
                'address' => 'LG-27A, LG Flr, IOI City Mall, Lbh IRC, Ioi Resort, 62502 Sepang, Selangor',
                'operationHour' => 'Monday - Sunday , 10:00am - 10:00pm',
                'phoneNo' => '03-5614 9757'
            ],
            [
                'storeName' => 'Sport Indirect - Pavilion Bukit Jalil',
                'imgPath' => 'Store/Sport Indirect - Pavilion Bukit Jalil.png',
                'address' => '8, 4.88&4.93 Lvl 4 Pavilion Bkt Jalil, Jalan Bukit Jalil, Bandar Bkt Jalil, 57000 Kuala Lumpur, Federal Territory of Kuala Lumpur',
                'operationHour' => 'Monday - Sunday , 10:00am - 10:00pm',
                'phoneNo' => '03-5614 9757'
            ],
            [
                'storeName' => 'Sport Indirect - Sunway Velocity',
                'imgPath' => 'Store/Sport Indirect - Sunway Velocity.png',
                'address' => '4-15, 4ft Flr, SUNWAY VELOCITY, Jln Cheras, Maluri, 55100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur',
                'operationHour' => 'Monday - Sunday , 10:00am - 10:00pm',
                'phoneNo' => '03-5614 9749'
            ],
            [
                'storeName' => 'Sport Indirect - Mid Valley Megamall',
                'imgPath' => 'Store/Sport Indirect - Mid Valley Megamall.png',
                'address' => 'Lot S-063 2nd Floor, Mid Valley Megamall, Lingkaran Syed Putra, Mid Valley City, 59200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur',
                'operationHour' => 'Monday - Sunday , 10:00am - 10:00pm',
                'phoneNo' => '03-5614 9765'
            ],
            [
                'storeName' => 'Sport Indirect - Petaling Jaya',
                'imgPath' => 'Store/Sport Indirect - Petaling Jaya.png',
                'address' => '11, Jalan 219, Section 51A, Petaling Jaya, 46100 Selangor',
                'operationHour' => 'Monday - Sunday , 10:00am - 7:00pm',
                'phoneNo' => '03-5614 9778'
            ],
        ];

        foreach ($stores as $data) {
            $stores = StoreLocation::updateOrCreate([
                'storeName' => $data['storeName'],
                'imgPath' => $data['imgPath'],
                'address' => $data['address'],
                'operationHour' => $data['operationHour'],
                'phoneNo' => $data['phoneNo']
            ]);
        }
    }
}