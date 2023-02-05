<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MileRequest;
use Validator;
use App\Models\Transaction;
use \stdClass;

class MileController extends Controller
{

    public function __construct()
    {

    }

    public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function GetPackage(Request $request)
    {
            try {
                $tranx = Transaction::All();

                return $this->responseJSON(true, "Data Success", 200, $tranx);
            } catch (\Exception $e) {
                return $this->responseJSON(false, 'Bad Request', 400);
            }
    }

    public function GetPackageByID(Request $request, $id)
    {
        try {
                $tranx = Transaction::where('_id', '=', $id)->first();

                return $this->responseJSON(true, "Data Success", 200, $tranx);
            } catch (\Exception $e) {
                return $this->responseJSON(false, 'Bad Request', 400);
            }
    }

    public function CreatePackage(MileRequest $request)
    {
      try {
            $tranx = new Transaction;

            $tranx->customer_name = $request->customer_name;
            $tranx->customer_code = $request->customer_code;
            $tranx->transaction_amount = $request->transaction_amount;
            $tranx->transaction_discount = $request->transaction_discount;
            $tranx->transaction_additional_field = $request->transaction_additional_field;
            $tranx->transaction_payment_type = $request->transaction_payment_type;
            $tranx->transaction_state = $request->transaction_state;
            $tranx->transaction_code = $request->transaction_code;
            $tranx->transaction_order = $request->transaction_order;
            $tranx->location_id = $request->location_id;
            $tranx->organization_id = $request->organization_id;
            $tranx->created_at = $request->created_at;
            $tranx->updated_at = $request->updated_at;
            $tranx->transaction_payment_type_name = $request->transaction_payment_type_name;
            $tranx->transaction_cash_amount = $request->transaction_cash_amount;
            $tranx->transaction_cash_change = $request->transaction_cash_change;

                $customer_attribute = new stdClass();
                $customer_attribute->Nama_Sales = $request['customer_attribute']['Nama_Sales'];
                $customer_attribute->TOP = $request['customer_attribute']['TOP'];
                $customer_attribute->Jenis_Pelanggan = $request['customer_attribute']['Jenis_Pelanggan'];
            $tranx->customer_attribute = $customer_attribute;

                $connote = new stdClass();
                $connote->connote_id = $request['connote']['connote_id'];
                $connote->connote_number = $request['connote']['connote_number'];
                $connote->connote_service = $request['connote']['connote_service'];
                $connote->connote_service_price = $request['connote']['connote_service_price'];
                $connote->connote_amount = $request['connote']['connote_amount'];
                $connote->connote_code = $request['connote']['connote_code'];
                $connote->connote_booking_code = $request['connote']['connote_booking_code'];
                $connote->connote_order = $request['connote']['connote_order'];
                $connote->connote_state = $request['connote']['connote_state'];
                $connote->connote_state_id = $request['connote']['connote_state_id'];
                $connote->zone_code_from = $request['connote']['zone_code_from'];
                $connote->zone_code_to = $request['connote']['zone_code_to'];
                $connote->surcharge_amount = $request['connote']['surcharge_amount'];
                $connote->transaction_id = $request['connote']['transaction_id'];
                $connote->actual_weight = $request['connote']['actual_weight'];
                $connote->volume_weight = $request['connote']['volume_weight'];
                $connote->chargeable_weight = $request['connote']['chargeable_weight'];
                $connote->created_at = $request['connote']['created_at'];
                $connote->updated_at = $request['connote']['updated_at'];
                $connote->organization_id = $request['connote']['organization_id'];
                $connote->location_id = $request['connote']['location_id'];
                $connote->connote_total_package = $request['connote']['connote_total_package'];
                $connote->connote_surcharge_amount = $request['connote']['connote_surcharge_amount'];
                $connote->connote_sla_day = $request['connote']['connote_sla_day'];
                $connote->location_name = $request['connote']['location_name'];
                $connote->location_type = $request['connote']['location_type'];
                $connote->source_tariff_db = $request['connote']['source_tariff_db'];
                $connote->id_source_tariff = $request['connote']['id_source_tariff'];
                $connote->pod = $request['connote']['pod'];
                $connote->history = array();
            $tranx->connote = $connote;
            $tranx->connote_id = $request->connote_id;

            $tranx->save();

            return $this->responseJSON(true, "Data Success", 200, $tranx);
        } catch (\Exception $e) {
            return $this->responseJSON(false, 'Bad Request', 400);
        }
    }

