<?php

namespace App\Models\Core;

use App\Classes\Abstracts\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Settings
 * @package App\Models\Core
 */
class Settings extends BaseModel
{
    use SoftDeletes;
    
    /**
     * @var string $table
     */
    protected $table = "settings";

    /**
     * @var array $fillable
     */
    protected $fillable = [
        "key",
        "value",
        "description",
    ];
}
