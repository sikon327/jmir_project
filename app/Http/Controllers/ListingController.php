<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingController extends Controller
{
    public function index(){
    	$listings = Listing::paginate(10);
    	return view('index', ['listings' => $listings]);
    }

    public function show($id){
    	$listing = Listing::find($id);
    	return view('update', ['listing' => $listing]);
    }

    public function create(Request $request){
    	$listing = new Listing;
    	$listing->name = $request->name;
    	$listing->province = $request->province;
    	$listing->telephone = $request->telephone;
    	$listing->postcode = $request->postcode;
    	$listing->salary = $request->salary;
    	$listing->save();

    	return redirect('/');
    }

    public function update(Request $request, $id){
    	$listing = Listing::findOrFail($id);
    	$listing->name = $request->name;
    	$listing->province = $request->province;
    	$listing->telephone = $request->telephone;
    	$listing->postcode = $request->postcode;
    	$listing->salary = $request->salary;
    	$listing->save();

    	return redirect('/');
    }

    public function delete(Request $request, $id){
    	$listing = Listing::findOrFail($id);
    	$listing->delete();

    	return redirect('/');
    }
}
