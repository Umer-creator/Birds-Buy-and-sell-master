<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;


class AdminStoreController extends Controller
{

    public function index()
    {
        if (Auth::user()->seller_status) {
            return redirect()->back();
        } else {
            return view("admin.store.create_store");
        }
    }

    public function store()
    {
        $store = Store::where('seller_id', Auth::user()->id)->get();
        return view("admin.store.view-admin-store", ['storee' => $store]);
    }

    public function create_store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:stores',
            'slug' => 'required|unique:stores',
            'description' => 'required:stores',
            'phone' => 'required|unique:stores',
            'email' => 'required|unique:stores',
            "stripeSecretKey" => 'required',
            'city' => 'required',
            'address' => 'required',
            'image' => 'required|mimes:jpeg,png,gif,jpg',
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

            $store = new Store;
            $user = User::find(Auth::user()->id);
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
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = "uploads/store/" . time() . "." . $ext;
                $file->move('uploads\store', $filename);
                $store->image = $filename;
            }
            $store->approved = true;
            $store->status = true;
            $store->save();
            $user->seller_status = true;
            $user->update();
            return redirect()->route('admin.dashboard');
            // return redirect()->back()->with('success', 'store created successfully');
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

    public function approvedStores()
    {
        $stores = Store::where('seller_id', '!=', Auth::user()->id)
            ->where('approved', true)
            ->get();
        return view("admin.store.view-sellers-stores", compact("stores"));
    }

    public function deleteSellerStore($id)
    {
        if ($id) {
            $store = Store::find($id);
            if ($store) {
                echo $store->id;
                $user = User::find($store->seller_id);
                $user->seller_status = false;
                $user->update();
                $store->delete();
                return redirect()->back()->with('success', 'Store deleted successfully');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public  function notApprovedStores()
    {
        $stores = Store::where('seller_id', '!=', Auth::user()->id)
            ->where('approved', false)
            ->get();
        return view("admin.store.view-sellers-stores", compact("stores"));
    }

    public function viewSellerStore($id)
    {
        if ($id) {
            $store = Store::find($id);
            return view("admin.store.view-seller-store", compact('store'));
        } else {
            return redirect()->back();
        }
    }


    public function approveSellerStore(Request $request)
    {
        $request->validate([
            'store_id' => 'required',
            'status' => "required"
        ]);



        $store = Store::find($request->store_id);
        $user = User::find($store->user->id);
        if ($request->status == 1) {
            $user->seller_status = true;
            $store->approved = $request->status;

            $store->update();
            $user->update();
            return redirect()->back()->with("success", "Store Approved Successfully");
        } else {
            $store->delete();
            return redirect()->route("admin.notApproved.stores");
        }
    }


    public function adminStoreSettings()
    {
        return view("admin.store.admin-store-settings");
    }

    public function adminStoreUpdate(Request $request)
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
}
