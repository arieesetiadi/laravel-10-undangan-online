<?php

namespace App\Models;

use App\Constants\GeneralStatus;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Customer extends Authenticatable
{
    use Notifiable;

    /**
     * Table name.
     * 
     * @var string
     */
    public $table = 'customers';

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
     * Get all customers data.
     * 
     * @return array
     */
    public static function getAll()
    {
        $customers = self::latest()->get();
        return $customers;
    }

    /**
     * Get customer status.
     * 
     * @param array
     * @return boolean
     */
    public static function getStatus($credentials)
    {
        $customer = self::where('username', $credentials['username'])->first();
        $status = $customer->status;

        return $status;
    }

    /**
     * Set customer status.
     * 
     * @param array,boolean
     * @return array
     */
    public static function setStatus($credentials, $status)
    {
        $customer = self::where('email', $credentials['email']);
        $result = $customer->update(['status' => $status]);

        return $result;
    }

    /**
     * Reset customer password.
     * 
     * @param array
     * @return array
     */
    public static function resetPassword($credentials)
    {
        $newPassword = $credentials['password'];
        $newPasswordHashed = Hash::make($newPassword);
        $customer = self::where('email', $credentials['email']);
        $result = $customer->update(['password' => $newPasswordHashed]);

        return $result;
    }

    /**
     * Get customer profile image path | src.
     * 
     * @return string
     */
    public function getProfileImagePathAttribute()
    {
        $default = 'default.png';
        $profilePath = 'assets/uploads/images/profiles/';
        $profileImage = $this->avatar ?? $default;
        $profileImagePath = asset($profilePath . $profileImage);

        return $profileImagePath;
    }

    /**
     * Filter the active customer.
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
     * Filter the inactive customer.
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
