<?php

namespace App\Modules\Users\Services;

use App\Modules\Users\Models\{
    User
};

class ClinicAdminService extends UserService
{
    /**
     * @param array $data
     * @return User
     */
    public function createClinicAdmin(int $clinic_id, array $data): User
    {
        $clinicAdmin = parent::create($data);

        $clinicAdmin->attachRole('clinic_admin');

        $clinicAdmin->clinic()
            ->attach($clinic_id);

        $registrationService = app(RegistrationService::class);
        $registrationService->createAndSendInvitation(
            $data['email']
        );

        return $clinicAdmin;
    }

    /**
     * @param array $data
     * @return User
     */
    public function updateClinicAdmin(int $id, array $data): User
    {
        $clinicAdmin = parent::update(
            $id,
            $data
        );

        return $clinicAdmin;
    }

}
