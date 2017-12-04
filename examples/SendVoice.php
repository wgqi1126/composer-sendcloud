<?php

require_once __DIR__ . '/_common.php';

function sendVoice()
{
    $sendSms = new SendCloudSMS(SMS_USER, SMS_KEY);
    $voiceMsg = new VoiceMsg();
    $voiceMsg->setCode("1234");
    $voiceMsg->setPhone(SMS_PHONE);
    //$voiceMsg->setTimestamp(time());
    $resonse = $sendSms->sendVoice($voiceMsg);
    echo $resonse->body();

}

sendVoice();
