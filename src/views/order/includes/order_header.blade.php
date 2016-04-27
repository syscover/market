<!-- market::order.form.includes.order_header -->
<div class="row">
    <div class="col-md-6">
        @include('pulsar::includes.html.form_text_group', [
            'labelSize' => 4,
            'fieldSize' => 4,
            'name' => 'id',
            'label' => 'ID',
            'value' => old('id', isset($object->id_116)? $object->id_116 : null),
            'readOnly' => true
        ])
        @include('pulsar::includes.html.form_select_group', [
            'labelSize' => 4,
            'fieldSize' => 8,
            'name' => 'status',
            'label' => trans('market::pulsar.order_status'),
            'value' => old('status', isset($object->status_116)? $object->status_116 : null),
            'objects' => $ordersStatus,
            'idSelect' => 'id_114',
            'nameSelect' => 'name_114',
        ])
        @include('pulsar::includes.html.form_select_group', [
            'labelSize' => 4,
            'fieldSize' => 8,
            'name' => 'paymentMethod',
            'label' => trans_choice('market::pulsar.payment_method', 1),
            'value' => old('orderStatus', isset($object->payment_method_116)? $object->payment_method_116 : null),
            'objects' => $paymentsMethod,
            'idSelect' => 'id_115',
            'nameSelect' => 'name_115',
        ])
    </div>
    <div class="col-md-6">
        @include('pulsar::includes.html.form_text_group', [
            'labelSize' => 4,
            'fieldSize' => 8,
            'name' => 'ip',
            'label' => trans('pulsar::pulsar.ip'),
            'value' => old('ip', isset($object->ip_116)? $object->ip_116 : null),
            'id' => 'ip',
            'readOnly' => true,
        ])
        @include('pulsar::includes.html.form_datetimepicker_group', [
            'labelSize' => 4,
            'fieldSize' => 6,
            'label' => trans_choice('pulsar::pulsar.date', 1),
            'name' => 'date',
            'data' => [
                'format' => Miscellaneous::convertFormatDate(config('pulsar.datePattern')),
                'locale' => config('app.locale'),
                'default-date' => old('date', isset($object->date_116)? date('Y-m-d', $object->date_116) : null)
            ]
        ])
        @include('pulsar::includes.html.form_text_group', [
            'labelSize' => 4,
            'fieldSize' => 8,
            'name' => 'paymentId',
            'label' => trans('market::pulsar.payment_id'),
            'value' => old('paymentId', isset($object->payment_id_116)? $object->payment_id_116 : null),
            'readOnly' => true,
        ])
    </div>
</div>
<!-- /.market::order.form.includes.order_header -->