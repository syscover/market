<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class GroupCustomerClassTax
 *
 * Model with properties
 * <br><b>[group_id, customer_class_tax_id]</b>
 *
 * @package     Syscover\Market\Models
 */

class GroupCustomerClassTax extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_102_group_customer_class_tax';
    protected $primaryKey   = 'group_id_102';
    protected $suffix       = '102';
    public $timestamps      = false;
    protected $fillable     = ['group_id_102', 'customer_class_tax_id_102'];
    protected $maps         = [];
    protected $relationMaps = [
        'group'                 => \Syscover\Crm\Models\Group::class,
        'customer_class_tax'    => \Syscover\Market\Models\CustomerClassTax::class
    ];
    private static $rules   = [
        'group'             => 'required',
        'customerClassTax'  => 'required'
    ];

    public static function validate($data, $specialRules = [])
    {
        if(isset($specialRules['groupRule']) && ! $specialRules['groupRule']) static::$rules['group'] = '';

        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('009_300_group', '012_102_group_customer_class_tax.group_id_102', '=', '009_300_group.id_300')
            ->join('012_100_customer_class_tax', '012_102_group_customer_class_tax.customer_class_tax_id_102', '=', '012_100_customer_class_tax.id_100');
    }
}