<?


function get_list_of_countries(){
    $url = "https://restcountries.eu/rest/v2/all?fields=name";
    $get_data = callAPI('GET', $url);
    $response = json_decode($get_data, true);
    return $response;
}

function callAPI($method, $url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
 }


?>