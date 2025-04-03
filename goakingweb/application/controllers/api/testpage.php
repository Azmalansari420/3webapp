<?php

// &id=<?=$device_id 


public function place_bet()
{
    $request_id = time();
    $user_id = $this->session->userdata("user")['id'];
    $game_id = $this->input->post('game_id');
    $numbers = $this->input->post('numbers'); // Array of numbers
    $amounts = $this->input->post('amounts'); // Array of amounts
    $date = date("Y-m-d");
    $time = date("H:i:s");

    // Check if user exists
    $user = $this->db->get_where("users", array("id" => $user_id, 'status' => 1))->result_object();
    if (empty($user)) {
        echo json_encode(["status" => 400, "message" => "Account Closed By Admin.", "data" => []]);
        return;
    }

    // Get the user's wallet balance
    $wallet_amount = $this->crud->wallet($user_id);
    $total_bet_amount = array_sum($amounts);
    if ($total_bet_amount > $wallet_amount) {
        echo json_encode(["status" => 400, "message" => "Insufficient balance.", "data" => []]);
        return;
    }

    $bets = [];
    foreach ($numbers as $key => $number) {
        $amount = $amounts[$key];
        $bets[] = [
            'request_id' => $request_id,
            'user_id' => $user_id,
            'game_id' => $game_id,
            'game_type' => 1,
            'number' => $number,
            'amount' => $amount,
            'date' => $date,
            'time' => $time,
            'addeddate' => date('Y-m-d H:i:s'),
        ];
    }

    // Debit the user's wallet
    $this->crud->wallet_credit_debit($user_id, "debit", $total_bet_amount, "Play Game", $request_id);

    // Insert all bets into the database
    $this->db->insert_batch('game_bet', $bets);

    echo json_encode([
        "status" => 200,
        "message" => "Bets placed successfully.",
        "data" => ["bets" => $bets],
    ]);
}



public function jodi_place_bet()
{
    $request_id = time();
    $user_id = $this->session->userdata("user")['id'];        
    $game_id = $this->input->post('game_id');
    $game_type = 1;
    $numbers = $this->input->post('numbers'); // Assuming 'numbers[]' is sent from the frontend
    $amounts = $this->input->post('amounts'); // Assuming 'amounts[]' is sent from the frontend
    $date = date("Y-m-d");
    $time = date("H:i:s");

    // Ensure numbers and amounts are arrays
    if (!is_array($numbers) || !is_array($amounts)) {
        echo json_encode(["status" => 400, "message" => "Invalid input data.", "data" => []]);
        return;
    }

    // Ensure numbers and amounts have the same count
    if (count($numbers) !== count($amounts)) {
        echo json_encode(["status" => 400, "message" => "Numbers and amounts count mismatch.", "data" => []]);
        return;
    }

    // Check if user exists
    $user = $this->db->get_where("users", array("id" => $user_id, 'status' => 1))->result_object();
    if (empty($user)) {
        echo json_encode(["status" => 400, "message" => "Account Closed By Admin.", "data" => []]);
        return;
    }

    // Calculate total bet amount
    $total_bet_amount = array_sum($amounts);

    // Get the user's wallet balance
    $wallet_amount = $this->crud->wallet($user_id);
    if ($total_bet_amount > $wallet_amount) {
        echo json_encode(["status" => 400, "message" => "Insufficient balance.", "data" => []]);
        return;
    }

    $bets = [];
    foreach ($numbers as $key => $number) {
        $amount = $amounts[$key];
        $bets[] = [
            'request_id' => $request_id,
            'user_id' => $user_id,
            'game_id' => $game_id,
            'game_type' => $game_type,
            'number' => $number,
            'amount' => $amount,
            'date' => $date,
            'time' => $time,
            'addeddate' => date('Y-m-d H:i:s'),
        ];
    }

    // Debit the user's wallet
    $this->crud->wallet_credit_debit($user_id, "debit", $total_bet_amount, "Play Game", $request_id);

    // Insert all bets into the database
    $this->db->insert_batch('game_bet', $bets);

    // Return response
    echo json_encode([
        "status" => 200,
        "message" => "Bets placed successfully.",
        "data" => ["bets" => $bets],
    ]);
}



./gradlew assembleRelease


























































`

function calculateTotal() {
    let total = 0;
    const inputs = document.querySelectorAll('.bet-input');
    inputs.forEach(input => {
        const value = parseFloat(input.value);
        if (!isNaN(value)) {
            total += value;
            console.log(`${input.name} - ${value}`);
        }
    });

    document.getElementById('total-bet').textContent = total;
}

const betInputs = document.querySelectorAll('.bet-input');
betInputs.forEach(input => {
    input.addEventListener('input', calculateTotal);
});

/* Game bet */
$(document).on("click", ".place-bet-btn", function (e) {
    place_bet();
});

function place_bet() {
    var game_id = <?=$game_id ?>;
    var form = new FormData();
    form.append("game_id", game_id);

    const inputs = document.querySelectorAll('.bet-input');
    inputs.forEach(input => {
        const number = input.name; // Example: Assume `input.name` holds the number
        const amount = parseFloat(input.value);

        if (!isNaN(amount)) {
            form.append("numbers[]", number);
            form.append("amounts[]", amount);
        }
    });

    var settings = {
        url: "<?=base_url() ?>api/Game_bet/place_bet",
        method: "POST",
        dataType: "json",
        timeout: 0,
        processData: false,
        mimeType: "multipart/form-data",
        contentType: false,
        data: form
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
        toaster(response.message, 'success');
        if (response.status == 200) {
            setTimeout(function () {
                $("#exampleModalCenter").modal('hide');
            }, 100);
        }
    });
}







