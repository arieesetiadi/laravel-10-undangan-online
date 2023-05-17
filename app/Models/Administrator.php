<?php

namespace App\Models;

use App\Constants\GeneralStatus;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Administrator extends Authenticatable
{
    use Notifiable;

    /**
     * Table name.
     * 
     * @var string
     */
    public $table = 'administrators';

    /**
     * Allowed field for mass assignment.
     * 
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'phone', 'password', 'avatar', 'status',
    ];

    /**
     * Hidden field while get data.
     * 
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * New field for the result.
     * 
     * @var array
     */
    protected $append = [
        'avatar_path',
    ];

    /**
     * Get all administrators data.
     * 
     * @return array
     */
    public static function getAll()
    {
        $administrators = self::latest()->get();
        return $administrators;
    }

    /**
     * Get administrator status.
     * 
     * @param array
     * @return boolean
     */
    public static function getStatus($credentials)
    {
        $administrator = self::where('username', $credentials['username'])->first();
        $status = $administrator->status;

        return $status;
    }

    /**
     * Set administrator status.
     * 
     * @param array,boolean
     * @return array
     */
    public static function setStatus($credentials, $status)
    {
        $administrator = self::where('email', $credentials['email']);
        $result = $administrator->update(['status' => $status]);

        return $result;
    }

    /**
     * Reset administrator password.
     * 
     * @param array
     * @return array
     */
    public static function resetPassword($credentials)
    {
        $newPassword = $credentials['password'];
        $newPasswordHashed = Hash::make($newPassword);
        $administrator = self::where('email', $credentials['email']);
        $result = $administrator->update(['password' => $newPasswordHashed]);

        return $result;
    }

    /**
     * Get administrator profile image path | src.
     * 
     * @return string
     */
    public function getAvatarPathAttribute()
    {
        $default = 'default.png';
        $profilePath = 'assets/uploads/images/profiles/';
        $avatar = $this->avatar ?? $default;
        $avatarPath = asset($profilePath . $avatar);

        return $avatarPath;
    }

    /**
     * Filter the active administrator.
     * 
     * @param object
     * @return array
     */
    public function scopeActive($query)
    {
        $query = $query->where('status', GeneralStatus::ACTIVE);
        return $query;
    }

    /**
     * Filter the inactive administrator.
     * 
     * @param object
     * @return array
     */
    public function scopeInactive($query)
    {
        $query = $query->where('status', GeneralStatus::INACTIVE);
        return $query;
    }
}
