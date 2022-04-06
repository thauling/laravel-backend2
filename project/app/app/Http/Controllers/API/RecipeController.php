<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Recipe;
Use Log;

class RecipeController extends Controller
{
       // https://carbon.now.sh/
       public function getAll(){
        $data = Recipe::get();
        return response()->json($data, 200);
      }
  
      public function create(Request $request){
        $data['name'] = $request['name'];
        $data['body'] = $request['body'];
        $data['cuisine'] = $request['cuisine'];
        Recipe::create($data);
        return response()->json([
            'message' => "Successfully created",
            'success' => true
        ], 200);
      }
  
      public function delete($id){
        $res = Recipe::find($id)->delete();
        return response()->json([
            'message' => "Successfully deleted",
            'success' => true
        ], 200);
      }
  
      public function get($id){
        $data = Recipe::find($id);
        return response()->json($data, 200);
      }
  
      public function update(Request $request,$id){
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
