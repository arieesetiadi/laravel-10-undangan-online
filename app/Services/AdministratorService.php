<?php

namespace App\Services;

use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;

class AdministratorService
{
    /**
     * Default service class model.
     * 
     * @var \App\Models\Administrator $administrator
     */
    protected $administrator;

    /**
     * Init
     */
    public function __construct(Administrator $administrator)
    {
        $this->administrator = $administrator;
    }

    /**
     * Get all administrators data.
     *
     * @return array
     */
    public function all()
    {
        return $this->administrator->latest()->get();
    }

    /**
     * Get administrator by id.
     *
     * @param int $id
     * @return object
     */
    public function find($id)
    {
        return $this->administrator->findOrFail($id);
    }

    /**
     * Store new administrator data.
     * 
     * @param array $credentials
     */
    public function create($credentials)
    {
        return $this->administrator->create($credentials);
    }

    /**
     * Update administrator data.
     * 
     * @param int $id
     * @param array $credentials
     */
    public function update($id, $credentials)
    {
        return $this->find($id)->update($credentials);
    }

    /**
     * Update administrator data.
     * 
     * @param int $id
     */
    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    /**
     * Get administrator status.
     *
     * @param array $credentials
     * @return bool $status
     */
    public function getStatus($credentials)
    {
        $administrator = $this->administrator->where('username', $credentials['username'])->first();
        $status = $administrator->status;

        return $status;
    }

    /**
     * Set administrator status.
     *
     * @param array $credentials
     * @param bool $status
     * @return mixed $result
     */
    public function setStatus($credentials, $status)
    {
        $administrator = $this->administrator->where('email', $credentials['email']);
        $result = $administrator->update(['status' => $status]);

        return $result;
    }

    /**
     * Reset administrator password.
     *
     * @param array $credentials
     * @return mixed $result
     */
    public function setPassword($credentials)
    {
        $password = Hash::make($credentials['password']);
        $administrator = $this->administrator->where('email', $credentials['email']);
        $result = $administrator->update(['password' => $password]);

        return $result;
    }

    /**
     * Toggle administrator status.
     *
     * @param array $credentials
     * @return mixed $result
     */
    public function toggleStatus($id)
    {
        $administrator = $this->find($id);
        $result = $administrator->update(['status' => !$administrator->status]);

        return $result;
    }
}
