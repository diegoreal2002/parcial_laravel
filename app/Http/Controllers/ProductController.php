<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_available' => 'boolean',
            'expiration_date' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id', // Validar que la categoría exista
            'sku' => 'required|string|unique:product,sku|max:100',
        ]);

        // Crear nuevo producto
        $product = Product::create($validatedData);

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Utilizamos with('category') para cargar toda la información de la categoría asociada
        $product = Product::with('category')->findOrFail($id);

        // Devolvemos el producto junto con toda la información de la categoría
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Validar datos
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:150',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'is_available' => 'boolean',
            'expiration_date' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id', // Validar que la categoría exista
            'sku' => 'sometimes|required|string|max:100|unique:product,sku,' . $id,
        ]);

        // Actualizar el producto
        $product->update($validatedData);

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Eliminar el producto
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
