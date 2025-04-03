
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocklist extends CI_Controller 
{
     
    public function __construct()
    {
        parent::__construct();
    }


    public function getstocklist() 
    {
        $url = "https://api.twelvedata.com/stocks";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);  
        $response = curl_exec($ch);
        $data = json_decode($response, true);
        curl_close($ch);
        $grouped_stocks = [];
        foreach ($data['data'] as $stock) 
        {
            if ($stock['country'] === 'India') 
            {
                $grouped_stocks[$stock['symbol']][] = $stock;
            }
        }

        $result = array();

        $page = $this->input->post("page");
        $limit = 10;
        $offset = 0;

        if($page>0)
        {
            $offset = $page*$limit;
        }
        $this->db->limit($limit,$offset);



        if (!empty($grouped_stocks)) 
        {
           $flattened_stocks = [];
            foreach ($grouped_stocks as $symbol => $stocks) 
            {
                $flattened_stocks[] = ['symbol' => $symbol, 'stocks' => array_slice($stocks, 0, 10)];
            }

            $flattened_stocks = array_slice($flattened_stocks, 0, 500);

            $response_data['stocks'] = $flattened_stocks;
            $html = $this->load->view('app/user/include/stock-list', $response_data, true);

            $result['status'] = '200';
            $result['message'] = 'SUCCESS';
            $result['data'] = $html;
        } else {
            $result['status'] = '400';
            $result['message'] = 'No Data Found';
            $result['data'] = [];
        }

        // Return the result as a JSON response
        echo json_encode($result);
    }
   

//     public function getstocklist() {
//     // Mock response as a valid JSON string
//     $response = '{
//         "data": [
//             {
//                 "symbol": "000",
//                 "name": "Greenvolt - Energias Renováveis, S.A.",
//                 "currency": "EUR",
//                 "exchange": "FSX",
//                 "mic_code": "XFRA",
//                 "country": "Germany",
//                 "type": "Common Stock",
//                 "figi_code": "BBG011RFH095"
//             },
//             {
//                 "symbol": "000001",
//                 "name": "Ping An Bank Co., Ltd.",
//                 "currency": "CNY",
//                 "exchange": "SZSE",
//                 "mic_code": "XSHE",
//                 "country": "China",
//                 "type": "Common Stock",
//                 "figi_code": "BBG000BZDQD3"
//             },
//             {
//                 "symbol": "000002",
//                 "name": "China Vanke Co., Ltd.",
//                 "currency": "CNY",
//                 "exchange": "SZSE",
//                 "mic_code": "XSHE",
//                 "country": "China",
//                 "type": "Common Stock",
//                 "figi_code": "BBG000BZB0Z8"
//             },
//             {
//                 "symbol": "000004",
//                 "name": "Shenzhen GuoHua Network Security Technology Co., Ltd.",
//                 "currency": "CNY",
//                 "exchange": "SZSE",
//                 "mic_code": "XSHE",
//                 "country": "China",
//                 "type": "Common Stock",
//                 "figi_code": "BBG000BZFTX3"
//             },
//             {
//                 "symbol": "000006",
//                 "name": "Shenzhen Zhenye ",
//                 "currency": "CNY",
//                 "exchange": "SZSE",
//                 "mic_code": "XSHE",
//                 "country": "China",
//                 "type": "Common Stock",
//                 "figi_code": "BBG000BZFRZ5"
//             },
//             {
//                 "symbol": "000007",
//                 "name": "Shenzhen Quanxinhao Co., Ltd.",
//                 "currency": "CNY",
//                 "exchange": "SZSE",
//                 "mic_code": "XSHE",
//                 "country": "China",
//                 "type": "Common Stock",
//                 "figi_code": "BBG000BZDNB2"
//             },
//             {
//                 "symbol": "000008",
//                 "name": "China High-Speed Railway Technology Co., Ltd.",
//                 "currency": "CNY",
//                 "exchange": "SZSE",
//                 "mic_code": "XSHE",
//                 "country": "China",
//                 "type": "Common Stock",
//                 "figi_code": "BBG000BZGN01"
//             },
//             {
//                 "symbol": "000009",
//                 "name": "China Baoan Group Co., Ltd.",
//                 "currency": "CNY",
//                 "exchange": "SZSE",
//                 "mic_code": "XSHE",
//                 "country": "China",
//                 "type": "Common Stock",
//                 "figi_code": "BBG000BZDLT7"
//             },
//             {
//                 "symbol": "000010",
//                 "name": "Shenzhen Ecobeauty Co., Ltd.",
//                 "currency": "CNY",
//                 "exchange": "SZSE",
//                 "mic_code": "XSHE",
//                 "country": "China",
//                 "type": "Common Stock",
//                 "figi_code": "BBG000P6HP77"
//             },
//             {
//                 "symbol": "000011",
//                 "name": "Shenzhen Properties & Resources Development ",
//                 "currency": "CNY",
//                 "exchange": "SZSE",
//                 "mic_code": "XSHE",
//                 "country": "China",
//                 "type": "Common Stock",
//                 "figi_code": "BBG000BZDKR1"
//             },
//             {
//                 "symbol": "000012",
//                 "name": "CSG Holding Co., Ltd.",
//                 "currency": "CNY",
//                 "exchange": "SZSE",
//                 "mic_code": "XSHE",
//                 "country": "China",
//                 "type": "Common Stock",
//                 "figi_code": "BBG000BZ9LD9"
//             },
//             {
//                 "symbol": "000014",
//                 "name": "Shahe Industrial Co., Ltd",
//                 "currency": "CNY",
//                 "exchange": "SZSE",
//                 "mic_code": "XSHE",
//                 "country": "China",
//                 "type": "Common Stock",
//                 "figi_code": "BBG000BZBX31"
//             },
//             {
//                 "symbol": "000016",
//                 "name": "Konka Group Co., Ltd.",
//                 "currency": "CNY",
//                 "exchange": "SZSE",
//                 "mic_code": "XSHE",
//                 "country": "China",
//                 "type": "Common Stock",
//                 "figi_code": "BBG000BZCNJ5"
//             }
//         ]
//     }';

