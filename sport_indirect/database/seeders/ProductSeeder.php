<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            //Racquet
            [
                'productName' => 'YONEX ASTROX 88 D PRO',
                'productCategory' => 'Racquet',
                'productBrand' => 'YONEX',
                'description' => "A stiff racquet made from HM Graphite, CFR, and Tungsten,
                                with 2G-Namd FLEX FORCE and Ultra PE Fiber for enhanced flexibility and power. 
                                Features a NEW Built-in T-Joint for improved stability. 
                                Measures 680mm (10mm longer for extra reach).
                                Weighs 4U (Avg. 83g), with a recommended tension of 20-28 lbs. 
                                Available in Black and Silver. Made in Japan.",
                'stock' => 50,
                'imgPath' => 'Racquet/YONEX ASTROX 88 D PRO.png',
                'equipPrice' => 839.90,
            ],
            [
                'productName' => 'YONEX ASTROX 100ZZ',
                'productCategory' => 'Racquet',
                'productBrand' => 'YONEX',
                'description' => "An extra stiff racquet constructed with HM Graphite, Namd, Tungsten, Black Micro Core, and Nanometric for maximum power and control. 
                                The shaft is made of HM Graphite and Namd for enhanced repulsion. 
                                Features a NEW Built-in T-Joint for improved stability. 
                                Measures 680mm (10mm longer for extended reach). 
                                Weighs 4U (Avg. 83g), with a recommended tension of 20-28 lbs. 
                                Available in Kurenai and Dark Navy. Made in Japan.",
                'stock' => 40,
                'imgPath' => 'Racquet/YONEX ASTROX 100ZZ.png',
                'equipPrice' => 899.90,
            ],
            [
                'productName' => 'LI- NING AXFORCE 100 QILIN BLACK GOLD',
                'productCategory' => 'Racquet',
                'productBrand' => 'LI- NING',
                'description' => "A stiff racquet made from Extra High Elastic Carbon Fiber with a STD High-Modulus Carbon Fiber shaft for enhanced durability and power. 
                                Features a NEW Built-in T-Joint for improved stability. 
                                Measures 680mm (10mm longer for extended reach). 
                                Weighs 4U G5, with a recommended tension of 23-31 lbs. 
                                Available in Black and Gold. Made in China.",
                'stock' => 60,
                'imgPath' => 'Racquet/LI- NING AXFORCE 100 QILIN BLACK GOLD.png',
                'equipPrice' => 980.00,
            ],
            [
                'productName' => 'LI- NING BLADE X 700 BLUE',
                'productCategory' => 'Racquet',
                'productBrand' => 'LI- NING',
                'description' => "A stiff racquet made from carbon fiber, featuring a hard flexible shaft for balanced power and control.
                                Equipped with a Built-in T-Joint for enhanced stability.
                                Measures 675mm in length. 
                                Weighs 3U G5, with a recommended tension of 23-31 lbs.
                                Available in Blue. Made in China.",
                'stock' => 30,
                'imgPath' => 'Racquet/LI- NING BLADE X 700 BLUE.png',
                'equipPrice' => 729.00,
            ],
            [
                'productName' => 'VICTOR IRON MAN METALLIC MA-IRONMAN',
                'productCategory' => 'Racquet',
                'productBrand' => 'VICTOR',
                'description' => "A stiff racquet constructed with High Resilience Modulus Graphite, Nano Resin, Metallic Carbon Fiber, 
                                and Hard Cored Technology for enhanced durability and responsiveness. 
                                The shaft is made of High Resilience Modulus Graphite and Nano Resin for improved repulsion.
                                Features a Built-in T-Joint for better stability. 
                                Measures 675mm in length. Weighs 4U G5, with a recommended tension of 22-28 lbs. 
                                Available in Red. Made in Taiwan.",
                'stock' => 45,
                'imgPath' => 'Racquet/VICTOR IRON MAN METALLIC GB D Badminton Racket MA.png',
                'equipPrice' => 1050.00,
            ],
            [
                'productName' => 'VICTOR MJOLNIR METALLIC MA-MJOLNIR',
                'productCategory' => 'Racquet',
                'productBrand' => 'VICTOR',
                'description' => "A stiff racquet made from High Resilience Modulus Graphite, Metallic Carbon Fiber, and Hard Cored Technology
                                for enhanced power and durability. The shaft features High Resilience Modulus Graphite with a 6.8mm diameter for improved flexibility and control.
                                Equipped with a Built-in T-Joint for better stability.
                                Measures 675mm in length. Weighs 4U G6, with a recommended tension of 22-30 lbs. 
                                Available in Blue. Made in Taiwan.",
                'stock' => 65,
                'imgPath' => 'Racquet/VICTOR MJOLNIR METALLIC Limited Racket Badminton Racket MA-MJOLNIR.png',
                'equipPrice' => 950.00,
            ],

            //Shuttlecock
            [
                'productName' => 'YONEX AEROSENSA 50',
                'productCategory' => 'Shuttlecock',
                'productBrand' => 'YONEX',
                'description' => "YONEX AEROSENSA shuttlecocks are the official shuttlecock for the world’s leading international",
                'stock' => 150,
                'imgPath' => 'Shuttlecock/YONEX AEROSENSA 50.png',
                'equipPrice' => 126.00,
            ],
            [
                'productName' => 'YONEX MAVIS 2000',
                'productCategory' => 'Shuttlecock',
                'productBrand' => 'YONEX',
                'description' => "Designed to be the ultimate practice and tournament shuttlecock for club players",
                'stock' => 30,
                'imgPath' => 'Shuttlecock/YONEX MAVIS 2000.png',
                'equipPrice' => 64.90,
            ],
            [
                'productName' => 'LI- NING C80',
                'productCategory' => 'Shuttlecock',
                'productBrand' => 'LI- NING',
                'description' => "Recommended Ball Amateur Competitions, Flight Stabilization, Clear Ball Feel",
                'stock' => 30,
                'imgPath' => 'Shuttlecock/LI- NING C60.png',
                'equipPrice' => 89.00,
            ],
            [
                'productName' => 'LI- NING G600',
                'productCategory' => 'Shuttlecock',
                'productBrand' => 'LI- NING',
                'description' => "Professional Choice, Natural Cork Ball Head, Flight Resistance, Precise Direction, Comfortable Feel",
                'stock' => 85,
                'imgPath' => 'Shuttlecock/LI- NING G600.png',
                'equipPrice' => 119.00,
            ],
            [
                'productName' => 'VICTOR MASTER NO.1',
                'productCategory' => 'Shuttlecock',
                'productBrand' => 'VICTOR',
                'description' => "3 Layers Cork Head, Approved by BWF for International Play, Speed 77",
                'stock' => 50,
                'imgPath' => 'Shuttlecock/VICTOR MASTER NO.1.png',
                'equipPrice' => 115.00,
            ],
            [
                'productName' => 'VICTOR GOLD 77 Speed',
                'productCategory' => 'Shuttlecock',
                'productBrand' => 'VICTOR',
                'description' => "Composite Cork, Speed 77",
                'stock' => 35,
                'imgPath' => 'Shuttlecock/VICTOR GOLD 77 Speed.png',
                'equipPrice' => 73.00,
            ],
            //Bags
            [
                'productName' => 'YONEX LIMITED PRO TOURNAMENT BAG',
                'productCategory' => 'Bags',
                'productBrand' => 'YONEX',
                'description' => "A stylish and eco-friendly racquet bag available in White, Navy, and Red. Designed for sustainability, it is made with more than 70% recycled polyester. Dimensions: 75 x 20 x 33 cm, offering ample storage for racquets and gear.",
                'stock' => 25,
                'imgPath' => 'Bags/YONEX LIMITED PRO TOURNAMENT BAG.png',
                'equipPrice' => 589.00,
            ],
            [
                'productName' => 'YONEX PRO TROLLEY BAG',
                'productCategory' => 'Bags',
                'productBrand' => 'YONEX',
                'description' => "A spacious and durable racquet bag available in White, Navy, and Red. Features a zipper closure for secure storage. Dimensions: 80 x 36 x 34 cm, providing ample space for racquets and other gear.",
                'stock' => 7,
                'imgPath' => 'Bags/YONEX PRO TROLLEY BAG.png',
                'equipPrice' => 779.90,
            ],
            [
                'productName' => 'LI- NING TOURNAMENT- ABJT049-1',
                'productCategory' => 'Bags',
                'productBrand' => 'LI- NING',
                'description' => "A premium black racquet bag made from high-quality polyester with vinyl appointments. Features foam-insulated sides for added protection. Designed with two main compartments: one spacious section for 6+ racquets and another for essentials like shuttles, grips, wallets, phones, and more. Built with precision-reinforced stitching for durability and fine attention to detail. Dimensions: 75 x 25 x 34 cm.",
                'stock' => 2,
                'imgPath' => 'Bags/LI- NING TOURNAMENT- ABJT049-1.png',
                'equipPrice' => 699.00,
            ],
            [
                'productName' => 'LI- NING 6-IN-1 RACQUET BAG- ABJT011-2',
                'productCategory' => 'Bags',
                'productBrand' => 'LI- NING',
                'description' => "A high-quality racquet bag available in White and Blue, designed for racquet sports enthusiasts. Offers ample space for up to 6 racquets, with dedicated compartments for shoes, water bottles, and personal items. Features a sleek and modern design that combines functionality with style. Dimensions: 72 x 24 x 30 cm.",
                'stock' => 12,
                'imgPath' => 'Bags/LI- NING 6-IN-1 RACQUET BAG- ABJT011-2.png',
                'equipPrice' => 359.00,
            ],
            [
                'productName' => 'VICTOR x CRAYON SHINCHAN BR5601CS-E',
                'productCategory' => 'Bags',
                'productBrand' => 'VICTOR',
                'description' => "A versatile yellow racquet bag made from durable polyester. Features a multi-functional front organizer for accessories, a professional independent shoe compartment for convenient and tidy storage, and a dedicated racquet compartment to securely hold and organize gear. Dimensions: 75 x 20 x 32 cm.",
                'stock' => 10,
                'imgPath' => 'Bags/VICTOR x CRAYON SHINCHAN BR5601CS-E.png',
                'equipPrice' => 389.00,
            ],
            [
                'productName' => 'VICTOR BACKPACK BADMINTON BAG BR7007',
                'productCategory' => 'Bags',
                'productBrand' => 'VICTOR',
                'description' => "A durable racquet bag available in Black and Blue, made from high-quality polyester for long-lasting use. Spacious design with dimensions 37 x 33 x 74 cm, providing ample storage for racquets and gear.",
                'stock' => 17,
                'imgPath' => 'Bags/VICTOR BACKPACK BADMINTON BAG BR7007.png',
                'equipPrice' => 309.00,
            ],
            //Footwear
            [
                'productName' => 'YONEX POWER CUSHION ECLIPSION Z WIDE',
                'productCategory' => 'Footwear',
                'productBrand' => 'YONEX',
                'description' => "A high-performance badminton shoe available in White and Black, crafted with Synthetic Fiber and Synthetic Resin for durability. Features a Rubber Sole for excellent grip. Equipped with advanced technologies like Power Cushion for superior shock absorption, Double Raschel Mesh for breathability, Durable Skin Light for a lightweight feel, Power Graphite Sheet for stability, and Feather Bounce Foam for enhanced responsiveness on the court.",
                'stock' => 23,
                'imgPath' => 'Footwear/YONEX POWER CUSHION ECLIPSION Z WIDE.png',
                'equipPrice' => 519.90,
            ],
            [
                'productName' => 'YONEX POWER CUSHION COMFORT Z',
                'productCategory' => 'Footwear',
                'productBrand' => 'YONEX',
                'description' => "A lightweight and high-performance badminton shoe in Mint, made with Synthetic Fiber and Synthetic Resin for durability. Features a Rubber Sole for excellent traction. Equipped with Power Cushion for shock absorption, Double Raschel Mesh for breathability, Durable Skin Light for a lightweight feel, Power Graphite Sheet for stability, msLITE X for enhanced agility, and Feather Bounce Foam for superior responsiveness on the court.",
                'stock' => 32,
                'imgPath' => 'Footwear/YONEX POWER CUSHION COMFORT Z.png',
                'equipPrice' => 569.00,
            ],
            [
                'productName' => 'LI- NING SAGA II LITE- AYTT003-3',
                'productCategory' => 'Footwear',
                'productBrand' => 'LI- NING',
                'description' => "A stylish and high-performance badminton shoe in White and Yellow, made with Synthetic Fiber and Synthetic Resin for durability. Features a Rubber Sole for excellent grip and stability. Designed for modern players, the Li-Ning SAGA II LITE enhances both style and performance, providing a superior on-court experience.",
                'stock' => 6,
                'imgPath' => 'Footwear/LI- NING SAGA II LITE- AYTT003-3.png',
                'equipPrice' => 499.00,
            ],
            [
                'productName' => 'LI- NING THUNDER CLOUD- AYAS028-4',
                'productCategory' => 'Footwear',
                'productBrand' => 'LI- NING',
                'description' => "A breathable and comfortable badminton shoe in White Congo Red, made with Synthetic Fiber and Synthetic Resin for durability. Features a Rubber Sole for excellent traction. Designed with multiple ventilation holes on the upper for high breathability, ensuring cool and dry feet during intense gameplay.",
                'stock' => 12,
                'imgPath' => 'Footwear/LI- NING THUNDER CLOUD- AYAS028-4.png',
                'equipPrice' => 799.00,
            ],
            [
                'productName' => 'VICTOR P9200 HANG- C',
                'productCategory' => 'Footwear',
                'productBrand' => 'VICTOR',
                'description' => "A durable and high-performance badminton shoe in White, made with Microfiber PU Leather, V-Tough, and Double Mesh for enhanced durability and breathability. Features VSR Rubber for superior grip and traction. Equipped with Light Shock, Light Resilient EVA, EnergyMax 3.0, TPU, and Carbon Power for excellent cushioning, stability, and energy return. Available in sizes 255mm to 280mm.",
                'stock' => 21,
                'imgPath' => 'Footwear/VICTOR P9200 HANG- C.png',
                'equipPrice' => 619.00,
            ],
            [
                'productName' => 'VICTOR x CRAYON SHINCHAN Badminton Shoes A39CS',
                'productCategory' => 'Footwear',
                'productBrand' => 'VICTOR',
                'description' => "A lightweight and durable badminton shoe in White, made with PU Leather and Double Mesh for breathability and comfort. Features a Rubber Sole for excellent grip. Equipped with EVA, EnergyMax 3.0, and TPU for superior cushioning, stability, and energy return. Available in sizes 220mm to 300mm.",
                'stock' => 8,
                'imgPath' => 'Footwear/VICTOR x CRAYON SHINCHAN Badminton Shoes A39CS.png',
                'equipPrice' => 449.00,
            ],
            //Apparel
            [
                'productName' => 'YONEX MEN’S T-SHIRT 16634EX CLEAR RED',
                'productCategory' => 'Apparel',
                'productBrand' => 'YONEX',
                'description' => "A lightweight and durable badminton outfit in Red, made from 100% Polyester for breathability and comfort during gameplay.",
                'stock' => 32,
                'imgPath' => 'Apparel/YONEX MEN’S T-SHIRT 16634EX CLEAR RED.png',
                'equipPrice' => 132.90,
            ],
            [
                'productName' => 'YONEX MALAYSIA MASTER 2024 T-SHIRT 2842',
                'productCategory' => 'Apparel',
                'productBrand' => 'YONEX',
                'description' => "A lightweight and breathable badminton outfit in White, made from 100% Polyester for comfort and durability during gameplay.",
                'stock' => 22,
                'imgPath' => 'Apparel/YONEX MALAYSIA MASTER 2024 T-SHIRT 2842.png',
                'equipPrice' => 64.90,
            ],
            [
                'productName' => 'YONEX MEN’S SLEEVELESS TOP 10497EX',
                'productCategory' => 'Apparel',
                'productBrand' => 'YONEX',
                'description' => "A flexible and breathable badminton outfit in Blue, made from 88% Polyester and 12% Polyurethane, offering durability, comfort, and enhanced mobility during gameplay",
                'stock' => 30,
                'imgPath' => 'Apparel/YONEX MEN’S SLEEVELESS TOP 10497EX.png',
                'equipPrice' => 229.00,
            ],
            [
                'productName' => 'LI-NING MEN’S COMPETITION- AAYT073-5',
                'productCategory' => 'Apparel',
                'productBrand' => 'LI- NING',
                'description' => "A lightweight and breathable badminton outfit in Yellow, made from 100% Polyester for comfort and durability during gameplay.",
                'stock' => 5,
                'imgPath' => 'Apparel/LI-NING MEN’S COMPETITION- AAYT073-5.png',
                'equipPrice' => 299.00,
            ],
            [
                'productName' => 'VICTOR T- SHIRT T-40008',
                'productCategory' => 'Apparel',
                'productBrand' => 'VICTOR',
                'description' => "A lightweight and breathable badminton outfit in Green, made from 100% Polyester for comfort and durability during gameplay.",
                'stock' => 13,
                'imgPath' => 'Apparel/VICTOR T- SHIRT T-40008.png',
                'equipPrice' => 93.00,
            ],
            [
                'productName' => 'VICTOR T- SHIRT T-40012',
                'productCategory' => 'Apparel',
                'productBrand' => 'VICTOR',
                'description' => "A lightweight and breathable badminton outfit in White, made from 100% Polyester for comfort and durability during gameplay.",
                'stock' => 25,
                'imgPath' => 'Apparel/VICTOR T- SHIRT T-40012.png',
                'equipPrice' => 93.00,
            ],
            //Accessories
            [
                'productName' => 'YONEX CUSHION WRAP',
                'productCategory' => 'Accessories',
                'productBrand' => 'YONEX',
                'description' => "Non-slip performance with maximum absorbency",
                'stock' => 20,
                'imgPath' => 'Accessories/YONEX CUSHION WRAP.png',
                'equipPrice' => 31.00,
            ],
            [
                'productName' => 'LI-NING TEAM WRISTBAND-RED-AHWE260-2',
                'productCategory' => 'Accessories',
                'productBrand' => 'LI- NING',
                'description' => "The Li-Ning GP24 is an optimal match for your grip requirements as it is ultra-light, durable, and provides extra support to your palms. Its base material is polyurethane, has a tacky texture, and is ideal for those with a dry palm. In addition, this over grip uses the classic anti-slip technology and is designed so that the racket perfectly locks in your hand.",
                'stock' => 10,
                'imgPath' => 'Accessories/LI-NING TEAM WRISTBAND-RED-AHWE260-2.png',
                'equipPrice' => 15.00,
            ],
            [
                'productName' => 'VICTOR Badminton Grip Powder AC018',
                'productCategory' => 'Accessories',
                'productBrand' => 'VICTOR',
                'description' => "A high-performance grip powder designed with anti-slip properties to enhance racket handling and control. Made from Polyurethane and EVA, it absorbs moisture and provides a secure grip for improved performance during gameplay.",
                'stock' => 50,
                'imgPath' => 'Accessories/VICTOR Badminton Grip Powder AC018.png',
                'equipPrice' => 21.90,
            ],
            

        ];

        foreach ($products as $data) {
            $product = Product::updateOrCreate([
                'productName' => $data['productName'],
                'productCategory' => $data['productCategory'],
                'productBrand' => $data['productBrand'],
            ]);

            ProductDetail::updateOrCreate([
                'product_id' => $product->id,
                'description' => $data['description'],
                'stock' => $data['stock'],
                'imgPath' => $data['imgPath'],
                'equipPrice' => $data['equipPrice'],
            ]);
        }
    }
}
