<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use Log;

class RecipeController extends Controller
{
  // only authenticated users can access these methods (since they are for personal recipes only)
  public function __construct()
  {
    $this->middleware('auth');
  }


  public function getAll()
  {
    $data = Recipe::where('user_id', Auth::id())->get();
    return response()->json($data, 200);
  }

  public function create(Request $request)
  {
    // dd(Auth::id());
    $data['name'] = $request['name'];
    $data['body'] = $request['body'];
    $data['cuisine'] = $request['cuisine'];
    $data['user_id'] = Auth::id();
    Recipe::create($data);
    return response()->json([
      'message' => "Successfully created",
      'success' => true
    ], 200);
  }

  public function delete($id)
  {
    $res = Recipe::where('id', $id)->where('user_id', Auth::id())->delete(); //->where('user_id', Auth::id()))
    return response()->json([
      'message' => "Delete request accepted",
      'success' => true
    ], 200);
  }

  public function get($id)
  {
    $data = Recipe::find($id);
    return response()->json($data, 200);
  }

  public function update(Request $request, $id)
  {
    $data['name'] = $request['name'];
    $data['body'] = $request['body'];
    $data['cuisine'] = $request['cuisine'];
    Recipe::find($id)->update($data);
    return response()->json([
      'message' => "Successfully updated",
      'success' => true
    ], 200);
  }
}
