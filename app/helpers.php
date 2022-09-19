<?php
    function content(){
        $contents  = App\Models\Content::get();
        $data      = array();
        foreach($contents as $content){
            $data[$content->key] = [
                'name'      => $content->name,
                'heading'   => $content->heading,
                'key'       => $content->key,
                'description'      => $content->description,
                'icon'      => $content->icon,
                'user_id'           => $content->user_id,
                'image'     => $content->image,
                'created_at'        => $content->created_at,
                'updated_at'        => $content->updated_at,

            ];
        }
        return $data;
    }
    function cart(){
        $cart  = App\Models\Cart::all();
        return $cart;
    }
    function wish(){
        $wish  = App\Models\Wish::all();
        return $wish;
    }
    function productimage(){
        $productimage  = App\Models\ProductImage::all();
        return $productimage;
    }
    function product(){
        $product  = App\Models\Product::all();
        return $product;
    }
    function media(){
        $media  = App\Models\Link::orderBy('created_at','DESC')->get();
        return $media;
    }
    function service(){
        $service  = App\Models\Service::orderBy('created_at','DESC')->get();
        return $service;
    }
    function menu(){
        $menu  = App\Models\Menu::orderBy('created_at','ASC')->get();
        return $menu;
    }
    function macro_menu(){
        $macro_menu  = App\Models\MacroMenu::orderBy('created_at','ASC')->get();
        return $macro_menu;
    }
    function micro_menu(){
        $micro_menu  = App\Models\MicroMenu::orderBy('created_at','ASC')->get();
        return $micro_menu;
    }

    function contact()
    {
        $contact  =  App\Models\Contact::where('reply',2)->orderBy('created_at','DESC')->get();
        return $contact;
    }
    function order()
    {
        $order  =  App\Models\Master::where('process',3)->orderBy('created_at','DESC')->get();
        return $order;
    }

    // function product()
    // {
    //     $product  =  App\Models\Product::where('created_at','DESC')->take(10)->get();
    //     $data      = array();
    //     foreach($product as $item){
    //         $data[] = [
    //             'id'                 => $item->id,
    //             'product_id'      => $item->product_id,
    //             'description'      => $item->description,
    //             'created_at'        => $item->created_at,
    //             'updated_at'        => $item->updated_at,
    //         ];
    //     }
    //     return $data;
    // }
    
    
    

?>