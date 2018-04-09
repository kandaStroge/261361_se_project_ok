<?php

class ErrorMessagePage
{
    private $errorMessage = [
        "404" => [
            "code"=> 200,
            "header" => "Page Not Found",
            "mess" => "This pages cannot searching or not found"
        ],
        "permission_denied" => [
            "code"=> 200,
            "header" => "Permission Denied",
            "mess" => "This section or page not allow visited"
        ],
        "301" => [
            "code" => 200,
            "header" => "Page Moved",
            "mess" => "The section is moved to another location"
        ],
        "902" => [
            "code" => 200,
            "header" => "Register Failed",
            "mess" => "TODO Write details later"
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
            "code"=> 301,
            "header" => "Parameter not found",
            "mess" => "Something wrong"
        ];

        return $temp;
    }
}
