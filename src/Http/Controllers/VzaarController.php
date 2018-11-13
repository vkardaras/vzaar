<?php

namespace Vkardaras\Vzaar\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vkardaras\Vzaar\Models\Vzaar;
use Vkardaras\Vzaar\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

use VzaarApi;

class VzaarController extends Controller
{
    public function __construct()
    {

        VzaarApi\Client::$client_id = config('vzaar.client_id');
        VzaarApi\Client::$auth_token = config('vzaar.auth_token');

        // uncomment if you want to target local environment
        // VzaarApi\Client::$url = 'http://app.vzaar.localhost/api';

        //outputs equest/response details
        //VzaarApi\Client::$VERBOSE = true;

        // Update these values to match ones from your own account.
        $category_id = 3206;
        $encoding_preset_id = 3;
        $default_ingest_recipe = 67;
        $other_ingest_recipe = 73;
    }
    
    public function index() 
    {
    	return view('vzaar::stream');
    }

    public function videos() 
    {

        $videos = collect();

        foreach (VzaarApi\VideosList::each_item() as $video) 
        {
            $temp = collect(['id'=>$video->id,'title'=>$video->title]);


            $videos->push($temp);
        }

        return view('vzaar::videos', compact('videos'));
    }

    // public function send(Request $request)
    // {
    // 	Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message, $request->name));

    // 	Vzaar::create($request->all());

    // 	return redirect(route('contact'));
    // }
}
