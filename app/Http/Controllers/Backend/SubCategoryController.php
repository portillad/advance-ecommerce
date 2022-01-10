<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_eng','ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategories','categories'));
    }

    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_eng' => 'required',
            'subcategory_name_esp' => 'required',
        ],[
            'category_id.required' => 'Category is required',
            'subcategory_name_eng.required' => 'SubCategory Name English is required',
            'subcategory_name_esp.required' => 'SubCategory Name Spanish is required',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_eng' => $request->subcategory_name_eng,
            'subcategory_name_esp' => $request->subcategory_name_esp,
            'subcategory_slug_eng' => strtolower(str_replace(' ','-',$request->subcategory_name_eng)),
            'subcategory_slug_esp' => strtolower(str_replace(' ','-',$request->subcategory_name_esp)),
        ]);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_eng','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory','categories'));
    }

    public function SubCategoryUpdate(Request $request){
        $subcat_id = $request->id;
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_eng' => 'required',
            'subcategory_name_esp' => 'required',
        ],[
            'category_id.required' => 'Category is required',
            'subcategory_name_eng.required' => 'SubCategory Name English is required',
            'subcategory_name_esp.required' => 'SubCategory Name Spanish is required',
        ]);

        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_eng' => $request->subcategory_name_eng,
            'subcategory_name_esp' => $request->subcategory_name_esp,
            'subcategory_slug_eng' => strtolower(str_replace(' ','-',$request->subcategory_name_eng)),
            'subcategory_slug_esp' => strtolower(str_replace(' ','-',$request->subcategory_name_esp)),
        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
