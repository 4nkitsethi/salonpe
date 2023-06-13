<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;
use Product;
use Category;
use ProductType;
use Brand;
use Illuminate\Support\Arr;
use ProductAttribute;
use Media;
use Tag;
use Illuminate\Support\Facades\Storage;

class Products extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        return Inertia::render('Products/Index', [
            'filters' => ['search', 'trashed'],
            'products' => Product::orderBy('id')
                            ->where(function($query) use($request){
                                if($request->has("search")){
                                    $searchBy = ($request->has("by")) ? $request->by : "name";
                                    $query->where($searchBy,'LIKE','%'.$request->search."%");
                                }                  
                            })
                            ->paginate(10)
                            ->onEachSide(0)
                            ->withQueryString()
                            ->through(fn ($product) => [
                                'id' => $product->id,
                                'name' => $product->name,
                                'created_at' => $product->created_at,
                            ]),
        ]);        
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tags = Tag::select("id","name")->get();
        $categories = Category::with('subCategories')->where('parent_id',null)->get();   
        $productTypes = ProductType::select(['id','name'])->get();
        $brands = Brand::all();    
        return Inertia::render('Products/Create',[ 
                                                    "categories" =>  $categories , 
                                                    "productTypes" => $productTypes,
                                                    "brands" => $brands,
                                                    "tags" => $tags
                                                ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        //  Skin Type 
        $skinType = collect([]);
        foreach($request->skinType as $tag){            
            if($tag['id'] == 0){
                $tagDB = Tag::create([ "name" => $tag["name"] , "category" => [(int) $request->category["id"]] ]);
                $newTag = [];
                $newTag = Arr::add($newTag, 'id', $tagDB->id);  
                $newTag = Arr::add($newTag, 'name', $tagDB->name);                
                $skinType->push($newTag);
            }else{
                $skinType->push($tag);
            }
        }        

        //  Hair Type 
        $hairType = collect([]);
        foreach($request->hairType as $tag){            
            if($tag['id'] == 0){
                $tagDB = Tag::create([ "name" => $tag["name"] , "category" => [(int) $request->category["id"] ] ]);
                $newTag = [];
                $newTag = Arr::add($newTag, 'id', $tagDB->id);  
                $newTag = Arr::add($newTag, 'name', $tagDB->name);                
                $hairType->push($newTag);
            }else{
                $hairType->push($tag);
            }
        }        
        //        
        $data = [
                    "name" => $request->name ,
                    "category_id" => $request->category['parent_id'],
                    "sub_category_id" => $request->category["id"],
                    "brand_id" => $request->brand['id'],
                    "product_type" => $request->productType,
                    "product_description" => $request->description,
                    "ingredients" => $request->ingredients,
                    "how_to_use" => $request->howToUse,
                    "skin_type" => $skinType->toArray(),
                    "hair_type" => $hairType->toArray(),
        ];

        $product = Product::create($data);
        
        foreach($request->file("images") as $file){
            $path = $file->store('products/'.$product->id.'/thumb','public');
            $product->thumb_image = $path;
            $product->save();
        }
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categories = Category::with('subCategories')->where('parent_id',null)->get();   
        $productTypes = ProductType::select(['id','name'])->get();
        $brands = Brand::all();  
        $product = Product::with('category','brand','attributes.media')->find($id);
        $tags = Tag::select("id","name")->get();

        return Inertia::render('Products/Edit',[ 
                                                    "categories" =>  $categories , 
                                                    "productTypes" => $productTypes,
                                                    "brands" => $brands,
                                                    'product' => $product,
                                                    'tags' => $tags
                                                ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //  Skin Type 
        $skinType = collect([]);
        foreach($request->skinType as $tag){            
            if($tag['id'] == 0){
                $tagDB = Tag::create([ "name" => $tag["name"] , "category" => [(int) $request->category["id"]] ]);
                $newTag = [];
                $newTag = Arr::add($newTag, 'id', $tagDB->id);  
                $newTag = Arr::add($newTag, 'name', $tagDB->name);                
                $skinType->push($newTag);
            }else{
                $skinType->push($tag);
            }
        }        

        //  Hair Type 
        $hairType = collect([]);
        foreach($request->hairType as $tag){            
            if($tag['id'] == 0){
                $tagDB = Tag::create([ "name" => $tag["name"] , "category" => [(int) $request->category["id"] ] ]);
                $newTag = [];
                $newTag = Arr::add($newTag, 'id', $tagDB->id);  
                $newTag = Arr::add($newTag, 'name', $tagDB->name);                
                $hairType->push($newTag);
            }else{
                $hairType->push($tag);
            }
        }  

        //        
        $data = [
                    "name" => $request->name ,
                    "category_id" => $request->category['parent_id'],
                    "sub_category_id" => $request->category["id"],
                    "brand_id" => $request->brand['id'],
                    "product_type" => $request->productType,
                    "product_description" => $request->description,
                    "ingredients" => $request->ingredients,
                    "how_to_use" => $request->howToUse,
                    "skin_type" => $skinType->toArray(),
                    "hair_type" => $hairType->toArray(),
        ];
        $product = Product::find($id);
        $product->update($data);
        if(!empty($request->deletedAttrImg)){            
            foreach ($request->deletedAttrImg as $key => $image) {
                unlink(public_path($image["path"]));
            }
        }
        // 
        if($request->hasFile('images')){
            foreach($request->file("images") as $file){
                $path = $file->store('products/'.$id.'/thumb','public');
                $product->thumb_image = $path;
                $product->save();
            }
        }

        return redirect()->route('product.edit',$id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    /**
     * 
     * 
     **/
    public function createProductAttribute(string $id){
        $product = Product::find($id); 
        return Inertia::render('Products/Attributes/Create',[ 
                                                    "product" =>  $product
                                                ]);
    }


       /**
     * 
     * 
     **/
    public function editProductAttribute(string $id){
        $attribute = ProductAttribute::with(['product','media'])->find($id);
        $product = $attribute->product;
        return Inertia::render('Products/Attributes/Create',[ 
                                                    "product" =>  $product,
                                                    "attribute" => $attribute
                                                ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeProductAttribute(Request $request, string $id)
    {          
        $product = Product::find($id);
        //
        $attributeData  = [];
        foreach($request->get("attributes") as $attribute){
            if($attribute == "Name"){
                $attributeData = Arr::add($attributeData, 'name', $request->name);
            }elseif($attribute == 'Color'){
                $attributeData = Arr::add($attributeData, 'color', $request->color);
            }elseif($attribute == 'Size'){
                $attributeData = Arr::add($attributeData, 'size', $request->size);
            }
        }

        $data = [
            "product_id" => $id,
            "attribute_type" => $request->get("attributes"),
            "attribute_data" => $attributeData,                                                                    
            "bar_code" => $request->bar_code ,
            "hsn_code" => $request->hsn_code ,
            "ean_code" => $request->ean_code ,
            "gst_amount" => $request->gst_amount ,
            "mrp" => $request->mrp ,
            "discounted_mrp" => $request->discounted_mrp ,
            "purchase_price" => $request->purchase_price ,
            "wholesale_price" => $request->wholesale_price ,
            "salon_price" => $request->salon_price ,
            "tax" => $request->tax ,
            "quantity" => $request->quantity ,
            "additional_description" => $request->additional_description          
        ];

        $ProductAttribute = (empty($request->attribute)) ? ProductAttribute::create($data) : ProductAttribute::where('id',$request->attribute)->update($data);
        // 

        if(!empty($request->attribute) && !empty($request->deletedAttrImg)){            
            foreach ($request->deletedAttrImg as $key => $image) {
                //
                unlink(public_path($image["path"]));
                Media::where('id',$image["id"])->delete();
            }
        }
        
        if($request->hasFile('images')){
            foreach($request->file("images") as $file){
                $path = $file->store('products/'.$product->id.'/attributes','public');
                Media::create([
                                    "associated" => "Attribute",
                                    "associate_id" => (empty($request->attribute)) ? $ProductAttribute->id : $request->attribute,
                                    "path" => $path
                ]);
            }
        } 
        return redirect()->route('product.edit',$id);
    }
}