    public function PutPackage(MileRequest $request)
    {
        try {
                $tranx = Transaction::find($request->_id);

                if (!empty($tranx)){
                    $tranx->customer_name = $request->customer_name;
                    $tranx->customer_code = $request->customer_code;
                    $tranx->transaction_amount = $request->transaction_amount;
                    $tranx->transaction_discount = $request->transaction_discount;
                    $tranx->transaction_additional_field = $request->transaction_additional_field;
                    $tranx->transaction_payment_type = $request->transaction_payment_type;
                    $tranx->transaction_state = $request->transaction_state;
                    $tranx->transaction_code = $request->transaction_code;
                    $tranx->transaction_order = $request->transaction_order;
                    $tranx->location_id = $request->location_id;
                    $tranx->organization_id = $request->organization_id;
                    $tranx->created_at = $request->created_at;
                    $tranx->updated_at = $request->updated_at;
                    $tranx->transaction_payment_type_name = $request->transaction_payment_type_name;
                    $tranx->transaction_cash_amount = $request->transaction_cash_amount;
                    $tranx->transaction_cash_change = $request->transaction_cash_change;

                        $customer_attribute = new stdClass();
                        $customer_attribute->Nama_Sales = $request['customer_attribute']['Nama_Sales'];
                        $customer_attribute->TOP = $request['customer_attribute']['TOP'];
                        $customer_attribute->Jenis_Pelanggan = $request['customer_attribute']['Jenis_Pelanggan'];
                    $tranx->customer_attribute = $customer_attribute;

                        $connote = new stdClass();
                        $connote->connote_id = $request['connote']['connote_id'];
                        $connote->connote_number = $request['connote']['connote_number'];
                        $connote->connote_service = $request['connote']['connote_service'];
                        $connote->connote_service_price = $request['connote']['connote_service_price'];
                        $connote->connote_amount = $request['connote']['connote_amount'];
                        $connote->connote_code = $request['connote']['connote_code'];
                        $connote->connote_booking_code = $request['connote']['connote_booking_code'];
                        $connote->connote_order = $request['connote']['connote_order'];
                        $connote->connote_state = $request['connote']['connote_state'];
                        $connote->connote_state_id = $request['connote']['connote_state_id'];
                        $connote->zone_code_from = $request['connote']['zone_code_from'];
                        $connote->zone_code_to = $request['connote']['zone_code_to'];
                        $connote->surcharge_amount = $request['connote']['surcharge_amount'];
                        $connote->transaction_id = $request['connote']['transaction_id'];
                        $connote->actual_weight = $request['connote']['actual_weight'];
                        $connote->volume_weight = $request['connote']['volume_weight'];
                        $connote->chargeable_weight = $request['connote']['chargeable_weight'];
                        $connote->created_at = $request['connote']['created_at'];
                        $connote->updated_at = $request['connote']['updated_at'];
                        $connote->organization_id = $request['connote']['organization_id'];
                        $connote->location_id = $request['connote']['location_id'];
                        $connote->connote_total_package = $request['connote']['connote_total_package'];
                        $connote->connote_surcharge_amount = $request['connote']['connote_surcharge_amount'];
                        $connote->connote_sla_day = $request['connote']['connote_sla_day'];
                        $connote->location_name = $request['connote']['location_name'];
                        $connote->location_type = $request['connote']['location_type'];
                        $connote->source_tariff_db = $request['connote']['source_tariff_db'];
                        $connote->id_source_tariff = $request['connote']['id_source_tariff'];
                        $connote->pod = $request['connote']['pod'];
                        $connote->history = array();
                    $tranx->connote = $connote;
                    $tranx->connote_id = $request->connote_id;

                    $tranx->save();
                }

                return $this->responseJSON(true, "Data Success", 200, $tranx);
            } catch (\Exception $e) {
                return $this->responseJSON(false, 'Bad Request', 400);
            }
    }

