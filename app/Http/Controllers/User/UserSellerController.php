<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class UserSellerController extends Controller
{
    public  function index()
    {
        return view("user.become-a-seller");
    }
    public function becomeASeller(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:stores',
            'slug' => 'required|unique:stores',
            'description' => 'required:stores',
            'phone' => 'required|numeric|unique:stores',
            'email' => 'required|email|unique:stores',
            "stripeSecretKey" => 'required',
            'city' => 'required',
            'address' => 'required',
            'image' => 'required|mimes:jpeg',
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

            $store = new Store();
            $store->name = $request->name;
            $store->slug = $request->slug;
            $store->description = $request->description;
            $store->email = $request->email;
            $store->phone = $request->phone;
            $store->city = $request->city;
            $store->stripeSecretKey = $request->stripeSecretKey;
            $store->address = $request->address;
            $store->latitude = $json[0]['lat'];
            $store->longitude = $json[0]['lon'];
            $store->seller_id = Auth::user()->id;
            $store->address = $request->address;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = "uploads/store/" . time() . "." . $ext;
                $file->move('uploads\store', $filename);
                $store->image = $filename;
            }
            $store->save();
            return redirect()->back()->with('success', 'Your application is submited');
        } catch (RequestException  $e) {
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
