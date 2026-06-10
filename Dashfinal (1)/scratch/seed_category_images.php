<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Category;

$updates = [
    49 => 'uploads/categories/cat_49.png',
    51 => 'uploads/categories/cat_51.png',
    71 => 'uploads/categories/cat_71.png',
    65 => 'uploads/categories/cat_65.png',
    55 => 'uploads/categories/cat_55.png',
];

foreach ($updates as $id => $path) {
    $category = Category::find($id);
    if ($category) {
        $category->category_image = $path;
        $category->save();
        echo "Updated Category $id with $path" . PHP_EOL;
    }
}
