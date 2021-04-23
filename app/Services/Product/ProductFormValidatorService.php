<?php

namespace App\Services\Product;

use Illuminate\Http\Request;

class ProductFormValidatorService 
{
   
    public function isValidated(Request $new_product)
    {
        return $new_product->validate([
            'product.name' => ['required','string','min:3','max:25'], 
            'product.description' => ['required','string','min:5','max:30'], 
            'product.price' => ['required','numeric'], 
            'product.image' => ['required','string'] 
        ]);
    }
   
}
 