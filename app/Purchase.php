<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Purchase
 *
 * @package App
 * @property string $item_code
 * @property integer $quantity
 * @property string $photo
*/
class Purchase extends Model
{
    use SoftDeletes;

    protected $fillable = ['item_code', 'quantity', 'photo'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setQuantityAttribute($input)
    {
        $this->attributes['quantity'] = $input ? $input : null;
    }
    
}
