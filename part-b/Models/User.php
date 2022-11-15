<?php
require_once 'Database.php';

class User{

    private function validate($data) {

        $errors = array();
        if ( !isset($data['name']) || empty($data['name']) ) {
            $errors[] = 'Name is required';
        }
        else if (!isset($data['dob']) || empty($data['dob']) ) {
            $errors[] = 'Birthdate is required';
        }
        else if (!isset($data['address']) || empty($data['address']) ) {
            $errors[] = 'Address is required';
        }
        else if (!isset($data['photo']) || empty($data['photo']) ) {
            $errors[] = 'Profile Photo is required';
        }
        else if (!isset($data['card_holder']) || empty($data['card_holder']) ) {
            $errors[] = 'Card Holder is required';
        }
        else if (!isset($data['card_holder']) || empty($data['card_number']) ) {
            $errors[] = 'Card number is required';
        }
        
        if (empty($errors) ) {
            return;
        }

        throw new Exception ( $errors [0].' '.isset($errors[1]));

    }

    public function createNewUser($data) {

        $folder = "public/upload/profile_photo/" . $data['photo'];
        try {
            $pdo = Database::connect();
            $this->validate($data);
            $stmt = $pdo->prepare("INSERT INTO users (name, dob, address, photo, card_holder, card_number, e_date, cvv) VALUES (?,?,?,?,?,?,?,?)");
			$res = $stmt->execute([ $data['name'], $data['dob'], $data['address'], $data['photo'] , $data['card_holder'], $data['card_number'], $data['e_date'], $data['cvv']]);
            if($res){
               move_uploaded_file($data['temp_photo'], $folder);
            }
            Database::disconnect();
            } catch (Exception $e) {
                Database::disconnect();
                throw $e;
        }
    }
}
?>