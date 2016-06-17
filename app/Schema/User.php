<?php

namespace App\Schema;

class User extends Schema{
   
    /**
     * List of all fields
     *
     * @var array
     */
    protected $fields = [
        'id' => [],
        'name' => [],
        'email' => [],
        'password' => [],
    ];
}
