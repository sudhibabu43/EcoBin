<?php

// $pincode=$_POST['pincode'];
// $data=file_get_contents('https://api.postalpincode.in/pincode/'.$pincode);
// $data=json_decode($data);
// if (isset($data->PostOffice['0'])) {
//     $arr['city']=$data->PostOffice['0']->Taluk;
//     $arr['state']=$data->PostOffice['0']->State;
//     echo json_encode ($arr);
// } else {
//     echo'no';
// }

?>
<?php
// if(isset($_POST['pincode'])){
//     $pincode = $_POST['pincode'];

//     // Validate and sanitize the pincode
//     // ... (implement your validation/sanitization logic here)

if(isset($_POST['pincode'])) {
    $pincode = $_POST['pincode'];

    // Validate and sanitize the pincode if needed
    // ...

    // Fetch data from the PostalPINCode API
    $apiUrl = "https://api.postalpincode.in/pincode/$pincode";
    $response = file_get_contents($apiUrl);
    
    if ($response !== false) {
        $data = json_decode($response);

        if (is_array($data) && $data[0]->Status == 'Success') {
            $postOffice = $data[0]->PostOffice[0];
            $city = $postOffice->District;
            $localarea = $postOffice->Name;
            
            $result = array('city' => $city, 'localarea' => $localarea);
            echo json_encode($result);
            
        } else {
            $errorp="Invalid pincode"; // Handle the case where no data is available
        }
    } else {
        $errorp="Error fetching data from API"; // Handle the case where the API request failed
    }
}
?>


