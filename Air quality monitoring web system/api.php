<?php
header("Content-Type: application/json");

include 'db.php';

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        getSensorReadings();
        break;
    case 'POST':
        insertSensorReading();
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function getSensorReadings() {
    global $conn;
    $sql = "SELECT * FROM sensor_readings ORDER BY timestamp DESC";
    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}

function insertSensorReading() {
    global $conn;
    $pollutant_name = $_POST["pollutant_name"];
    $sensor_name = $_POST["sensor_name"];
    $standard_concentration = $_POST["standard_concentration"];
    $actual_concentration = $_POST["actual_concentration"];
    $aqhi = $_POST["aqhi"];
    $state = $_POST["state"];
    
    $sql = "INSERT INTO sensor_readings (pollutant_name, sensor_name, standard_concentration, actual_concentration, aqhi, state) 
            VALUES ('$pollutant_name', '$sensor_name', $standard_concentration, $actual_concentration, $aqhi, '$state')";
    if ($conn->query($sql) === TRUE) {
        $response = array("status" => 1, "message" => "Record added successfully.");
    } else {
        $response = array("status" => 0, "message" => "Error: " . $conn->error);
    }
    echo json_encode($response);
}
?>
