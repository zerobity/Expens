<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Stock;
use App\Models\Machine;
use App\Models\Product;
use App\Models\Pending;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $machine = Machine::where('id', $request->machine_id)->firstOrFail();
        $product = Product::where('id', $request->product_id)->firstOrFail();
        $lineOk = $this->productsLineAvailable($request->machine_id, $request->product_id);

        $sale = Sale::create([
            'machine_id' => $request->machine_id,
            'product_id' => $request->product_id,
            'price' => $product->price,
        ]);

        $pending = Pending::create([
            'machine_id' => $request->machine_id,
            'line' => $lineOk,
            'status' => 'Pending',
        ]);

        return redirect()->route('machine.index', ['machine' => $machine->slug]);
    }

    public function checkmp(Request $request)
    {
        $machine = Machine::where('slug',$request->machine_id)->firstOrFail();
        $stock = Stock::where('machine_id', $request->machine_id)->where('product_id', $request->product_id);

        if ($this->productsLineAvailable($request->machine_id, $request->product_id) == 0) {
            return back()->withErrors('Ups! ya no queda disponible.');
        }
        return redirect()->route('checkout.store');
    }

    // protected function setupPaymentAndGetRedirectURL(Shop $myShop, $order): string
    // {
    //     // Agrega credenciales
    //     SDK::setAccessToken( $myShop->client_Secret );
    //     SDK::setClientId( $myShop->client_Id );
    //     SDK::setClientSecret( $myShop->client_Secret );

    //     // Crea un objeto de preferencia
    //     $preference = new Preference();

    //     # Create list items objects
    //     $tax = 1+(config('cart.tax')/100);
    //     $items = [];
    //     foreach (Cart::content() as $cartItem) {
    //         $item = new Item();
    //         $item->id = $cartItem->rowId;
    //         $item->title = $cartItem->model->name;
    //         $item->description = $cartItem->model->details;
    //         $item->quantity = $cartItem->qty;
    //         $item->currency_id = 'ARS';
    //         $item->unit_price = ($cartItem->subtotal * $tax)/100;
    //         $item->picture_url = productImage($cartItem->model->image);
    //         array_push($items, $item);
    //         }
    //     $preference->items = $items;

    //     # Create a payer object
    //     $payer = new Payer();
    //     $payer->email = $order->billing_email;
    //     // $payer->id =  $order->user_id;
    //     // $payer->name = $order->billing_name;
    //     // $payer->address = $order->billing_address;
    //     // $payer->phone = $order->billing_phone;
    //     $preference->payer = $payer;

    //     # Save External Reference
    //     $preference->external_reference = $order->id;
    //     $preference->back_urls = [
    //         "success" => route('confirmation.index', $myShop->slug),
    //         "pending" => route('confirmation.pending', $myShop->slug),
    //         "failure" => route('confirmation.error', $myShop->slug),
    //     ];
    //     $preference->auto_return = "approved";
    //     $preference->notification_url = route('confirmation.notific', $myShop->slug);

    //     $preference->save();
    //     dd($preference);

    //     // return $preference->init_point;
    //     return $preference->sandbox_init_point;
    // }

    protected function productsLineAvailable($machine_id, $product_id)
    {
        $stock = Stock::where('machine_id', $machine_id)->where('product_id', $product_id)->get();
        foreach ($stock as $line) {
            if ($line->quantity > 0) {
                return $line->line;
            }
        }
        return 0;
    }

    
}