//     // Decode the JSON response
//     $data = json_decode($response, true);




//     // Prepare the result array
//     $result = array();

//     if (!empty($data['data'])) {
//         // Limit the data to the first 10 stocks
//         $stocks = array_slice($data['data'], 0, 10);

//         // print_r($stocks);
//         // die;

//         // Load the HTML view for rendering the stock data
//         $response_data['stocks'] = $stocks;
//         $html = $this->load->view('app/user/include/stock-list', $response_data, true);

//         $result['status'] = '200';
//         $result['message'] = 'SUCCESS';
//         $result['data'] = $html;
//     } else {
//         $result['status'] = '400';
//         $result['message'] = 'No Data Found';
//         $result['data'] = [];
//     }

//     // Return the result as a JSON response
//     echo json_encode($result);
// }

// public function getstocklist() 
// {
//     // $url = "https://api.twelvedata.com/stocks";
//     // $ch = curl_init();

//     // curl_setopt($ch, CURLOPT_URL, $url);
//     // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     // curl_setopt($ch, CURLOPT_TIMEOUT, 30);  
//     // $response = curl_exec($ch);

//     $response = "{
//     "data": [
//         {
//             "symbol": "000",
//             "name": "Greenvolt - Energias Renováveis, S.A.",
//             "currency": "EUR",
//             "exchange": "FSX",
//             "mic_code": "XFRA",
//             "country": "Germany",
//             "type": "Common Stock",
//             "figi_code": "BBG011RFH095"
//         },
//         {
//             "symbol": "000001",
//             "name": "Ping An Bank Co., Ltd.",
//             "currency": "CNY",
//             "exchange": "SZSE",
//             "mic_code": "XSHE",
//             "country": "China",
//             "type": "Common Stock",
//             "figi_code": "BBG000BZDQD3"
//         },
//         {
//             "symbol": "000002",
//             "name": "China Vanke Co., Ltd.",
//             "currency": "CNY",
//             "exchange": "SZSE",
//             "mic_code": "XSHE",
//             "country": "China",
//             "type": "Common Stock",
//             "figi_code": "BBG000BZB0Z8"
//         },
//         {
//             "symbol": "000004",
//             "name": "Shenzhen GuoHua Network Security Technology Co., Ltd.",
//             "currency": "CNY",
//             "exchange": "SZSE",
//             "mic_code": "XSHE",
//             "country": "China",
//             "type": "Common Stock",
//             "figi_code": "BBG000BZFTX3"
//         }
//      ]
//      }"

//     if(curl_errno($ch)) {
//         $data = array('error' => curl_error($ch));
//     } else {
//         $data = json_decode($response, true); // Decode the JSON response
//     }

//     curl_close($ch);

//     print_r($data);

//     // Prepare the result array
//     $result = array();

//     if (!empty($data['data'])) 
//     {
//         $stocks = array_slice($data['data'], 0, 10);
//         // Load the HTML view for rendering the stock data
//         $response_data['stocks'] = $stocks;
//         $html = $this->load->view('app/user/include/stock-list', $response_data, true);

//         // $response_data['stocks'] = $data['data'];
//         // $html = $this->load->view('app/user/include/stock-list', $response_data, true);

//         $result['status'] = '200';
//         $result['message'] = 'SUCCESS';
//         $result['data'] = $html;
//     } else {
//         $result['status'] = '400';
//         $result['message'] = 'No Data Found';
//         $result['data'] = [];
//     }

//     // Return the result as a JSON response
//     echo json_encode($result);
// }




    public function show_stock_chart() 
    {
        // Example data fetched from API (replace with actual API call if needed)
        $stock_data = [
            [
                "datetime" => "2025-01-28 15:29:00",
                "open" => 1832.44995,
                "high" => 1833.099976,
                "low" => 1829.75,
                "close" => 1829.75,
                "volume" => 3531
            ],
            // Add other data points...
        ];

        // Prepare data for chart
        $labels = [];
        $open_values = [];
        $close_values = [];

        foreach ($stock_data as $data) {
            $labels[] = $data['datetime'];
            $open_values[] = $data['open'];
            $close_values[] = $data['close'];
        }

        $data_for_chart = [
            'labels' => $labels,
            'open' => $open_values,
            'close' => $close_values
        ];

        // print_r($data_for_chart);
        // die;

        // Pass the data to the view
        $this->load->view('app/user/time-series', $data_for_chart);
    }







}