<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;

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


    public function SubSubCategoryView(){
        $categories = Category::orderBy('category_name_eng','ASC')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('subsubcategories','categories'));
    }

    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_eng','ASC')->get();
        return json_encode($subcat);
    }

    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_eng' => 'required',
            'subsubcategory_name_esp' => 'required',
        ],[
            'category_id.required' => 'Category is required',
            'subcategory_id.required' => 'SubCategory is required',
            'subsubcategory_name_eng.required' => 'Sub-SubCategory Name English is required',
            'subsubcategory_name_esp.required' => 'Sub-SubCategory Name Spanish is required',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_eng' => $request->subsubcategory_name_eng,
            'subsubcategory_name_esp' => $request->subsubcategory_name_esp,
            'subsubcategory_slug_eng' => strtolower(str_replace(' ','-',$request->subsubcategory_name_eng)),
            'subsubcategory_slug_esp' => strtolower(str_replace(' ','-',$request->subsubcategory_name_esp)),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id){
        $categories = Category::orderBy('category_name_eng','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_eng','ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit', compact('categories','subcategories','subsubcategory'));
    }

    public function SubSubCategoryUpdate(Request $request){
        $subsubcat_id = $request->id;

        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_eng' => 'required',
            'subsubcategory_name_esp' => 'required',
        ],[
            'category_id.required' => 'Category is required',
            'subcategory_id.required' => 'SubCategory is required',
            'subsubcategory_name_eng.required' => 'Sub-SubCategory Name English is required',
            'subsubcategory_name_esp.required' => 'Sub-SubCategory Name Spanish is required',
        ]);

        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_eng' => $request->subsubcategory_name_eng,
            'subsubcategory_name_esp' => $request->subsubcategory_name_esp,
            'subsubcategory_slug_eng' => strtolower(str_replace(' ','-',$request->subsubcategory_name_eng)),
            'subsubcategory_slug_esp' => strtolower(str_replace(' ','-',$request->subsubcategory_name_esp)),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function SubSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
