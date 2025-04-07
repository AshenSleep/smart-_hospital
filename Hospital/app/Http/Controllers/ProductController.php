<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getExpensiveProducts()
    {
        
        $products = Product::all();
        return response()->json($products);
    }

    public function updatePrices(Request $request)
    {
        $increaseColor = $request->input('increaseColor');
        $decreaseColor = $request->input('decreaseColor');
        $errorMessage = '';

        // Проверка наличия товаров с данным цветом для повышения цен
        $increaseProducts = Product::where('color', $increaseColor)->get();
        if ($increaseProducts->isEmpty()) {
            $errorMessage .= "Товара с цветом $increaseColor для повышения цены нет. ";
        } else {
            // Логика повышения цен
            Product::where('color', $increaseColor)->update(['price' => \DB::raw('price * 1.1')]);
        }

        // Проверка наличия товаров с данным цветом для понижения цен
        $decreaseProducts = Product::where('color', $decreaseColor)->get();
        if ($decreaseProducts->isEmpty()) {
            $errorMessage .= "Товара с цветом $decreaseColor для понижения цены нет.";
        } else {
            // Логика понижения цен
            Product::where('color', $decreaseColor)->update(['price' => \DB::raw('price * 0.9')]);
        }

        // Если есть ошибки, выводим их, иначе сообщение об успешном обновлении
        if ($errorMessage) {
            return response()->json(['error' => $errorMessage]);
        }

        return response()->json(['message' => 'Цены обновлены успешно!']);
    }
}
