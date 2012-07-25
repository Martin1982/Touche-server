<?php
namespace BAServer\Models;

use BAServer\Models\Base;

class Category extends \BAServer\Models\Base
{

    public $categoryId;
    public $name;

    public function getCategory($id)
    {
        return array($this->categoryId, $this->name);
    }

}