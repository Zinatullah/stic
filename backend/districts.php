<?php
$connection = mysqli_connect('localhost', 'akrami', 'afghan', 'sti');

$province = $_GET['province'];
$check_query = 'select * from z_districts where province = "' . $province . '"';
$check_result = mysqli_query($connection, $check_query);
$data = mysqli_fetch_all($check_result);


if (mysqli_num_rows($check_result) > 0) {
    // Create an empty array to store the fetched data
    $datas = array();

    foreach ($data as $value) {
        $datas[] = $value;
    }
    

    // Loop through each row of the result
    // while ($row = $result->fetch_assoc()) {
        // Store the row data in the array
    // }

    // Setting the response header to JSON
    header('Content-Type: application/json');

    // Returning the JSON-encoded response
    echo json_encode($datas);
} else {
    echo "No data found.";
}

// foreach ($data as $value) {
//     echo $value[2];
// }
