<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function getRestaurant(Request $request) {
        $id = $request->input('id', null);

        if (!$id) {
            return response()->json(['message' => 'Query param \'id\' is no present'], 400);
        }

        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }

        return $restaurant;
    }

    public function getCategories(Request $request)
    {
        $id = $request->input('id', null);
        if (!$id) {
            return response()->json(['message' => 'Query param \'id\' is no present'], 400);
        }

        $categories = Category::where('restaurant_id', $id)->get()->makeHidden('restaurant_id')->toArray();

        return $categories;
    }

    public function getMenu(Request $request) {
        $id = $request->input('id', null);
        if (!$id) {
            return response()->json(['message' => 'Query param \'id\' is no present'], 400);
        }

        $restaurant = Restaurant::find($id);
        if (!$restaurant) {
            return response()->json(['message' => 'Restaurant does not exists'], 404);
        }

        $products = Product::with('category')->where('restaurant_id', $id);

        $category_id = $request->input('category_id', null);
        if ($category_id) {
            $products = $products->where('category_id', $category_id);
        }

        $query = $request->input('queryName', null);
        if ($query) {
            $products = $products->where('name', 'like', '%' . $query . '%');
        }

        $products = $products->get()->makeHidden(['category_id', 'restaurant_id'])->toArray();

        return $products;
    }

    public function getSearchMenu(Request $request)
    {
        $id = $request->input('id', null);
        if (!$id) {
            return response()->json(['message' => 'Query param \'id\' is no present'], 400);
        }

        $query = $request->input('query', null);
        if (!$query) {
            return response()->json(['message' => 'Query param \'query\' is no present'], 400);
        }

        $products = Product::where([['restaurant_id', $id], []])->get()
            ->makeHidden('restaurant_id')->toArray();

        return $products;
    }

    public function secret() {
        $user = \Auth::user();

        return 'Hello ' . $user->email;
    }
}
