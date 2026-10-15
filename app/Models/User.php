<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'is_admin'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    public function sendPasswordResetNotification($token): void
    {
        $url = route('password.reset', ['email' => $this->getEmailForPasswordReset(), 'token' => $token]);
        $this->notify(new ResetPasswordNotification($url));
    }

    protected function initials(): Attribute
    {
        return Attribute::make(
            get: function () {
                $name = trim($this->name);

                if (empty($name)) {
                    return '??';
                }

                $words = preg_split('/\s+/', $name);

                if (count($words) >= 2) {
                    return mb_strtoupper(
                        mb_substr($words[0], 0, 1) .
                        mb_substr($words[1], 0, 1)
                    );
                }

                return mb_strtoupper(mb_substr($name, 0, 2));
            }
        );
    }

    protected function role(): Attribute
    {
        return Attribute::make(
            get: fn(): string => ($this->is_admin ?? false)
                ? 'Адміністратор'
                : 'Працівник',
        );
    }
}
