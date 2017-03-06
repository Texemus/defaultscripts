<?php

namespace App\Models\Core;

use App\Classes\Abstracts\BaseModel;

/**
 * Class Entities
 * @package App\Models\Core
 */
class Entities extends BaseModel
{
    /**
     * @var string $table
     */
    protected $table = "entities";

    /**
     * @var array $fillable
     */
    protected $fillable = [
        "key",
        "object",
        "name_single",
        "name_multiple",
    ];
}
