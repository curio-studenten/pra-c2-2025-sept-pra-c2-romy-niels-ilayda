<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    // Homepage met top 10 van ALLE manuals
    public function index()
    {
        // Haal alle brands op
        $brands = Brand::orderBy('name')->get();

        // Haal top 10 populairste manuals op
        $topManuals = Manual::with('brand')
            ->orderByDesc('manualcounter') // Desc zodat hoogste eerst
            ->take(10)
            ->get();

        return view('pages.homepage', compact('brands', 'topManuals'));
    }

    // NIEUW: Alle merken pagina met alfabetisch overzicht
    public function allBrands()
    {
        // Haal alle merken op, gesorteerd op naam
        $brands = Brand::orderBy('name')->get();

        // Groepeer merken per eerste letter
        $brandsByLetter = $brands->groupBy(function($brand) {
            return strtoupper(substr($brand->name, 0, 1));
        });

        // Maak een array van alle letters die voorkomen
        $availableLetters = $brandsByLetter->keys()->sort()->toArray();

        return view('pages.brands_list', [
            'brandsByLetter' => $brandsByLetter,
            'availableLetters' => $availableLetters
        ]);
    }

    // Merk pagina met ALLE manuals + top 5 van dat merk
    public function show($brand_id, $brand_slug)
    {
        $brand = Brand::findOrFail($brand_id);

        // ALLE manuals van dit merk
        $manuals = Manual::where('brand_id', $brand_id)
            ->orderBy('name')
            ->get();

        // Top 5 populairste manuals van dit merk
        $topManuals = Manual::where('brand_id', $brand_id)
            ->orderByDesc('manualcounter') // Hoogste eerst
            ->take(5)
            ->get();

        return view('pages.manual_list', compact('brand', 'manuals', 'topManuals'));
    }
}
