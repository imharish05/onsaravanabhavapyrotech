<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Category;

$updates = [
    // Combo Packs / Gift Boxes
    42 => 'uploads/categories/gift_boxes.png',
    73 => 'uploads/categories/gift_boxes.png',
    
    // Bombs / Crackers
    43 => 'uploads/categories/bombs.png',
    45 => 'uploads/categories/bombs.png',
    46 => 'uploads/categories/bombs.png',
    47 => 'uploads/categories/bombs.png',
    48 => 'uploads/categories/bombs.png',
    
    // Bijili
    44 => 'uploads/categories/bijili.png',
    
    // Fancy Wheels / Novelties
    50 => 'uploads/categories/fancy_wheels.png',
    60 => 'uploads/categories/fancy_wheels.png',
    
    // Pencils / Twinkling Stars
    52 => 'uploads/categories/pencils.png',
    53 => 'uploads/categories/pencils.png',
    57 => 'uploads/categories/pencils.png',
    
    // Kids Novelties
    54 => 'uploads/categories/kids_novelties.png',
    56 => 'uploads/categories/kids_novelties.png',
    58 => 'uploads/categories/kids_novelties.png',
    61 => 'uploads/categories/kids_novelties.png',
    
    // Peacock Fountain
    59 => 'uploads/categories/peacock_fountain.png',
    
    // Aerial Shots (id 65 image already used)
    62 => 'uploads/categories/cat_65.png',
    63 => 'uploads/categories/cat_65.png',
    64 => 'uploads/categories/cat_65.png',
    66 => 'uploads/categories/cat_65.png',
    67 => 'uploads/categories/cat_65.png',
    68 => 'uploads/categories/cat_65.png',
    69 => 'uploads/categories/cat_65.png',
    
    // Matches
    70 => 'uploads/categories/matches.png',
    
    // Caps and Gun
    72 => 'uploads/categories/caps_gun.png',
];

foreach ($updates as $id => $path) {
    $category = Category::find($id);
    if ($category) {
        $category->category_image = $path;
        $category->save();
        echo "Updated Category $id with $path" . PHP_EOL;
    }
}
