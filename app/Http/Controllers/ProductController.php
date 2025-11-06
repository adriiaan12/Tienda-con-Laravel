<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;


use Illuminate\Http\Request;

class ProductController extends Controller
{
public function index(Request $request) {

    $query = Product::with('company')->orderBy('name', 'asc'); 

    $sText = $request->get("text", null);

    if ($sText !== null) {
        $query->where('name', 'like', '%' . $sText . '%')
              ->orWhere('description', 'like', '%' . $sText . '%')
              ->orWhereHas('company', function (Builder $q) use ($sText) {
                  $q->where('name', 'like', '%' . $sText . '%');
              });
    }

    $aProduct = $query->paginate(10);

    if ($sText !== null) {
        $aProduct->appends(['text' => $sText]);
    }

    return view('product.index', compact('aProduct'));
}



public function show(Product $product)
{
    
    $product->load('company');

    
    return view('product.show', compact('product'));
}

public function edit(Product $product)
{
    return view('product.edit', compact('product'));    
}

public function update(Product $product, Request $request)
{
    
    $fieldValidation = $request->validate([
        'name'       => 'string|required|max:128|unique:product,name,' . $product->id,
        'company_id' => 'nullable|integer',
        'description'=> 'nullable|string',
        'price'      => 'required|numeric|min:0',
    ]);

    try {
        
        $product->name        = $fieldValidation['name'];
        $product->description = $fieldValidation['description'] ?? null;
        $product->price       = $fieldValidation['price'];

        
        $product->company_id = $request->get('company_id') ?? null;

        
        $product->save();

        
        return redirect()
            ->route('product.edit', ['product' => $product])
            ->with('sState', 'El producto se ha almacenado correctamente.');
    } 
    catch (\Exception $e) {
        
        return redirect()
            ->route('product.edit', ['product' => $product])
            ->with('sState', 'Error: ' . $e->getMessage());
    }
}

public function create()
{
    
    $product = null;
    return view('product.edit', compact('product'));

}

public function store(Request $request)
{
    $product = new Product();

    try {
        $fieldValidation = $request->validate([
            'name' => 'string|required|max:128|unique:product,name',
            'price' => 'numeric|required|min:0',
            'description' => 'nullable|string|max:255',
            'company_id' => 'required|integer|exists:company,id'
        ]);

        $product->name = $fieldValidation['name'];
        $product->price = $fieldValidation['price'];
        $product->description = $fieldValidation['description'] ?? '';
        $product->company_id = $fieldValidation['company_id'];
        $product->save();

        return redirect()->route('product.edit', ['product' => $product])
                         ->with('sState', 'El producto se ha creado correctamente.');

    } catch (\Exception $e) {
        return redirect()->route('product.create')
                         ->with('sState', 'Error: ' . $e->getMessage());
    }
}



}
