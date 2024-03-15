<?php
namespace App\Services\Mail;

class MailService
{

    public function signupWithEmail($token, $mail)
    {
        $htmlBoby = view('emails.create-user', compact('token'))->render();
        $subject = "Kích hoạt tài khoản snappic.vn";

        $this->__sendMailSmtp2Go([$mail], "contact@guidestore.vn", $subject, $htmlBoby);
    }

    public function resetPwWithEmail($token, $mail): array
    {
        $htmlBoby = view('emails.reset-password', compact('token', "mail"))->render();
        $subject = "Khôi phục mật khẩu tài khoản snappic.vn";

        return $this->__sendMailSmtp2Go([$mail], "contact@guidestore.vn", $subject, $htmlBoby);
    }

    private function __sendMailSmtp2Go($to = [], $sender = 'noreply@snappic.com', $subject = '', $html_body = '',$cc = []){
        $fields = array(
            'api_key' => 'api-A21ECEE23A6D11EEB797F23C91C88F4E',
            'to' => $to,
            'sender' => $sender,
            'cc' => $cc,
            'subject' => $subject,
            'html_body' => $html_body
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.smtp2go.com/v3/email/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return [
                'req' => json_encode($fields),
                'data' => $err,
            ];
        } else {
            return [
                'req' => json_encode($fields),
                'data' => $response,
            ];
        }
    }
}
