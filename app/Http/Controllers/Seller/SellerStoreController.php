<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class SellerStoreController extends Controller
{
    public function index()
    {
        return view("seller.dashboard");
    }



    public function sellerStoreUpdate(Request $request)

    {
        $storeId = Auth::user()->store->id;
        $request->validate([
            'name' => 'required|unique:stores,name,' .  $storeId,
            'slug' =>  'required|unique:stores,slug,' .  $storeId,
            'description' => 'required:stores',
            'phone' => 'required|unique:stores,phone,' . $storeId,
            'email' => 'required|unique:stores,email,' . $storeId,
            "stripeSecretKey" => 'required',
            'city' => 'required',
            'address' => 'required',

        ]);

        $client = new Client();

        try {
            $response = $client->request('GET', 'https://eu1.locationiq.com/v1/search.php', [
                'query' => [
                    'key' => env('LOCATION_IQ_API_KEY'),
                    'q' => $request->address,
                    'format' => 'json'
                ]
            ]);
            $json = json_decode($response->getBody(), true);
            echo $json[0]['lat'];
            echo $json[0]['lon'];

            $store = Store::find(Auth::user()->store->id);
            $store->name = $request->name;
            $store->slug = $request->slug;
            $store->description = $request->description;
            $store->email = $request->email;
            $store->phone = $request->phone;
            $store->city = $request->city;
            $store->address = $request->address;
            $store->latitude = $json[0]['lat'];
            $store->longitude = $json[0]['lon'];
            $store->seller_id = Auth::user()->id;
            $store->address = $request->address;
            $store->stripeSecretKey = $request->stripeSecretKey;
            $store->update();


            return redirect()->back()->with('success', 'Store Settings Updated successfully');
        } catch (RequestException   $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $body = $response->getBody();
                $contents = $body->getContents();
                $data = json_decode($contents, true);
                echo $data['error'];
                return redirect()->back()->with('error', $data['error']);
            } else {
                echo $e->getMessage();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }






    public function storeProfileEdit()
    {
        return view("seller.profile.store-profile");
    }

    public function storeProfileUpdate(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg',
        ]);


        // $store = Store::where("seller_id", Auth::user()->id)->get();
        $user = User::find(Auth::user()->id);
        $store = Store::find($user->store->id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = "uploads/profile/" . time() . "." . $ext;
            $file->move('uploads\profile', $filename);
            $store->image = $filename;
        }
        try {
            $store->update();
            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to update profile');
        }
    }

    public function sellerStoreSettings()
    {

        return view("seller.profile.seller-store-settings");
    }
}
