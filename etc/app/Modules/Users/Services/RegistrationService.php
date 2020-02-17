<?php

namespace App\Modules\Users\Services;

use App\Modules\Users\Models\{
    User,
    UserInvitation
};

use Illuminate\Support\Str;

class RegistrationService extends UserService
{
    /**
     * Set user password
     *
     * @param string $token
     * @param string $password
     * @return void
     */
    public function setPassword(string $token, string $password): void
    {
        $invitation = UserInvitation::where('token', $token)
            ->first();

        User::where('email', $invitation->email)->update([
            'password'  => $password,
            'active'    => true,
        ]);

        $invitation->delete();

        return;
    }

    /**
     * Send invitation email
     *
     * @param string $email
     * @return void
     */
    public function createAndSendInvitation(string $email): void
    {
        $token = Str::random(32);

        UserInvitation::create([
            'user_id' => $email,
            'token'   => $token,
        ]);
        
        $this->sendInvitationEmail(
            $email,
            $token
        );

        return;
    }

    private function sendInvitationEmail(string $email, string $token)
    {

    }
}
