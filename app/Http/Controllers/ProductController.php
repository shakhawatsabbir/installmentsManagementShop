<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public $category, $product;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->product = Product::latest('id')->paginate(10);
        return view('admin.product.manage', [
            'products' => $this->product,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->category = Category::all();

        return View('admin.product.create', [
            'categories' => $this->category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::saveProduct($request);
        return back()->with('massage', 'Product create Successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }
    public function productDetails($id)
    {
        $this->product = Product::where('product_id',  $id)->first();
        return view('admin.product.product', [
            'product' =>  $this->product,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function prodctEdit($id)
    {
        $this->product = Product::where('product_id',  $id)->first();
        $this->category = Category::all();
        return view('admin.product.edit', [
            'product' =>  $this->product,
            'categories' => $this->category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function productUpdate(Request $request)
    {
        Product::updateProduct($request);

        return redirect(route('product.index'))->with('massage', 'Product update Successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }


    public function searchProductDetail(Request $request)
    {
        $this->product = Product::where('product_id', $request->product_id)->get();
        $data['product'] = $this->product;

        return response()->json($data);
    }
    public function productAddCart(Request $request)
    {
        $this->carts = Cart::instance('cart')->content();
        foreach ($this->carts as $cart) {
            if($cart->id == $request->product_id){
                return back()->with('massage',"This item alreay insert, Please delete this previous item");
            }
        }

        $this->cart = Cart::instance('cart')->add(['id' => $request->product_id,  'name' => $request->product_name,  'qty' => $request->quantity,   'price' => $request->product_price, 'weight' => 1]);

        return redirect(route('makeSale'));
    }
    public function productDeleteCart($id)
    {
        Cart::instance('cart')->remove($id);

        return redirect(route('makeSale'));
    }
}
