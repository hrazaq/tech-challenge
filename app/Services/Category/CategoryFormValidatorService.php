<?php

namespace App\Services\Category;

use Illuminate\Http\Request;

class CategoryFormValidatorService 
{
   
    public function isValidated(Request $new_category)
    {
        return $new_category->validate([
            'name' => ['required','string','min:3','max:25'],
            'parent_category_id' => ['required','numeric']
        ]);
    }
   
}
 