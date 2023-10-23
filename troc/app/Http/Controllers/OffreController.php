<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Notification;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id = $request->query('product');
        // $users = User::with('users')->get();
        // $products = Product::with('products')->get();
        $index = Product::findOrFail($id);
        $categories = Category::with('subcategories')->get();
        return view('frontoffice.offres.create', ['product' => $index,'categories' => $categories]);
    }

    public function showAllBackoffice()
    {
        // Retrieve all products with their subcategories
        $offres = Offre::all();

        return view('backoffice.offres.index', compact('offres'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'offre-description' => 'required|string|min:10',
            'offre-product_id' => 'required|exists:products,id',
            'offre-value' => 'required|string',
        ]);


        $offre = new Offre();
        $offre->description = $request->input('offre-description');
        $offre->value = $request->input('offre-value');


        $offre->product_id = $request->input('offre-product_id');

        $offre->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $offre->image = $imageName;
        }

        $offre->save();
        $notification = new Notification();
        $product = Product::findOrFail($offre->product_id);

        $notification->message = 'Vous avez reçu une offre pour votre produit '.$product->name;
        $notification->user_id = $product->user_id;
        $notification->save();


        return redirect()->route('products.show', ['product' => $product])->with('success', 'Offre ajoutée avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show($offre)
    {
       $index = Offre::findOrFail($offre);

        return view('frontoffice.offres.show',['offre' => $index]);
    }
    public function redirectToOffre($notification)
    {
        $index = Notification::findOrFail($notification);
        $index->lu = true;
        $index->save();
        $product = Product::findOrFail($index->product_id);
        $categories = Category::with('subcategories')->get();
        $offres = Offre::where('product_id',$product->id)->get();
        return view('frontoffice.products.show', compact('product', 'categories','offres'));
    }

    public function showBack($offre)
    {
        $offre = Offre::findOrFail($offre);

         return view('backoffice.offres.show',compact('offre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
