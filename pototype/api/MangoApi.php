<?php
/**
 * Created by PhpStorm.
 * User: kanda
 * Date: 7/4/2561
 * Time: 09:02 หลังเที่ยง
 */

class MangoApi
{
    // ตัวอย่าง ที่น่าสนใจ https://github.com/guilhermebferreira/moodlerest
    function __construct()
    {
        // Authen moodle with Token
        $token = "_____TOKEN____";

        // Login
        /*---- imprement here --*/

        // http request
        $url = "http://159.65.6.237/moodle/webservice/rest/server.php?wstoken=4e8e1d3d6375ceaa5ea7cc928ea46ef0&wsfunction=group&moodlewsrestformat=json";
        $res = file_get_contents($url);

        // นี่เป็นแค่ตัวอย่างเท่านั้น ขั้นตอนอาจจะมีอะไรซับซ้อนกว่านี่ หรืออาจจะไม่มีเลย
        // ฟังก์ชั่น construct ควรเป็นปราการแรก ในการเเรียกใช้ api

    }

    public function getJson_coure(){

        //return jsonPaser or ArrayList not ***text***

    }

    public function getJson_course_student(){

    }

    public function getJson_course_teacher(){

    }

    public function getJson_course_groups(){

    }

    public function getJson_course_groups_students(){

    }

    public function getJson_user_authen($username, $password){
        // อันที่จริง หน้าล๊อกอิน ควรจะอยู่บน mango ไม่ใช่เอา รหัส ส่งไปที่เว็บเขาอย่างนี้ หาวิธีดู
        // เช่นการล๊อกอินของ google จะเด้งไปที่เว็บของ เgoogle โดยตรง https://accounts.google.com/signin/oauth/oauthchooseaccount?client_id=9________...____eusercontent.com&as=q_VA#####hXY-8##A&destination=https%3A%2F%2Fmoodle.org&approv...
        // แล้วมันก็จะเด้งกลับมาที่เว็บ

        // ตัวอย่างน่าสนใจ
        // https://github.com/catalyst/moodle-auth_userkey

        // return
    }

    // และอื่นๆที่คิดว่ามันจำเป็นต้องใช้ เพื่อนระบุว่า อยู่บนเว็บนี้นะ

}

