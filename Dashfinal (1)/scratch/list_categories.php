<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Category;

$categories = Category::all(['id', 'category_name']);
foreach ($categories as $cat) {
    echo $cat->id . '|' . $cat->category_name . PHP_EOL;
}
