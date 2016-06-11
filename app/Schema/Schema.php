<?php

namespace App\Schema;

class Schema{
   
    /**
     * List of all fields
     *
     * @var array
     */
    protected $fields;

    /**
     * Retrieve fields
     *
     * @return Array
     */
    public function getFields(){
        return $this -> fields;
    }

    /**
     * Retrieve fields name
     *
     * @return Array
     */
    public function getFieldsName(){
        return array_keys($this -> fields);
    }
}
