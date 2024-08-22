<?php

namespace Abbas\CrudModule;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Abbas\CrudModule\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('CrudModule::index', [
			'products' => Product::with('user')->latest()->get(),
		]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('CrudModule::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
			'description' => 'string|max:300',
			'price' => 'required|numeric',
        ]);
 
        $request->user()->products()->create($validated);
 
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        Gate::authorize('update', $product);
		
		return view('CrudModule::edit', [
			'product' => $product,
		]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        Gate::authorize('update', $product);
 
        $validated = $request->validate([
            'name' => 'required|string|max:100',
			'description' => 'string|max:300',
			'price' => 'required|numeric',
        ]);
 
        $product->update($validated);
 
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        Gate::authorize('delete', $product);
 
        $product->delete();
 
        return redirect(route('products.index'));
    }
}
