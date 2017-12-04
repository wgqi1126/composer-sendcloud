<?php

require_once __DIR__ . '/_common.php';

use SendCloud\SendCloudSMS;
use SendCloud\Util\MsgType;
use SendCloud\Util\SmsMsg;

function sendSms($smsTemplateId, $vars = [])
{
    $sendSms = new SendCloudSMS(SMS_USER, SMS_KEY);
    $smsMsg = new SmsMsg();
    $smsMsg->addPhoneList([SMS_PHONE]);
    foreach ($vars as $k => $v) {
        $smsMsg->addVars($k, $v);
    }
    $smsMsg->setTemplateId($smsTemplateId);
    $smsMsg->setTimestamp(time());
    $resonse = $sendSms->send($smsMsg);
    echo $resonse->body();

}


function sendMms()
{
    $mmsTemplateId = 320;
    $sendSms = new SendCloudSMS(SMS_USER, SMS_KEY);
    $smsMsg = new SmsMsg();
    $smsMsg->addPhoneList([SMS_PHONE]);
    $smsMsg->addVars("code", "1234");
    $smsMsg->setMsgType(MsgType::MMS);

    $smsMsg->addMapVars(array("name" => 'xiao'));
    $smsMsg->setTemplateId($mmsTemplateId);
    $smsMsg->setTimestamp(time());
    $resonse = $sendSms->send($smsMsg);
    echo $resonse->body();

}

sendSms(SMS_TPL_ID, SMS_VARS);

//sendMms();
