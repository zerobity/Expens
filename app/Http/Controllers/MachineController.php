<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Stock;
use App\Models\Product;
use App\Models\MachineProduct;
use Illuminate\Http\Request;

class MachineController extends Controller
{

    public function index($machineSlug, Request $request)
    {
        $machine = Machine::where('slug',$machineSlug)->firstOrFail();
        $products = $machine->products()->get();

        return view('shop')->with([
            'machine' => $machine,
            'products' => $products,
        ]);
    }

    public function show($machineSlug, $productSlug)
    {
        $machine = Machine::where('slug',$machineSlug)->firstOrFail();
        $product = Product::where('slug', $productSlug)->firstOrFail();
        $mightAlsoLike = $machine->products()->mightAlsoLike()->get();


        return view('product')->with([
            'machine' => $machine,
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike,
        ]);
    }

    public function rx($machineSlug, Request $request)
    {
        $machine = Machine::where('slug',$machineSlug)->firstOrFail();
        $products = MachineProduct::where('shop_id', $machine->id)->products->get();
        dd($products);

        return view('shop')->with([
            'machine' => $machine,
            'stock' => $stock,
        ]);
    }
}
