<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Crm\Models\Group;
use Syscover\Market\Models\CustomerClassTax;
use Syscover\Market\Models\GroupCustomerClassTax;

/**
 * Class GroupCustomerClassTaxController
 * @package Syscover\Market\Controllers
 */

class GroupCustomerClassTaxController extends Controller
{
    protected $routeSuffix  = 'marketGroupCustomerClassTax';
    protected $folder       = 'group_customer_class_tax';
    protected $package      = 'market';
    protected $aColumns     = ['name_300', 'name_100'];
    protected $nameM        = 'name_221';
    protected $model        = GroupCustomerClassTax::class;
    protected $icon         = 'fa fa-retweet';
    protected $objectTrans  = 'group_customer_class_tax';

    public function createCustomRecord($parameters)
    {
        $groupsRecords = GroupCustomerClassTax::builder()->get(['group_id_102']);

        $parameters['groups'] = Group::builder()
            ->whereNotIn('id_300', $groupsRecords)
            ->get();

        $parameters['customerClassTaxes'] = CustomerClassTax::all();
        
        return $parameters;
    }
    
    public function storeCustomRecord($parameters)
    {
        GroupCustomerClassTax::create([
            'group_id_102'                  => $this->request->input('group'),
            'customer_class_tax_id_102'     => $this->request->input('customerClassTax')
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['groups'] = Group::builder()
            ->get();;

        $parameters['customerClassTaxes'] = CustomerClassTax::all();

        return $parameters;
    }

    public function checkSpecialRulesToUpdate($parameters)
    {
        $parameters['specialRules']['groupRule'] = false;

        return $parameters;
    }

    public function updateCustomRecord($parameters)
    {
        GroupCustomerClassTax::where('group_id_102', $parameters['id'])->update([
            'customer_class_tax_id_102'        => $this->request->input('customerClassTax')
        ]);
    }
}