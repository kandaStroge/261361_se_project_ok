<?php

class ErrorMessagePage
{
    private $errorMessage = [
        "404" => [
            "header" => "Page Not Found",
            "mess" => "This pages cannot searching or not found"
        ],
        "permission_denied" => [
            "header" => "Permission Denied",
            "mess" => "This section or page not allow visited"
        ]
    ];

    public function getErrorMessage(){
        return $this->errorMessage;
    }

    public function getErrorMessageByCode($error_code){
        $isInarray = array_key_exists($error_code, $this->getErrorMessage());
        if ($isInarray){
            return $this->getErrorMessage()[$error_code];
        }
        $temp = [
            "header" => "Parameter not found",
            "mess" => "Something wrong"
        ];

        return $temp;
    }
}
