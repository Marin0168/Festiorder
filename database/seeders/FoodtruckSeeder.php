<?php

namespace Database\Seeders;

use App\Models\Foodtruck;
use Illuminate\Database\Seeder;

class FoodtruckSeeder extends Seeder
{
    public function run(): void
    {
        $foodtrucks = [
            [
                'name' => 'Spice Route',
                'slug' => 'spice-route',
                'description' => 'Streetfood klassiekers met een pittige twist.',
                'products' => [
                    ['name' => 'Loaded Fries', 'description' => 'Knapperige friet met jalapeño en cheddarsaus.', 'price' => 7.50],
                    ['name' => 'Tandoori Wrap', 'description' => 'Gegrilde kip met frisse yoghurt en koriander.', 'price' => 8.50],
                    ['name' => 'Spicy Veggie Bowl', 'description' => 'Groenten, rijst en chili crunch.', 'price' => 9.00],
                    ['name' => 'Mango Lassi', 'description' => 'Zoete yoghurtdrank met mango.', 'price' => 4.50],
                    ['name' => 'Masala Fries', 'description' => 'Friet met masalakruiden en saus.', 'price' => 6.00],
                ],
            ],
            [
                'name' => 'BBQ Brothers',
                'slug' => 'bbq-brothers',
                'description' => 'Low & slow smoked barbecue favorieten.',
                'products' => [
                    ['name' => 'Pulled Pork Bun', 'description' => 'Gerookte pulled pork op brioche.', 'price' => 9.50],
                    ['name' => 'Smokey Ribs', 'description' => 'Sticky ribs met huisgemaakte saus.', 'price' => 12.00],
                    ['name' => 'Grilled Corn', 'description' => 'Maiskolf met limoensaus.', 'price' => 4.00],
                    ['name' => 'BBQ Jackfruit', 'description' => 'Vegan alternatief met rooksmaak.', 'price' => 8.50],
                    ['name' => 'Mac & Cheese', 'description' => 'Romige mac met crunchy topping.', 'price' => 6.50],
                ],
            ],
            [
                'name' => 'Fresh Fusion',
                'slug' => 'fresh-fusion',
                'description' => 'Fusion bowls en bao buns vol smaak.',
                'products' => [
                    ['name' => 'Korean Bao', 'description' => 'Bao met bulgogi beef en kimchi.', 'price' => 7.00],
                    ['name' => 'Poké Bowl', 'description' => 'Verse zalm, rijst en crunchy toppings.', 'price' => 11.00],
                    ['name' => 'Crispy Tofu Bowl', 'description' => 'Tofu, groenten en sesamsaus.', 'price' => 9.50],
                    ['name' => 'Thai Iced Tea', 'description' => 'Ijsthee met gecondenseerde melk.', 'price' => 4.00],
                    ['name' => 'Yuzu Lemonade', 'description' => 'Frisse citrus lemonade.', 'price' => 3.50],
                ],
            ],
        ];

        foreach ($foodtrucks as $data) {
            $products = $data['products'];
            unset($data['products']);

            $truck = Foodtruck::create($data);

            foreach ($products as $product) {
                $truck->products()->create($product);
            }
        }
    }
}
