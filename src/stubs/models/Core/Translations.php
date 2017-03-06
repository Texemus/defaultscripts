<?php
namespace App\Models\Core;

use App\Classes\Abstracts\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Translations
 * @package App\Models\Core
 */
class Translations extends BaseModel
{

    use SoftDeletes;

    /**
     * @var string $table
     */
    protected $table = "translations";

    /**
     * @var array $fillable
     */
    protected $fillable = [
        "group",
        "key",
        "value",
        "locale",
        "editable",
    ];

    /**
     * Attribute casting
     *
     * @var array $casts
     */
    protected $casts = [
        'editable' => 'boolean',
    ];

}
