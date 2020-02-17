<?php

namespace App\Modules\Users\Services;

use App\Modules\Users\Models\{
    User,
    UserInvitation
};

use Illuminate\Support\Str;

class UserService
{
    /**
     * Set user password
     *
     * @param string $token
     * @param string $password
     * @return void
     */
    public function setPassword(string $token, string $password)
    {
        $invitation = UserInvitation::where('token', $token)
            ->first();

        $invitation->user()->update([
            'password'  => $password,
            'active'    => true,
        ]);

        $invitation->delete();

        return;
    }

    // private function setPassword(string $email, string $password)
    // {
    //     return User::where('email', $email)
    //         ->update([
    //             'password'  => $password,
    //         ]);

    //     return;
    // }

    /**
     * Send invitation email
     *
     * @param User $clinicAdmin
     * @return void
     */
    protected function createInvitation(User $clinicAdmin)
    {
        $token = Str::random(32);

        UserInvitation::create([
            'user_id' => $clinicAdmin->id,
            'token'   => $token,
        ]);
        
        $this->sendInvitationEmail(
            $clinicAdmin,
            $token
        );

        return;
    }

    /**
     * Create user
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data): User
    {
        return User::create($data);
    }

    /**
     * Update user
     *
     * @param integer $user_id
     * @param array $data
     * @return User
     */
    protected function update(int $user_id, array $data): User
    {
        return tap(User::findOrFail($user_id))->update($data);
    }

    private function sendInvitationEmail(string $email, string $token)
    {

    }
}
