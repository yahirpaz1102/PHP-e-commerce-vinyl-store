<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.index', compact('products'));
    }


    public function create()
    {
        return view('admin.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => 'required|string|max:20|unique:products',
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'full_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'audio_snippet' => 'nullable|file|mimes:mp3,wav|max:5120',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image_url'] = '/storage/' . $imagePath;
        }

        // Handle audio snippet upload
        if ($request->hasFile('audio_snippet')) {
            $audioPath = $request->file('audio_snippet')->store('audio', 'public');
            $validated['audio_snippet_url'] = '/storage/' . $audioPath;
        }

        Product::create($validated);

        return redirect()->route('admin.index')->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'sku' => 'required|string|max:20|unique:products,sku,' . $id . ',product_id',
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'full_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'audio_snippet' => 'nullable|file|mimes:mp3,wav|max:5120',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image_url && Storage::disk('public')->exists(str_replace('/storage/', '', $product->image_url))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $product->image_url));
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image_url'] = '/storage/' . $imagePath;
        }

        // Handle audio snippet upload
        if ($request->hasFile('audio_snippet')) {
            // Delete old audio if exists
            if ($product->audio_snippet_url && Storage::disk('public')->exists(str_replace('/storage/', '', $product->audio_snippet_url))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $product->audio_snippet_url));
            }

            $audioPath = $request->file('audio_snippet')->store('audio', 'public');
            $validated['audio_snippet_url'] = '/storage/' . $audioPath;
        }

        $product->update($validated);

        return redirect()->route('admin.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete image file if exists
        if ($product->image_url && Storage::disk('public')->exists(str_replace('/storage/', '', $product->image_url))) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $product->image_url));
        }

        // Delete audio file if exists
        if ($product->audio_snippet_url && Storage::disk('public')->exists(str_replace('/storage/', '', $product->audio_snippet_url))) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $product->audio_snippet_url));
        }

        $product->delete();

        return redirect()->route('admin.index')->with('success', 'Product deleted successfully!');
    }
}
