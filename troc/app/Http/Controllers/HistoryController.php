<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\History;

class HistoryController extends Controller
{
    public function addToHistory($userId, $productId)
{
    // Create a new history record and associate it with the user and product
    $history = new History(
        [
            'user_id' => $userId,
            'product_id' => $productId,
        ]
    );
    //log the history

    $history->save();

    return response()->json(['success' => true]);
}
   

public function index()
{
    // Retrieve the currently authenticated user's history
    $user = auth()->user();
    $history = $user->history;
    $productCount=$history->count();

    // Load the associated products for each history record
    $products = $history->map(function ($item) {
        return $item->product;
    });

    return view('frontoffice.history.index', compact('products', 'productCount'));
}

}
