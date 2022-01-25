<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add',compact('categories','brands'));
    }


    public function StoreProduct(Request $request){

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // mkdir('upload/products/',0755,TRUE);
        // mkdir('upload/products/thumnails/',0755,TRUE);
        Image::make($image)->resize(917,1000)->save('upload/products/thumnails/'.$name_gen);
        $save_url = 'upload/products/thumnails/'.$name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_eng' => $request->product_name_eng,
            'product_name_esp' => $request->product_name_esp,
            'product_slug_eng' => strtolower(str_replace(' ','-',$request->product_name_eng)),
            'product_slug_esp' => strtolower(str_replace(' ','-',$request->product_name_esp)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_eng' => $request->product_tags_eng,
            'product_tags_esp' => $request->product_tags_esp,
            'product_size_eng' => $request->product_size_eng,
            'product_size_esp' => $request->product_size_esp,
            'product_color_eng' => $request->product_color_eng,
            'product_color_esp' => $request->product_color_esp,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_eng' => $request->short_description_eng,
            'short_description_esp' => $request->short_description_esp,
            'long_description_eng' => $request->long_description_eng,
            'long_description_esp' => $request->long_description_esp,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);


        $images = $request->file('multi_img');
        // mkdir('upload/products/multi-image/',0755,TRUE);
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }


        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    }


    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }

    public function EditProduct($id){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $product = Product::findOrFail($id);

        $multiImgs = MultiImg::where('product_id',$id)->get();

        return view('backend.product.product_edit',compact('categories','subcategories','subsubcategories','brands','product','multiImgs'));
    }

    public function ProductDataUpdate(Request $request){
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_eng' => $request->product_name_eng,
            'product_name_esp' => $request->product_name_esp,
            'product_slug_eng' => strtolower(str_replace(' ','-',$request->product_name_eng)),
            'product_slug_esp' => strtolower(str_replace(' ','-',$request->product_name_esp)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_eng' => $request->product_tags_eng,
            'product_tags_esp' => $request->product_tags_esp,
            'product_size_eng' => $request->product_size_eng,
            'product_size_esp' => $request->product_size_esp,
            'product_color_eng' => $request->product_color_eng,
            'product_color_esp' => $request->product_color_esp,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_eng' => $request->short_description_eng,
            'short_description_esp' => $request->short_description_esp,
            'long_description_eng' => $request->long_description_eng,
            'long_description_esp' => $request->long_description_esp,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            // 'product_thumbnail' => $save_url,
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        if($request->file('multi_img_edit') != NULL){
            $images = $request->file('multi_img_edit');
            // mkdir('upload/products/multi-image/',0755,TRUE);
            foreach ($images as $img) {
                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
                $uploadPath = 'upload/products/multi-image/'.$make_name;

                MultiImg::insert([
                    'product_id' => $product_id,
                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    }

    public function MultiImageUpdate(Request $request){

        if($request->multi_img != NULL){
            $imgs = $request->multi_img;

            foreach ($imgs as $id => $img) {
                $imgDel = MultiImg::findOrFail($id);
                unlink($imgDel->photo_name);

                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                // mkdir('upload/products/',0755,TRUE);
                // mkdir('upload/products/thumnails/',0755,TRUE);
                Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
                $uploadPath = 'upload/products/multi-image/'.$make_name;

                MultiImg::where('id',$id)->update([
                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        $notification = array(
            'message' => 'Product Images Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    public function ThumbnailImageUpdate(Request $request){

        if($request->file('product_thumbnail') != NULL){
            $prod_id = $request->id;
            $oldImg = $request->old_img;
            unlink($oldImg);

            $image = $request->file('product_thumbnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/products/thumnails/'.$name_gen);
            $save_url = 'upload/products/thumnails/'.$name_gen;

            Product::findOrFail($prod_id)->update([
                'product_thumbnail' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product Image Thumbnail Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function MultiImageDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductInactive($id){
        Product::findOrFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product is now Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductActive($id){
        Product::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product is now Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
        }
        MultiImg::where('product_id',$id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
