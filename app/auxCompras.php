<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class auxCompras extends Model
{
    
    protected $fillable = ['response_code_pol', 'phone', 'additional_value', 'transaction_date', 'cc_number', 'cc_holder', 'error_code_bank', 'billing_country', 'bank_referenced_name', 'description', 'administrative_fee_tax', 'value', 'administrative_fee', 'payment_method_type', 'office_phone', 'account_id', 'email_buyer', 'response_message_pol', 'error_message_bank', 'shipping_city', 'transaction_id', 'sign', 'operation_date', 'tax', 'transaction_bank_id', 'payment_method', 'billing_address', 'payment_method_name', 'pseCycle', 'pse_bank', 'state_pol','date', 'nickname_buyer', 'reference_pol', 'currency', 'risk', 'shipping_address', 'bank_id', 'payment_request_state', 'customer_number', 'administrative_fee_base', 'attempts', 'merchant_id', 'exchange_rate', 'shipping_country', 'installments_number', 'franchise', 'payment_method_id', 'extra1', 'extra2', 'antifraudMerchantId', 'extra3', 'commision_pol_currency', 'nickname_seller', 'ip', 'commision_pol', 'billing_city', 'pse_reference1', 'cus', 'reference_sale', 'authorization_code', 'pse_reference3', 'pse_reference2',];
    
   
}
