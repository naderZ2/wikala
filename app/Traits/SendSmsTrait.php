<?php

namespace App\Traits;

trait SendSmsTrait
{
    public function sendSMS($phone, $message)
    {
        header("Location: https://api-server3.com/api/send.aspx?username=pointstore&password=Pointstore123&language=3&sender=Ma3lama&mobile=".$phone."&message=".$message);
    }
}
