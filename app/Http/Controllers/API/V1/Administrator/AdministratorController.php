<?php

namespace App\Http\Controllers\API\V1\Administrator;

use App\Constants\HttpStatus;
use App\Http\Controllers\API\ResponseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Administrator\StoreRequest;
use App\Http\Requests\API\V1\Administrator\UpdateRequest;
use App\Http\Resources\Administrator\AdministratorResource;
use App\Services\AdministratorService;
use Exception;

class AdministratorController extends Controller
{
    /**
     * Default service class.
     *
     * @var \App\Services\AdministratorService
     */
    protected $administratorService;

    /**
     * Initiate resource service class.
     */
    public function __construct()
    {
        $this->administratorService = new AdministratorService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $administrators = $this->administratorService->all();
            $administrators = AdministratorResource::collection($administrators);

            return ResponseController::success(
                code: HttpStatus::OK,
                message: __('response.administrators.success_get_all'),
                data: $administrators
            );
        }
        //
        catch (\Throwable $error) {
            return ResponseController::failed(
                code: $error->getCode(),
                message: $error->getMessage(),
                errors: $error->getTrace(),
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $credentials = $request->credentials();
            $administrator = $this->administratorService->create($credentials);
            $administrator = AdministratorResource::make($administrator);

            return ResponseController::success(
                code: HttpStatus::OK,
                message: __('response.administrators.success_create'),
                data: $administrator
            );
        }
        //
        catch (\Throwable $error) {
            return ResponseController::failed(
                code: $error->getCode(),
                message: $error->getMessage(),
                errors: $error->getTrace(),
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $administrator = $this->administratorService->find($id);

            // Check administrator existance
            if (!$administrator) {
                throw new Exception(__('response.administrators.not_found'), HttpStatus::NOT_FOUND);
            }

            $administrator = AdministratorResource::make($administrator);

            return ResponseController::success(
                code: HttpStatus::OK,
                message: __('response.administrators.success_find'),
                data: $administrator
            );
        }
        //
        catch (\Throwable $error) {
            return ResponseController::failed(
                code: $error->getCode(),
                message: $error->getMessage(),
                errors: $error->getTrace(),
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            $credentials = $request->credentials();
            $administrator = $this->administratorService->find($id);

            // Check administrator existance
            if (!$administrator) {
                throw new Exception(__('response.administrators.not_found'), HttpStatus::NOT_FOUND);
            }

            $administrator->update($credentials);
            $administrator = AdministratorResource::make($administrator);

            return ResponseController::success(
                code: HttpStatus::OK,
                message: __('response.administrators.success_update'),
                data: $administrator
            );
        }
        //
        catch (\Throwable $error) {
            return ResponseController::failed(
                code: $error->getCode(),
                message: $error->getMessage(),
                errors: $error->getTrace(),
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $administrator = $this->administratorService->find($id);

            if (!$administrator) {
                throw new Exception(__('response.administrators.not_found'), HttpStatus::NOT_FOUND);
            }

            $administrator->delete();

            return ResponseController::success(
                code: HttpStatus::OK,
                message: __('response.administrators.success_delete')
            );
        }
        //
        catch (\Throwable $error) {
            return ResponseController::failed(
                code: $error->getCode(),
                message: $error->getMessage(),
                errors: $error->getTrace(),
            );
        }
    }
}
