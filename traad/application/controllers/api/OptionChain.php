<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OptionChain extends CI_Controller {

    


    



    public function fetch_options() {
    // Get data from AJAX
    $instrument = $this->input->post('instrument');
    $expiry_date = $this->input->post('expiry_date');

    // Validate input
    if (empty($instrument) || empty($expiry_date)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid Input']);
        return;
    }

    // Upstox API URL
    $api_url = "https://api.upstox.com/v2/option/chain?instrument_key=" . urlencode($instrument) . "&expiry_date=" . urlencode($expiry_date);
    $api_token = "eyJ0eXAiOiJKV1QiLCJrZXlfaWQiOiJza192MS4wIiwiYWxnIjoiSFMyNTYifQ.eyJzdWIiOiIzQUNXTDYiLCJqdGkiOiI2N2I0MTRmMTBmODIxNDQ4NDE2ZTJiZGEiLCJpc011bHRpQ2xpZW50IjpmYWxzZSwiaWF0IjoxNzM5ODU1MDg5LCJpc3MiOiJ1ZGFwaS1nYXRld2F5LXNlcnZpY2UiLCJleHAiOjE3Mzk5MTYwMDB9.uy4UfCJNQoZ2H-HHWS8tgc4YACrHAW6aeLkp2EUGm0Q"; // Make sure the API token is correct and secured.

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer $api_token",
        "Content-Type: application/json"
    ));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute request
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo json_encode(['status' => 'error', 'message' => 'cURL Error: ' . curl_error($ch)]);
        curl_close($ch);
        return;
    }
    curl_close($ch);

    // Decode JSON response
    $data = json_decode($response, true);

    // Validate API response structure
    if (!isset($data['status']) || $data['status'] !== 'success') {
        echo json_encode([
            'status' => 'error', 
            'message' => 'API returned an error.', 
            'raw_response' => $response
        ]);
        return;
    }

    // Check for the 'data' key
    if (!isset($data['data']) || empty($data['data'])) {
        echo json_encode([
            'status' => 'error', 
            'message' => 'No option data found.', 
            'raw_response' => $response
        ]);
        return;
    }

    // Return the valid data
    echo json_encode(['status' => 'success', 'data' => $data['data']]);
}






   // public function fetch_options() 
   //  {
   //      // Get data from AJAX
   //      $instrument = $this->input->post('instrument');
   //      $expiry_date = $this->input->post('expiry_date');

   //      // Validate input
   //      if (empty($instrument) || empty($expiry_date)) {
   //          echo json_encode(['status' => 'error', 'message' => 'Invalid Input']);
   //          return;
   //      }

   //      // Upstox API URL
   //      $api_url = "https://api.upstox.com/v2/option/chain?instrument_key=" . urlencode($instrument) . "&expiry_date=" . urlencode($expiry_date);
   //     $api_token = "eyJ0eXAiOiJKV1QiLCJrZXlfaWQiOiJza192MS4wIiwiYWxnIjoiSFMyNTYifQ.eyJzdWIiOiIzQUNXTDYiLCJqdGkiOiI2N2I0MTRmMTBmODIxNDQ4NDE2ZTJiZGEiLCJpc011bHRpQ2xpZW50IjpmYWxzZSwiaWF0IjoxNzM5ODU1MDg5LCJpc3MiOiJ1ZGFwaS1nYXRld2F5LXNlcnZpY2UiLCJleHAiOjE3Mzk5MTYwMDB9.uy4UfCJNQoZ2H-HHWS8tgc4YACrHAW6aeLkp2EUGm0Q"; // Ensure this is securely stored

   //      // Initialize cURL
   //      $ch = curl_init();
   //      curl_setopt($ch, CURLOPT_URL, $api_url);
   //      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   //      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   //      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   //          "Authorization: Bearer $api_token",
   //          "Content-Type: application/json"
   //      ));
   //      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // If SSL issues occur

   //      // Execute request
   //      $response = curl_exec($ch);

   //      // Check for cURL errors
   //      if (curl_errno($ch)) {
   //          echo json_encode(['status' => 'error', 'message' => 'cURL Error: ' . curl_error($ch)]);
   //          curl_close($ch);
   //          return;
   //      }
   //      curl_close($ch);

   //      // Decode JSON response
   //      $data = json_decode($response, true);

   //      // Debugging: Print the raw response if empty
   //      if (!$data) {
   //          echo json_encode([
   //              'status' => 'error', 
   //              'message' => 'Empty or malformed JSON response.', 
   //              'raw_response' => $response
   //          ]);
   //          return;
   //      }

   //      // Validate API response structure
   //      if (!isset($data['status']) || $data['status'] !== 'success') {
   //          echo json_encode([
   //              'status' => 'error', 
   //              'message' => 'API returned an error.', 
   //              'raw_response' => $response
   //          ]);
   //          return;
   //      }

   //      // Check for the 'data' key
   //      if (!isset($data['data']) || empty($data['data'])) {
   //          echo json_encode([
   //              'status' => 'error', 
   //              'message' => 'No option data found.', 
   //              'raw_response' => $response
   //          ]);
   //          return;
   //      }

   //      // Return the valid data
   //      echo json_encode(['status' => 'success', 'data' => $data['data']]);
   //  }


}
