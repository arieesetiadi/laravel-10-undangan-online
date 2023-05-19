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
        'username', 'name', 'email', 'phone', 'password', 'status',
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

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Get customer avatar image path | src.
     * 
     * @return string $avatarPath
     */
    public function getAvatarPathAttribute()
    {
        $avatar = $this->avatar ?? 'default.png';
        $avatarPath = asset('storage/uploads/images/avatars/' . $avatar);

        return $avatarPath;
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    // 

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Filter the active customer.
     * 
     * @param object
     * @return object
     */
    public function scopeActive($query)
    {
        return $query->where('status', GeneralStatus::ACTIVE);
    }

    /**
     * Filter the inactive customer.
     * 
     * @param object
     * @return object
     */
    public function scopeInactive($query)
    {
        return $query->where('status', GeneralStatus::INACTIVE);
    }

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Get all customers data.
     * 
     * @return array
     */
    public static function getAll()
    {
        return self::latest()->get();
    }

    /**
     * Get customer by id.
     * 
     * @param int $id
     * @return array
     */
    public static function getById($id)
    {
        return self::findOrFail($id);
    }

    /**
     * Get customer status.
     * 
     * @param array $credentials
     * @return boolean $status
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
     * @param array $credentials
     * @param boolean $status
     * 
     * @return mixed $result
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
     * @param array $credentials
     * @return mixed $result
     */
    public static function setPassword($credentials)
    {
        $password = Hash::make($credentials['password']);
        $customer = self::where('email', $credentials['email']);
        $result = $customer->update(['password' => $password]);

        return $result;
    }
}
