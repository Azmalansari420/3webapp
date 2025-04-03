<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CronJob extends CI_Controller 
{
     
    public function daily_320()
    {
        $date_time = date("Y-m-d H:i:s");

        $buysell = $this->db
        ->where("trade_close_datetime <=", $date_time)
        ->get_where("buy_sell_transactions",["type"=>1,])->result_object();


        if(!empty($buysell))
        {
            foreach ($buysell as $key => $value)
            {
                $user_id = $value->user_id;
                $getLastPrice = $this->getLastPrice($value->instrument_key,$value->expiry_date,$value);

                $exit_price = $getLastPrice['liveLtpPrice'];
                $plpTotal = $getLastPrice['plpTotal'];

                $walletPlus = 0;
                if($exit_price>$value->ltp_price)
                {
                    $buyPrice = $value->ltp_price*$value->quantity;
                    $walletPlus = ($buyPrice+$plpTotal);
                }
                else
                {
                    $buyPrice = $value->ltp_price*$value->quantity;
                    $walletPlus = ($buyPrice+$plpTotal);
                }
                
                $id = $value->id;

                $this->db->update("buy_sell_transactions",["sell_price"=>$exit_price,"type"=>2,],["id"=>$id,]);
                $this->db->insert("modify_log",["user_id"=>$user_id,"buy_sell_id"=>$id,"date_time"=>$date_time,"detail"=>"Auto Sell $exit_price",]);

                $requestid = time();
                $type = "credit";
                $add_type = 3;
                $message = "Exit Stock";
                $this->crud->wallet_credit_debit($requestid, $user_id, $type, $add_type, $walletPlus, $message);
                $update_wallet_amount = $this->crud->wallet($user_id);


            }
        }
    }

    public function getLastPrice($instrument_key,$expiry_date,$item)
    {
        $site_setting = $this->crud->fetchdatabyid('1','site_setting');
        $item = (array) $item;
        $plpTotal = 0;
        $liveDataUrl = "https://api.upstox.com/v2/option/chain?instrument_key=$instrument_key&expiry_date=$expiry_date";
        
        // Fetch live data from Upstox API
        $ch = curl_init($liveDataUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $site_setting[0]->token
        ]);
        
        $liveDataResponse = curl_exec($ch);
        curl_close($ch);
        
        $liveData = json_decode($liveDataResponse, true)['data'] ?? [];
        
        $liveLtpPrice = 0;
        if (!empty($liveData)) {
            foreach ($liveData as $dataItem) {
                if ($item['callputtype'] == 1 && $dataItem['call_options']['instrument_key'] == $item['clickable_instumentkey']) {
                    $liveLtpPrice = $dataItem['call_options']['market_data']['ltp'];
                } elseif ($item['callputtype'] != 1 && $dataItem['put_options']['instrument_key'] == $item['clickable_instumentkey']) {
                    $liveLtpPrice = $dataItem['put_options']['market_data']['ltp'];
                }
            }
        }
        
        $difference = $liveLtpPrice - $item['ltp_price'];
        $plp = $difference * $item['quantity'];
        $plpTotal += $plp;
        return ["liveLtpPrice"=>$liveLtpPrice,"plpTotal"=>$plpTotal,];
    }

    public function targetstoploss()
    {
        $date_time = date("Y-m-d H:i:s");

        $buysell = $this->db
            ->where("trade_close_datetime <=", $date_time)
            ->group_start() // Start grouping OR conditions
                ->where("modify_target !=", 0)
                ->or_where("modify_stoploss !=", 0)
            ->group_end() // End grouping
            ->where_in("type", [1,3]) // Uncomment if needed
            ->get("buy_sell_transactions")
            ->result_object();

        

        if(!empty($buysell))
        {
            foreach ($buysell as $key => $value)
            {
                $user_id = $value->user_id;
                $modify_target = $value->modify_target;
                $modify_stoploss = $value->modify_stoploss;
                $price_optional = $value->price_optional;
                $getLastPrice = $this->getLastPrice($value->instrument_key,$value->expiry_date,$value);

                $exit_price = $getLastPrice['liveLtpPrice'];
                $plpTotal = $getLastPrice['plpTotal'];

                if($value->type==1)
                {

                    if($exit_price>=$modify_target)
                    {
                        $walletPlus = 0;
                        if($exit_price>$value->ltp_price)
                        {
                            $buyPrice = $value->ltp_price*$value->quantity;
                            $walletPlus = ($buyPrice+$plpTotal);
                        }
                        else
                        {
                            $buyPrice = $value->ltp_price*$value->quantity;
                            $walletPlus = ($buyPrice+$plpTotal);
                        }
                        
                        $id = $value->id;

                        $this->db->update("buy_sell_transactions",["sell_price"=>$exit_price,"type"=>2,],["id"=>$id,]);
                        $this->db->insert("modify_log",["user_id"=>$user_id,"buy_sell_id"=>$id,"date_time"=>$date_time,"detail"=>"Auto Sell $exit_price",]);

                        $requestid = time();
                        $type = "credit";
                        $add_type = 3;
                        $message = "Exit Stock";
                        $this->crud->wallet_credit_debit($requestid, $user_id, $type, $add_type, $walletPlus, $message);
                        $update_wallet_amount = $this->crud->wallet($user_id);
                    }

                    if($exit_price<$modify_stoploss)
                    {
                        $walletPlus = 0;
                        if($exit_price>$value->ltp_price)
                        {
                            $buyPrice = $value->ltp_price*$value->quantity;
                            $walletPlus = ($buyPrice+$plpTotal);
                        }
                        else
                        {
                            $buyPrice = $value->ltp_price*$value->quantity;
                            $walletPlus = ($buyPrice+$plpTotal);
                        }
                        
                        $id = $value->id;

                        $this->db->update("buy_sell_transactions",["sell_price"=>$exit_price,"type"=>2,],["id"=>$id,]);
                        $this->db->insert("modify_log",["user_id"=>$user_id,"buy_sell_id"=>$id,"date_time"=>$date_time,"detail"=>"Auto Sell $exit_price",]);

                        $requestid = time();
                        $type = "credit";
                        $add_type = 3;
                        $message = "Exit Stock";
                        $this->crud->wallet_credit_debit($requestid, $user_id, $type, $add_type, $walletPlus, $message);
                        $update_wallet_amount = $this->crud->wallet($user_id);
                    }
                }
                else if($value->type==3)
                {
                    $checkPriceOptional = false;
                    if($value->ltp_price>$price_optional)
                    {
                        if($exit_price<=$price_optional)
                        {
                            $checkPriceOptional = true;
                        }
                    }

                    if($value->ltp_price<$price_optional)
                    {
                        if($exit_price>=$price_optional)
                        {
                            $checkPriceOptional = true;
                        }
                    }



                    if($checkPriceOptional)
                    {
                        $id = $value->id;
                        $this->db->update("buy_sell_transactions",["ltp_price"=>$price_optional,"type"=>1,],["id"=>$id,]);
                        $this->db->insert("modify_log",["user_id"=>$user_id,"buy_sell_id"=>$id,"date_time"=>$date_time,"detail"=>"Buy $price_optional",]);

                        $requestid = time();
                        $type = "debit";
                        $add_type = 3;
                        $message = "Purchase Stock";
                        $amount = $price_optional*$value->quantity;

                        $this->crud->wallet_credit_debit($requestid, $user_id, $type, $add_type, $amount, $message);
                        $update_wallet_amount = $this->crud->wallet($user_id);
                    }
                }



            }
        }
    }





    public function persecond()
    {            
        set_time_limit(0);
        $i=1;
        while (true)
        {
            $this->targetstoploss();
            // file_put_contents("log.txt", date("Y-m-d H:i:s") . "\n", FILE_APPEND);
            sleep(1);
            $i++;
            if($i==60) break;
        }
        
    }







}