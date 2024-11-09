<?php

namespace App\Http\Controllers;

use App\Models\Clothes;
use Illuminate\Http\Request;

class ShopingController extends Controller
{
    /**
     * Product page
     * $id -> clothes id
     */
    public function show(string $id) {
        $clothes = Clothes::query()->where('id', $id)->first();
        return view('product_page', [
            'clothes' => $clothes
        ]);
    }
}
