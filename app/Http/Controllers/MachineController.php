<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Pending;
use App\Models\MachineProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function rx($machineSlug, $password)
    {
        $machine = Machine::where('slug',$machineSlug)->firstOrFail();
        $hash = Hash::make($password);
        if (Hash::check($password, $machine->password)) {
            # code...
            $pending = Pending::where('machine_id', $machine->id)->firstOrFail();
            return '##'.$pending->line.'##';
        }
        return 0;
    }
}
