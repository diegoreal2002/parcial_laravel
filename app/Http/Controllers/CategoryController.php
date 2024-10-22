<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    // Mostrar todas las categorías
    public function index(): JsonResponse
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    // Crear una nueva categoría
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = Category::create($request->validated());
        return response()->json($category, 201); // 201 Created
    }

    // Mostrar una categoría específica
    public function show($id): JsonResponse
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    // Actualizar una categoría existente
    public function update(UpdateCategoryRequest $request, $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());
        return response()->json($category);
    }

    // Eliminar una categoría
    public function destroy($id): JsonResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(null, 204); // 204 No Content
    }
}
