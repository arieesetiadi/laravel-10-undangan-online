<?php

namespace App\Http\Controllers\CMS\Modules;

use App\Exports\AdministratorsExport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ResponseController;
use App\Http\Requests\CMS\Administrator\StoreRequest;
use App\Http\Requests\CMS\Administrator\UpdateRequest;
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
     * Controller module path.
     *
     * @var string
     */
    private $module;

    /**
     * Controller module title.
     *
     * @var string
     */
    private $title;

    /**
     * Initiate resource service class.
     */
    public function __construct(AdministratorService $administratorService)
    {
        $this->administratorService = $administratorService;
        $this->module = 'cms.modules.administrator';
        $this->title = 'Administrator';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $administrators = $this->administratorService->all();
            $view = $this->module.'.index';
            $data = [
                'title' => $this->title,
                'administrators' => $administrators,
            ];

            return view($view, $data);
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $view = $this->module.'.create-or-edit';
            $data = [
                'title' => $this->title,
                'edit' => false,
            ];

            return view($view, $data);
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            $credentials = $request->credentials();

            // Upload avatar if exist
            if ($request->avatar) {
                $avatarName = FileController::uploadImage($request->avatar, $this->uploadImagesPath.'/avatars');
                $credentials['avatar'] = $avatarName;
            }

            // Store administrator data
            $result = $this->administratorService->create($credentials);

            if (! $result) {
                throw new Exception(__('general.process.failed'));
            }

            return ResponseController::success(__('general.process.success'), route('cms.administrator.index'));
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $administrator = $this->administratorService->find($id);
            $view = $this->module.'.detail';
            $data = [
                'title' => $this->title,
                'administrator' => $administrator,
            ];

            return view($view, $data);
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $administrator = $this->administratorService->find($id);
            $view = $this->module.'.create-or-edit';
            $data = [
                'title' => $this->title,
                'administrator' => $administrator,
                'edit' => true,
            ];

            return view($view, $data);
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $credentials = $request->credentials();

            // Upload avatar if exist
            if ($request->avatar) {
                $avatarName = FileController::uploadImage($request->avatar, $this->uploadImagesPath.'/avatars');
                $credentials['avatar'] = $avatarName;
            }

            // Update administrator data
            $result = $this->administratorService->update($id, $credentials);

            if (! $result) {
                throw new Exception(__('general.process.failed'));
            }

            return ResponseController::success(__('general.process.success'), route('cms.administrator.index'));
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Delete administrator data
            $result = $this->administratorService->delete($id);

            if (! $result) {
                throw new Exception(__('general.process.failed'));
            }

            return ResponseController::success(__('general.process.success'), route('cms.administrator.index'));
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Change the specified resource status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toggle($id)
    {
        try {
            // Toggle administrator status
            $result = $this->administratorService->toggleStatus($id);

            if (! $result) {
                throw new Exception(__('general.process.failed'));
            }

            return ResponseController::success(__('general.process.success'), route('cms.administrator.index'));
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Export as PDF.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf()
    {
        try {
            return 'Adminsitrator PDF';
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Export as Excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
        try {
            return \Maatwebsite\Excel\Facades\Excel::download(new AdministratorsExport(), 'export-administrators-'.now()->timestamp.'.xlsx');
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
