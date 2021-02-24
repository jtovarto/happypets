<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Compras extends Model
{

    protected $primaryKey = "reference_sale";

    protected $fillable = ['reference_sale', 'transaction_id', 'reference_pol', 'state_pol',
            'response_code_pol', 'response_message_pol', 'value', 'transaction_date',
            'commision_pol', 'payment_method_name','payment_method', 'payment_method_id',
            'installments_number', 'authorization_code', 'cus', 'pse_bank', 'pse_reference1',
            'pse_reference2', 'pse_reference3', 'pseCycle', 'email_buyer','phone','mobile_phone',
            'billing_address', 'billing_city', 'billing_country','shipping_address',
            'shipping_city', 'shipping_country', 'extra1', 'extra2', 'extra3', 'shipping_state',
            'shipping_date', 'shipping_guide_id', 'shipping_company'
    ];

    public function getTransactionDateAttribute($value)
    {
        
        if (is_null($value))
            return null;
        elseif (!$value instanceof Carbon)
            return Carbon::createFromFormat('Y-m-d',$value);
        else
            return $value;

    }

    public function getShippingDateAttribute($value)
    {
        if (is_null($value))
            return null;
        elseif (!$value instanceof Carbon)
            return Carbon::createFromFormat('Y-m-d',$value);
        else
            return $value;
    }

    public function getReferenceSaleAttribute($value)
    {

        return $value;
    }

    public function scopeShippingDelay()
    {
        if (is_null($this->shipping_date))
            return "S/N";
        else
            return $this->shipping_date->diffForHumans($this->transaction_date);
    }
    public function scopeSincePurchase()
    {
        if ($this->shipping_state == 2)
            return $this->transaction_date->diffForHumans(Carbon::now());
        else
            return "N/A";
    }

    public function scopeCanBeShipping()
    {
        $s_pay  = $this->state_pol;
        $s_send = $this->shipping_state;
        return (($s_pay == 4 ) && ($s_send == 2));
    }



    //state_pol
    // 4 => Aceptado || 5 => Pendiente || 6 => Cancelado
    public function scopeIsApproved() {
        return $this->where('state_pol', 4);
    }

    public function scopeNotPayed() {
        return $this->where('state_pol','<>', 4);
    }



    //shipping_state
    // 1 => Enviado || 2 => Pendiente || 3 => Cancelado || 4 => Otro
    public function scopeSent() {
    	return $this->where('shipping_state', 1);
    }

    public function scopeNoSent() {
    	return $this->where('shipping_state','!=', 1);
    }

    public function scopeNeedsToBeSent()
    {
        $results = $this->where([
                        ['state_pol',4,],
                        ['shipping_state',2]
                    ])->orderBy('transaction_date');
        return $results;
    }



    public function productos()
    {

    }
}
