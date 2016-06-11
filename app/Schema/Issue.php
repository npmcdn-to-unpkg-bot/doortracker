<?php

namespace App\Schema;

class Issue extends Schema{
   
    /**
     * List of all fields
     *
     * @var array
     */
    protected $fields = [
        'id' => [],
        'name' => [],
        'description' => [],
        'status' => [],
        'priority' => [],
        'author_id' => []
    ];
}
