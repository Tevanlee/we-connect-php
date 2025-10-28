<?php
    function jsonResponse($data, $status = 200, $success = true) {
        http_response_code($status);
        header("Content-Type: application/json");
        echo json_encode(["success" => $success, "data" => $data]);
        exit;
    }
