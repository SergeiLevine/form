<?

require('validator.php');
require('simple_helper.php');

// simplehelper class sepparated from main controller to reduce the number of functions
$helper = new SimpleHelper($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validation class sepparated from main controller because he has a different functionality
    $validation = new Validator($_POST);
    $errors = $validation->validateForm();

    if(empty($errors)){
        //calling for a fuction from SimpleHelper class to send an email
        $notification = $helper->send_email_to_support();
    }
      
}

//api call to get list of all countries
function get_list_of_countries(){
    $url = "https://restcountries.eu/rest/v2/all?fields=name";
    return getCallAPI($url);
}
//GET api call
function getCallAPI($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    $result = curl_exec($curl);

    if(!$result){die("Connection Failure");}

    curl_close($curl);
    
    return json_decode($result, true);
}





?>