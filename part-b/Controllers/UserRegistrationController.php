<?php
require_once 'Models/User.php'; 
class UserRegistrationController{

  private $user = NULL;

    public function __construct() {
        $this->user = new User();
    }

    public function redirect($location,$msg) {
        header('Location: '.$location.'?'.'msg='.$msg);
    }

    public function saveUser($data) {
        
        $name = '';
        $dob = '';
        $address = '';
        $photo = '';
        $card_holder = '';
        $card_number = '';
        $e_date = '';
        $cvv = '';

        if (isset($_POST['btn']) ) {

            $data = [];
            $data['name']          = isset($_POST['name'])         ?   $_POST['name']    :NULL;
            $data['dob']           = isset($_POST['dob'])          ?   $_POST['dob']     :NULL;
            $data['photo']         = isset($_POST['photo'])        ?   $_POST['photo']     :NULL;
            $data['address']       = isset($_POST['address'])      ?   $_POST['address'] :NULL;
            $data['card_holder']   = isset($_POST['card_holder'])  ?   $_POST['card_holder'] :NULL;
            $data['card_number']   = isset($_POST['card_number'])  ?   $_POST['card_number'] :NULL;
            $data['e_date']        = isset($_POST['e_date'])       ?   $_POST['e_date'] :NULL;
            $data['cvv']           = isset($_POST['cvv'])          ?   $_POST['cvv'] :NULL;

            $data['photo'] = $_FILES["photo"]["name"];
            $data['temp_photo'] = $_FILES["photo"]["tmp_name"];

            try {
                $message = urlencode("Your Registration Successfull");
                $this->user->createNewUser($data);
                $this->redirect('index.php',$message);
                return;
            } catch (Exception $exception) { 
                echo 'Error: '. $exception->getMessage(); 
            }
        }
    }
}
?>