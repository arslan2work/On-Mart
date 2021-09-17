<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function home(){
        $banners = Banner::where(['status'=>'active', 'condition'=> 'banner'])->orderBy('id','DESC')->limit('5')->get();
        
        $categories = Category::where(['status'=>'active', 'is_parent'=> 1])->orderBy('id','DESC')->limit('5')->get();
        return view('frontend.index',compact(['banners', 'categories']));
    }

    public function shop(Request $request)
    {
        $products = Product::query();

        if (!empty($_GET['category'])) {
            $slugs = explode(',',$_GET['category']);
            $cat_ids = Category::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            $products = $products->whereIn('cat_id',$cat_ids);
        }
        //brand
        if (!empty($_GET['brand'])) {
            $slugs = explode(',',$_GET['brand']);
            $brand_ids = Brand::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            $products = $products->whereIn('brand_id',$brand_ids);
        }
        // brand close

        //size
        if (!empty($_GET['size'])) {
            $products = $products->where('size',$_GET['size']);
        }
        //size close
        if (!empty($_GET['sortBy'])) {
            if($_GET['sortBy']=='priceAsc'){
                $products=$products->where(['status'=>'active'])->orderBy('price', 'ASC');
            }
            if($_GET['sortBy'] == 'priceDesc'){
                $products = $products->where(['status' => 'active'])->orderBy('price', 'DESC');

            }
            if($_GET['sortBy'] == 'discAsc'){
                $products = $products->where(['status' => 'active'])->orderBy('discount', 'ASC');

            }
            if($_GET['sortBy'] == 'discDesc'){
                $products = $products->where(['status' => 'active'])->orderBy('discount', 'DESC');

            }
            if($_GET['sortBy'] == 'titleAsc'){
                $products = $products->where(['status' => 'active'])->orderBy('title', 'ASC');

            }
            if($_GET['sortBy'] == 'titleDesc'){
                $products = $products->where(['status' => 'active'])->orderBy('title', 'DESC');
            }
        }
        if (!empty($_GET['price'])) {
            $price = explode('-' , $_GET['price']);
            $price[0] = floor($price[0]);
            $price[1] = ceil($price[1]);
            $products=$products->whereBetween('price', $price)->where('status', 'active')->paginate(12);
        }
        else{
            $products = $products->where('status', 'active')->paginate(12);
        }
        $brands = Brand::where(['status'=>'active'])->orderBy('title', 'ASC')->with('products')->get();
        $cats = Category::where(['status'=>'active', 'is_parent' => 1])->with('products')->orderBy('title', 'ASC')->get();
        return view('frontend.pages.shop', compact('products', 'cats', 'brands'));
    }

    public function shopFilter(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        // Category Filter
        // dd($data);
        $catUrl = '';
        if (!empty($data['category'])) {
            foreach ($data['category'] as  $category) {
                if (empty($catUrl)) {
                    $catUrl .='&category='.$category;
                }
                else{
                    $catUrl .=','.$category;
                }
            }
        }
        //Sort Filter

        $sortByUrl = "";
        if(!empty($data['sortBy'])) {
            $sortByUrl .='&sortBy=' .$data['sortBy'];
        }

        //Price filter
        $price_range_Url = "";
        if (!empty($data['price_range'])) {
            $price_range_Url .= '&price=' .$data['price_range'];
        }
        // dd($price_range_Url);

        //Brand filter
        $brandUrl = "";
        if (!empty($data['brand'])) {
            foreach ($data['brand'] as  $brand) {
                if (empty($brandUrl)) {
                    $brandUrl .='&brand='.$brand;
                }
                else{
                    $brandUrl .=','.$brand;
                }
            }
        }
        //Size Filter

        $sizeUrl = "";
        if (!empty($data['size'])) {
            $sizeUrl .= '&size=' .$data['size'];
        }
        return \redirect()->route('shop',$catUrl.$sortByUrl.$price_range_Url.$brandUrl.$sizeUrl);
    }

    public function autoSearch(Request $request)
    {
        $query = $request->get('term', '');
        $products = Product::where('title','LIKE','%'.$query.'%')->get();

        $data = array();
        foreach ($products as $product) {
            $data[] = array('value'=> $product->title, 'id'=>$product->id);
        }
        if (count($data)) {
            return $data;
        }
        else{
            return ['value'=>'No result found', 'id'=>''];
        }
    }

    public function Search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title','LIKE','%'.$query.'%')->orderBy('id', 'DESC')->paginate(12);
        $brands = Brand::where(['status'=>'active'])->orderBy('title', 'ASC')->with('products')->get();
        $cats = Category::where(['status'=>'active', 'is_parent' => 1])->with('products')->orderBy('title', 'ASC')->get();
        return view('frontend.pages.shop', compact('products', 'cats', 'brands'));

    }

    public function productCategory(Request $request, $slug)
    {
        // dd($slug);
        $categories = Category::with(['products'])->where('slug', $slug)->first();

        // return $request->all();

        $sort = '';
        if($request->sort != null){
            $sort = $request->sort;
        }
        if($categories == null){
            return view('errors.404');
        }
        else{
            if($sort == 'priceAsc'){
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('offer_price', 'ASC')->paginate(12);
            }
            elseif($sort == 'priceDesc'){
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('offer_price', 'DESC')->paginate(12);

            }
            elseif($sort == 'discAsc'){
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('discount', 'ASC')->paginate(12);

            }
            elseif($sort == 'discAsc'){
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('discount', 'DESC')->paginate(12);

            }
            elseif($sort == 'titleAsc'){
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('title', 'ASC')->paginate(12);

            }
            elseif($sort == 'titleAsc'){
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('title', 'DESC')->paginate(12);
            }
            else{
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->paginate(12);
            }
        }

        $route = 'product-category';

        if($request->ajax()){
            $view = view('frontend.layouts.single-product', compact('products'))->render();
            return response()->json(['html' => $view]);
        }
        return view('frontend.pages.product-category', compact(['categories', 'route','products']));
    }

    public function productDetail($slug)
    {
        $product = Product::with('rel_prods')->where('slug',$slug)->first();
        // return $product;
        if ($product) {
            return view('frontend.pages.product-detail',compact('product'));
        }
        else {
            return 'Product detail not found';
        }
    }

    public function userAuth()
    {
        Session::put('url.intended', URL::previous());
        return view('frontend.auth.auth');
    }
    public function userRegister()
    {
        return view('frontend.auth.register');
    }

    public function loginSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|exists:users,email',
            'password' => 'required|min:3',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active'])){
            Session::put('user',$request->email);

            if(Session::get('url.intended')){
                return Redirect::to(Session::get('url.intended'));
            }
            else{
                return redirect()->route('home')->with('success', 'Successfully login');
            }
        }
        else{
            return back()->with('error', 'Invalid email and password');
        }
    }
    public function registerSubmit(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'username' => 'nullable|string',
            'full_name' => 'required|string',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:3|confirmed',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        Session::put('user', $data['email']);
        Auth::login($check);
        if($check){
            return redirect()->route('home')->with('success', 'Successfully registered');
        }
        else{
            return back()->with('error', 'Wrong credentials');
        }
    }
    private function create(array $data)
    {
        return User::create([
            'full_name' => $data['full_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function userLogout()
    {
        Session::forget('user');
        Auth::logout();
        return \redirect()->home()->with('success', 'Successfully logout');
    }

    public function userdashboard()
    {
        $user = Auth::user();
        return view('frontend.user.dashboard',compact('user'));
    }

    public function userOrder()
    {
        $user = Auth::user();
        return view('frontend.user.order',compact('user'));
    }
    public function userAddress()
    {
        $user = Auth::user();
        // return $user;
        return view('frontend.user.address',compact('user'));
    }
    public function userAccount()
    {
        $user = Auth::user();
        return view('frontend.user.account',compact('user'));
    }

    public function billingAddress(Request $request, $id)
    {
        $user = User::where('id', $id)->update([
            'country' => $request->country,
            'city' => $request->city,
            'postcode' => $request->postcode,
            'state' => $request->state,
            'address' => $request->address,
        ]);
        if($user){
            return back()->with('success', 'Successfully updated address');
        }
        else{
            return back()->with('error', 'Something went wrong');

        }
    }

    public function shippingAddress(Request $request, $id)
    {
        $user = User::where('id', $id)->update([
            'scountry' => $request->scountry,
            'scity' => $request->scity,
            'spostcode' => $request->spostcode,
            'sstate' => $request->sstate,
            'saddress' => $request->saddress,
        ]);
        if($user){
            return back()->with('success', 'Successfully updated billing address');
        }
        else{
            return back()->with('error', 'Something went wrong');

        }
    
    }
    public function updateAccount(Request $request, $id)
    {
        // $this->validate($request, [
        //     'newpassword' => 'password|min:4',
        //     'oldpassword' => 'password|min:4',
        //     'full_name' => 'string|required',
        //     'username' => 'string|nullable',
        //     'phone' => 'nullable|min:8',
        // ]);
        $hashpassword = Auth::user()->password;

        if($request->oldpassword == null && $request->newpassword == null){
            User::where('id', $id)->update([
                'full_name' => $request->full_name,
                'username' => $request->username,
                'phone' => $request->phone,
            ]);
            return back()->with('success', 'Account successfully updated');

        }else{
            if(\Hash::check($request->oldpassword, $hashpassword)){
                if(!\Hash::check($request->newpassword, $hashpassword)){
                    User::where('id', $id)->update([
                        'full_name' => $request->full_name,
                        'username' => $request->username,
                        'phone' => $request->phone,
                        'password' => Hash::make($request->newpassword),
                    ]);
                    return back()->with('success', 'Account successfully updated');
                }else{
                    return back()->with('error', 'New password is same with old password');
                }
            }else{
                return back()->with('error', 'Old password does not match');
            }
        }
    }
}
