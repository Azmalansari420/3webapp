<?php
class Instagram extends CI_Controller 
{
    private $shortLivedToken = 'IGQWRNRVU5SE9lOVVlRElIbUd6dlAzU2hqYWxLdDRGbFBvVDItRXlpUk9JUS1uVjFrdVlva24wSGVOUDV1UWFWZAXVVQXB5cDlhTlVPaWxnRjlfQng0eHA2bDFOWWFPbTg2ZAk5ZAcTRWQXRYOGNWdVMtNW1ZAUWhZAb00ZD';
    private $clientSecret = 'b32d038ede47110d73b91798fa3bf37f';

    public function fetch_posts() 
    {
        // Step 1: Exchange short-lived token for long-lived token
        $url = "https://graph.instagram.com/access_token?grant_type=ig_exchange_token&client_secret={$this->clientSecret}&access_token={$this->shortLivedToken}";



        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        // Debugging the token exchange
        echo "Token Exchange Response: ";
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();

        if (isset($data['access_token'])) {
            $longLivedToken = $data['access_token'];
            $this->fetch_media($longLivedToken);
        } else {
            echo "Error: " . json_encode($data);
        }
    }

    public function fetch_media($accessToken) 
    {
        // Step 2: Fetch media posts
        $url = "https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,thumbnail_url,timestamp&access_token={$accessToken}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        // Debugging the media fetch response
        echo "Media Fetch Response: ";
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();

        if (isset($data['data'])) {
            $this->load->view('instagram_posts', ['posts' => $data['data']]);
        } else {
            echo "Error fetching posts: " . json_encode($data);
        }
    }
}
