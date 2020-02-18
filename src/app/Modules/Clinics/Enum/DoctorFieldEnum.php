<?php

namespace App\Modules\Clinics\Enum;

class DoctorFieldsEnum
{
    const FIELD_FAMILY_MEDICINE = 1;
    const FIELD_INTERNAL_MED = 2;
    const FIELD_PEDIATRICS = 3;

    const FIELDS = [
        self::FIELD_FAMILY_MEDICINE => 'Family medicine',
        self::FIELD_INTERNAL_MED    => 'Internal med',
        self::FIELD_PEDIATRICS      => 'Pediatrics',
    ];

    /**
     * Return fields values imploded by ',' for validation
     *
     * @return string
     */
    public static function getFieldsValuesString() : string
    {
        return implode(',', array_values(self::FIELDS));
    }

    /**
     * Return fields keys imploded by ',' for validation
     *
     * @return string
     */
    public static function getFieldsKeysString() : string
    {
        return implode(',', array_keys(self::FIELDS));
    }
}
