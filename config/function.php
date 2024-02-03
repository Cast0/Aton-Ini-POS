<?php

session_start();

require 'dbcon.php';

//input field validation
function validate($inputData){

    global $conn;
    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);
}

//redirect from 1 page to another page with status message

function redirect($url, $status){

    $_SESSION ['status'] = $status;
    header('Location: '.$url);
    exit(0);
}

//Display messages or status after any process.

function alertMessage(){
    if(isset($_SESSION['status'])){
        $_SESSION['status'];
        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$_SESSION['status'].'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        unset($_SESSION['status']);  

    }
}



function insert($tableName, $data)
{

    global $conn;

    $table = validate($tableName);

    $column = array_keys($data);
    $values = array_values($data);

    $finalColumn =implode(',', $column);
    $finalValues = "'".implode("','",$values)."'";

    $query = "INSERT INTO $table ($finalColumn) VALUES ($finalValues)";
    $result = mysqli_query($conn, $query);

    return $result;

}

//update data using this function

function update($tableName,$id,$data){

    global $conn;
    $table = validate($tableName);
    $id = validate($id);

    $updateDataString = "";

    foreach($data as $column => $value){
        $updateDataString .= $column.'='."'$value',";
    }

    $finalUpdateData =substr(trim($updateDataString),0,-1);

    $query = "UPDATE $table SET $finalUpdateData WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    return $result;    
}

function getAll($tableName, $status = NULL){

    global $conn;
    $table = validate($tableName);
    $status = validate($status);

    if($status == 'status'){

        $query = "SELECT * FROM $table WHERE status = '0'";
    }

    else{

        $query = "SELECT * FROM $table ";
    }
    return mysqli_query($conn, $query);
}

function getByID($tableName, $id){

    global $conn;
    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $response = [
                'status' =>404,
                'data' => $row,
                'message' => 'Record Found'];
            return $response;

        }else{
            $response = [
                'status' =>404,
                'message' => 'No Data Found'
            ];
            return $response;
        }

    }
    else{
        $response = [
            'status' =>500,
            'message' => 'Invalid'
        ];
        return $response;
    }


}

//Delete data from database using id

function delete ($tableName, $id){
    global $conn;
    $table = validate($tableName);
    $id = validate($id);

    $query = "DELETE FROM $table WHERE id = '$id' LIMIT 1";

    $result = mysqli_query($conn, $query);
    return $result;
}

?>