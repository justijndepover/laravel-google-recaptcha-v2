<?php

namespace Justijndepover\GoogleRecaptchaV2\Validators;

class GoogleRecaptchaValidator
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        $curl = curl_init('https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            'secret' => config('google-recaptcha-v2.secret'),
            'response' => $value,
            'remoteip' => request()->header('REMOTE_ADDR'),
        ]);

        $curl_response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($curl_response);

        return $response->success ?: false;
    }
}