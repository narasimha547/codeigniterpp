<?php

class PayPal {

    private $data = null;

    public function PayPal($data) {
        $this->data = $data;
    }

    public function verify_email($receiverEmail) {

        if (key_exists('receiver_email', $this->data)) {
            return $this->data['receiver_email'] == $receiverEmail;
        }
        else {
            return false;
        }
    }
}

?>
