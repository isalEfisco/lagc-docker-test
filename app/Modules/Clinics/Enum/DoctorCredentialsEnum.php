<?php

namespace App\Modules\Clinics\Enum;

class DoctorCredentialsEnum
{
    const CREDENTIAL_MD = 1;
    const CREDENTIAL_PA = 2;
    const CREDENTIAL_RN = 3;
    const CREDENTIAL_NP = 4;

    const CREDENTIALS = [
        self::CREDENTIAL_MD => 'MD',
        self::CREDENTIAL_PA => 'PA',
        self::CREDENTIAL_RN => 'RN',
        self::CREDENTIAL_NP => 'NP',
    ];

    /**
     * Return credentials values imploded by ',' for validation
     *
     * @return string
     */
    public static function getCredentialsValuesString() : string
    {
        return implode(',', array_values(self::CREDENTIALS));
    }

    /**
     * Return credentials keys imploded by ',' for validation
     *
     * @return string
     */
    public static function getCredentialsKeysString() : string
    {
        return implode(',', array_keys(self::CREDENTIALS));
    }
}
