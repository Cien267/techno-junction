<?php

namespace App\Services\Notification;

class FCMService
{
    protected $fcmServiceKey;


    public function __construct()
    {
        $this->fcmServiceKey = env('FCM_SERVER_KEY');
    }

    public function send($userDeviceToken, $title, $body)
    {
        $data = [
            "to" => $userDeviceToken,
            "notification" => [
                "title" => $title,
                "body" => $body,
            ],
            "time_to_live" => "600"
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $this->fcmServiceKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);

        return $response;
    }

    public function sendMultiple($userDeviceTokens, $title, $body)
    {
        $data = [
            "registration_ids" => $userDeviceTokens,
            "notification" => [
                "title" => $title,
                "body" => $body,
            ],
            "time_to_live" => "600"
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $this->fcmServiceKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);

        return $response;
    }
}
