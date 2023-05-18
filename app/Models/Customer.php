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

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Get administrator avatar image path | src.
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
     * Filter the active administrator.
     * 
     * @param object
     * @return object
     */
    public function scopeActive($query)
    {
        return $query->where('status', GeneralStatus::ACTIVE);
    }

    /**
     * Filter the inactive administrator.
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
     * Get all administrators data.
     * 
     * @return array
     */
    public static function getAll()
    {
        return self::latest()->get();
    }

    /**
     * Get administrator by id.
     * 
     * @param int $id
     * @return array
     */
    public static function getById($id)
    {
        return self::findOrFail($id);
    }

    /**
     * Get administrator status.
     * 
     * @param array $credentials
     * @return boolean $status
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
     * @param array $credentials
     * @param boolean $status
     * 
     * @return mixed $result
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
     * @param array $credentials
     * @return mixed $result
     */
    public static function setPassword($credentials)
    {
        $password = Hash::make($credentials['password']);
        $administrator = self::where('email', $credentials['email']);
        $result = $administrator->update(['password' => $password]);

        return $result;
    }
}
