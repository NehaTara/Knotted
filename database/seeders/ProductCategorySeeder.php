<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weddingCategories = array(
            "Venues" => array("Hotels", "Banquet Halls", "Gardens", "Beaches"),
            "Catering" => array("Buffet", "Plated Meals", "Food Trucks", "Desserts"),
            "Photography & Videography" => array("Photographers", "Videographers", "Photo Booths"),
            "Attire" => array("Wedding Dresses", "Suits & Tuxedos", "Bridal Accessories"),
            "Decor & Rentals" => array("Florists", "Event Rentals", "Lighting"),
            "Entertainment" => array("Live Bands", "DJs", "Musicians", "Dancers"),
            "Transportation" => array("Limousines", "Vintage Cars", "Horse Carriages"),
            "Planning & Coordination" => array("Wedding Planners", "Day-of Coordinators"),
            "Beauty & Health" => array("Hair Stylists", "Makeup Artists", "Spa Services"),
            "Stationery" => array("Invitations", "Save-the-Dates", "Programs", "Thank You Cards"),
            "Gifts & Favors" => array("Wedding Favors", "Gift Registries", "Gift Wrapping"),
            "Technology & Innovation" => array("Wedding Websites", "Mobile Apps", "Virtual Reality"),
            "Miscellaneous" => array("Honeymoon Packages", "Legal Services", "Pet Care"),
        );

        foreach ($weddingCategories as $categoryName => $services) {
            $category = \App\Models\ProductCategory::create([
                'name' => $categoryName,
                'slug' => \Illuminate\Support\Str::slug($categoryName),
            ]);

            foreach ($services as $serviceName) {
                \App\Models\ProductCategory::create([
                    'name' => $serviceName,
                    'slug' => \Illuminate\Support\Str::slug($serviceName),
                    'parent_id' => $category->id,
                ]);
            }
        }
    }
}
