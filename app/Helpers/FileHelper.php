<?php

namespace App\Helpers;

class FileHelper
{

    public function checkFields(array $product): bool
    {
        if (empty($product['name']) || empty($product['price']) || empty($product['description']) || !is_numeric($product['price'])) {
            return false;
        } else {
            return true;
        }
    }
  
}
