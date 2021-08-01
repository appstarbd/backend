<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Image;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $products = Product::get();
//        $this->data['products'] = Product::with(['image'])->paginate(10);
        $products = Product::with(['image'])->paginate(10);
        $this->data['products'] = $products;
        if (request()->expectsJson()) {
            return response()->json($products);
        }
        return view('product.index', $this->data);
    }
//    public function index()
//    {
////        $products = Product::get();
////        $this->data['products'] = Product::with(['image'])->paginate(10);
//        $this->data['products'] = Product::paginate(10);
//        return view('product.index', $this->data);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'images' => 'image|mimes:jpeg,png,jpg,gif,svg',
//        ]);

        $title = $request->title;
        $price = $request->price;
        $description = $request->description;
        $images = $request->file('images');

        $product = Product::create([
            'title' => $title,
            'price' => $price,
            'description' => $description,
        ]);

        if (is_array($images)) {
            foreach ($images as $image) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $image
                ]);
            }
        } else {
            // returns Intervention\Image\Image
//            $file = $request->file('images');

//            $path = $file->hashName($images);
// avatars/bf5db5c75904dac712aea27d45320403.jpeg

            $imageName = $images->getClientOriginalName();

//            Storage::putFile('products/thumbs', $thumbs, 'public');
//            $thumb_url = $thumbs->storeAs('products/thumbs', $imageName, 'public');
            $url = $images->storeAs('products', $imageName, 'public');
//dd(Storage::put);
            $thumbs = Image::make($images->path());

            $thumbs->fit(24, 24, function ($constraint) {
                $constraint->aspectRatio();
            });
//            $filePath = public_path('/storage/products/thumbnail/');
//            $thumbs->save($filePath . $imageName);
            $path = Storage::putFile('products/thumbnail', $thumbs); // $request->file('avatar')
            dd($path);

            ProductImage::create([
                'product_id' => $product->id,
                'image' => $url
//                'image' => $imageName
            ]);
        }

        return redirect()->route('product.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->data['product'] = Product::with(['image'])->findOrFail($product->id);
        return view('product.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $res = Product::whereId($product->id)->delete();
        return $res;
    }

    /**
     * Prepares a image for storing.
     *
     * @param mixed $request
     * @author Imran Khan
     * @return bool
     */
//    public function storeImage($request) {
//        // Get file from request
//        $file = $request->file('image');
//
//        // Get filename with extension
//        $filenameWithExt = $file->getClientOriginalName();
//
//        // Get file path
//        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
//
//        // Remove unwanted characters
//        $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
//        $filename = preg_replace("/\s+/", '-', $filename);
//
//        // Get the original image extension
//        $extension = $file->getClientOriginalExtension();
//
//        // Create unique file name
//        $fileNameToStore = $filename.'_'.time().'.'.$extension;
//
//        // Refer image to method resizeImage
//        $save = $this->resizeImage($file, $fileNameToStore);
//
//        return true;
//    }

    /**
     * Resizes a image using the InterventionImage package.
     *
     * @param object $file
     * @param string $fileNameToStore
     * @author Imran Khan
     * @return bool
     */
//    public function resizeImage($file, $fileNameToStore) {
//        // Resize image
//        $resize = Image::make($file)->resize(600, null, function ($constraint) {
//            $constraint->aspectRatio();
//        })->encode('jpg');
//
//        // Create hash value
//        $hash = md5($resize->__toString());
//
//        // Prepare qualified image name
//        $image = $hash."jpg";
//
//        // Put image to storage
//        $save = Storage::put("public/images/{$fileNameToStore}", $resize->__toString());
//
//        if($save) {
//            return true;
//        }
//        return false;
//    }
}
