<?php
/**
 * Created by PhpStorm.
 * User: kanda
 * Date: 2/4/2561
 * Time: 09:58 หลังเที่ยง
 */

use PHPUnit\Framework\TestCase;

require '../inc/ErrorMessagePage.php';
class ErrorMessagePageTest extends TestCase
{
    public function test_code_shoulde_be_return_array_404_message()
    {
        $s = new ErrorMessagePage();
        $p = $s->getErrorMessageByCode("404");
        $m = [
            "header" => "Page Not Found",
            "mess" => "This pages cannot searching or not found"
        ];
        $this->assertEquals($m, $p);

    }

    public function test_code_should_be_show_nothing_message(){
        $s = new ErrorMessagePage();
        $p = $s->getErrorMessageByCode("nothanykey");
        $m = [
            "header" => "Parameter not found",
            "mess" => "Something wrong"
        ];
        $this->assertEquals($m, $p);
    }
}
