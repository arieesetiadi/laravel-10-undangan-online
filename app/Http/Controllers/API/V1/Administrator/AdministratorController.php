<?php

namespace App\Http\Controllers\API\V1\Administrator;

use App\Constants\HttpStatus;
use App\Http\Controllers\API\ResponseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Administrator\AdministratorResource;
use App\Services\AdministratorService;
use Illuminate\Http\Request;

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
                message: __('response.administrators.get_all.success'),
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