    public function UpdatePackage(MileRequest $request)
    {
        try {
                $tranx = Transaction::find($request->_id);

                if (!empty($tranx)){
                    $tranx->customer_name = $request->customer_name;
                    $tranx->customer_code = $request->customer_code;
                    $tranx->transaction_amount = $request->transaction_amount;
                    $tranx->transaction_discount = $request->transaction_discount;
                    $tranx->transaction_additional_field = $request->transaction_additional_field;
                    $tranx->transaction_payment_type = $request->transaction_payment_type;
                    $tranx->transaction_state = $request->transaction_state;
                    $tranx->transaction_code = $request->transaction_code;
                    $tranx->transaction_order = $request->transaction_order;
                    $tranx->location_id = $request->location_id;
                    $tranx->organization_id = $request->organization_id;
                    $tranx->created_at = $request->created_at;
                    $tranx->updated_at = $request->updated_at;
                    $tranx->transaction_payment_type_name = $request->transaction_payment_type_name;
                    $tranx->transaction_cash_amount = $request->transaction_cash_amount;
                    $tranx->transaction_cash_change = $request->transaction_cash_change;

                        $customer_attribute = new stdClass();
                        $customer_attribute->Nama_Sales = $request['customer_attribute']['Nama_Sales'];
                        $customer_attribute->TOP = $request['customer_attribute']['TOP'];
                        $customer_attribute->Jenis_Pelanggan = $request['customer_attribute']['Jenis_Pelanggan'];
                    $tranx->customer_attribute = $customer_attribute;

                        $connote = new stdClass();
                        $connote->connote_id = $request['connote']['connote_id'];
                        $connote->connote_number = $request['connote']['connote_number'];
                        $connote->connote_service = $request['connote']['connote_service'];
                        $connote->connote_service_price = $request['connote']['connote_service_price'];
                        $connote->connote_amount = $request['connote']['connote_amount'];
                        $connote->connote_code = $request['connote']['connote_code'];
                        $connote->connote_booking_code = $request['connote']['connote_booking_code'];
                        $connote->connote_order = $request['connote']['connote_order'];
                        $connote->connote_state = $request['connote']['connote_state'];
                        $connote->connote_state_id = $request['connote']['connote_state_id'];
                        $connote->zone_code_from = $request['connote']['zone_code_from'];
                        $connote->zone_code_to = $request['connote']['zone_code_to'];
                        $connote->surcharge_amount = $request['connote']['surcharge_amount'];
                        $connote->transaction_id = $request['connote']['transaction_id'];
                        $connote->actual_weight = $request['connote']['actual_weight'];
                        $connote->volume_weight = $request['connote']['volume_weight'];
                        $connote->chargeable_weight = $request['connote']['chargeable_weight'];
                        $connote->created_at = $request['connote']['created_at'];
                        $connote->updated_at = $request['connote']['updated_at'];
                        $connote->organization_id = $request['connote']['organization_id'];
                        $connote->location_id = $request['connote']['location_id'];
                        $connote->connote_total_package = $request['connote']['connote_total_package'];
                        $connote->connote_surcharge_amount = $request['connote']['connote_surcharge_amount'];
                        $connote->connote_sla_day = $request['connote']['connote_sla_day'];
                        $connote->location_name = $request['connote']['location_name'];
                        $connote->location_type = $request['connote']['location_type'];
                        $connote->source_tariff_db = $request['connote']['source_tariff_db'];
                        $connote->id_source_tariff = $request['connote']['id_source_tariff'];
                        $connote->pod = $request['connote']['pod'];
                        $connote->history = array();
                    $tranx->connote = $connote;
                    $tranx->connote_id = $request->connote_id;

                    $tranx->save();
                }

                return $this->responseJSON(true, "Data Success", 200, $tranx);
            } catch (\Exception $e) {
                return $this->responseJSON(false, 'Bad Request', 400);
            }
    }

    public function DeletePackage(Request $request, $id)
    {
        try {
                $tranx = Transaction::find($id);

                if (!empty($tranx)){
                    $tranx->delete();
                }
               
                return $this->responseJSON(true, "Data Success", 200);
            } catch (\Exception $e) {
                return $this->responseJSON(false, 'Bad Request', 400);
            }
    }
}
