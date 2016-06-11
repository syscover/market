<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Market\Models\TaxRateZone;

/**
 * Class TaxRateZoneController
 * @package Syscover\Market\Controllers
 */

class TaxRateZoneController extends Controller
{
    protected $routeSuffix  = 'marketTaxRateZone';
    protected $folder       = 'tax_rate_zone';
    protected $package      = 'market';
    protected $aColumns     = ['id_103', 'name_103', 'name_002', 'rate_percent_103'];
    protected $nameM        = 'name_103';
    protected $model        = TaxRateZone::class;
    protected $icon         = 'fa fa-globe';
    protected $objectTrans  = 'tax_rate_zone';

    public function storeCustomRecord($parameters)
    {
        TaxRateZone::create([
            'name_103'                  => $this->request->input('name'),
            'country_id_103'            => $this->request->input('country'),
            'territorial_area_1_id_103' => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_id_103' => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_id_103' => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_103'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'rate_percent_103'          => $this->request->input('ratePercent'),
        ]);
    }

    public function updateCustomRecord($parameters)
    {
        TaxRateZone::where('id_103', $parameters['id'])->update([
            'name_103'                  => $this->request->input('name'),
            'country_id_103'            => $this->request->input('country'),
            'territorial_area_1_id_103' => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_id_103' => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_id_103' => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_103'                    => $this->request->has('cp')? $this->request->input('cp') : null,
            'rate_percent_103'          => $this->request->input('ratePercent'),
        ]);
    }
}