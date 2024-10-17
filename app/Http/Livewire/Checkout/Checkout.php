<?php

namespace App\Http\Livewire\Checkout;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Checkout extends Component
{
    public $name;
    public $phone;
    public $email;
    public $address;
    public $cart_products;

    //now map handle 
    public  $location;
    public $lat;
    public $long;
    public $apiSuccess = false;
    public $distance;
    public $shipping_perkm;

    protected $listeners = ['updateAddress'];

    public function updateAddress($selectedAddress)
    {
        $this->address = $selectedAddress;
    }
    public function mount()
    {
        $this->shipping_perkm = env('SHIPPING_PER_KM_RATE');
        $this->cart_products = Cart::where('user_id', Auth::id())
            ->whereHas('product', function ($query) {
                $query->where('quantity', '>', 0);
            })
            ->get();

        foreach ($this->cart_products as $cart_product) {
            $distance = 0;
            // Store the distance and shipping cost for the product
            $cart_product->distance = $distance;
            $cart_product->shipping_cost = 0;
            $cart_product->subtotal = 0;
            $cart_product->total = 0;
            $cart_product->update();
        }
        try {
            session()->forget('checkout_name');
            session()->forget('checkout_email');
            session()->forget('checkout_phone');
            session()->forget('checkout_address');
            session()->forget('shipping_perkm');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }



    public function getLonAndLat()
    {
        try {
            $client = new Client();
            $response = $client->request('GET', 'https://eu1.locationiq.com/v1/search.php', [
                'query' => [

                    'key' => env('LOCATION_IQ_API_KEY'),
                    'q' => $this->address,
                    'format' => 'json'
                ]
            ]);
            $json = json_decode($response->getBody(), true);
            $this->lat = $json[0]['lat'];
            $this->long = $json[0]['lon'];
            // Store the URL in a variable to be displayed in the view
            $this->apiSuccess = true;
        } catch (\Throwable $th) {
            $this->apiSuccess = false;
        }
    }
    public function calculateDistance($sourceLat, $sourceLng, $destLat, $destLng)
    {
        $earthRadiusKm = 6371;

        $dLat = deg2rad($destLat - $sourceLat);
        $dLng = deg2rad($destLng - $sourceLng);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($sourceLat)) * cos(deg2rad($destLat)) *
            sin($dLng / 2) * sin($dLng / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $value = $earthRadiusKm * $c;

        return $distance = round($value, 3);
    }


    public function handleSubmit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $this->getLonAndLat();
        // $this->distance = $this->calculateDistance(34.2036015, 73.282008, $this->lat, $this->long);
        if ($this->apiSuccess) {
            foreach ($this->cart_products as $cart_product) {
                // Get the quantity of the product in the cart
                $quantity = $cart_product->quantity;
                // Get the longitude and latitude of the origin address (assuming it's the product's location)
                $store = $cart_product->product->store;
                $distance = $this->calculateDistance($store->latitude, $store->longitude, $this->lat, $this->long);
                // Store the distance and shipping cost for the product
                $cart_product->distance = $distance;
                $cart_product->subtotal =  $cart_product->product->price * $quantity;
                $cart_product->shipping_cost = $distance * $quantity * $this->shipping_perkm;
                $cart_product->total = $cart_product->shipping_cost + $cart_product->subtotal;
                $cart_product->update();
                // sesion()->start();
            }
            session()->put('checkout_name', $this->name);
            session()->put('checkout_email', $this->email);
            session()->put('checkout_phone', $this->phone);
            session()->put('checkout_address', $this->address);
            session()->put('shipping_perkm', $this->shipping_perkm);
        }
    }

    public function render()
    {

        $this->cart_products = Cart::where('user_id', Auth::id())
            ->whereHas('product', function ($query) {
                $query->where('quantity', '>', 0);
            })
            ->get();

        return view('livewire.checkout.checkout');
    }
}
