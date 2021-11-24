<?php

class ApiView{

    public function response($data, $status) { 
        header("Content-Type: application/json");
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status)); 
        echo json_encode($data); 
    }
    
    private function _requestStatus($code){
        $status = array( 
            200 => "OK",
			311 => "Decoding failed",
            315 => "Not a registered user",
            316 => "Not an admin user",
            404 => "Not found",
            500 => "Internal Server Error",
            501 => "Internal Error in Tasks web"
          );
          return (isset($status[$code]))? $status[$code] : $status[500];
    }
}
    