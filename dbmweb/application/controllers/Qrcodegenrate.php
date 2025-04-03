<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;

class Qrcodegenrate extends CI_Controller {

    public function invitationqrcode() {
        $get_user_id = $this->session->userdata("user")['id'];

        $user = $this->db->get_where("users",array('id'=>$get_user_id))->result_object();

        $user_id = $user[0]->user_id;

        if (empty($get_user_id)) 
        {
            echo json_encode([
                "status" => 400,
                "message" => "User not found",
                "data" => []
            ]);
            return;
        }

        $invite_link = base_url() . "app/user/register?inviteCode=" . $user_id;

        // Create QR code
        $qrCode = QrCode::create($invite_link)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
            ->setSize(200)
            ->setMargin(10)
            ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin);

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        // Save QR code
        $qr_code_path = 'media/uploads/qr_codes/';
        if (!is_dir(FCPATH . $qr_code_path)) {
            mkdir(FCPATH . $qr_code_path, 0777, true);
        }

        $file_name = 'qr_' . $user_id . '.png';
        $file_path = FCPATH . $qr_code_path . $file_name;

        file_put_contents($file_path, $result->getString());

        $qr_code_url = base_url($qr_code_path . $file_name);

        echo json_encode([
            "status" => 200,
            "message" => "QR Code Generated Successfully.",
            "data" => $qr_code_url,
            "invite_link" => $invite_link
        ]);
    }
}
