<?php

namespace App\Http\Controllers\CMS\Modules;

use Exception;
use App\Services\CustomerService;
use App\Http\Requests\CMS\Customer\UpdateRequest;
use App\Http\Requests\CMS\Customer\StoreRequest;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\Controller;
use App\Exports\CustomersExport;

class CustomerController extends Controller
{
    /**
     * Default service class.
     *
     * @var \App\Services\CustomerService
     */
    protected $customerService;

    /**
     * Controller module path.
     *
     * @var string
     */
    private $module;

    /**
     * Controller module title.
     *
     * @var array
     */
    private $titles;

    /**
     * Initiate resource service class.
     */
    public function __construct()
    {
        $this->customerService = new CustomerService();
        $this->module = 'cms.modules.customers';
        $this->titles = [
            'singular' => 'Customer',
            'plural' => 'Customers',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $customers = $this->customerService->all();
            $view = $this->module.'.index';
            $data = [
                'titles' => $this->titles,
                'customers' => $customers,
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
                'titles' => $this->titles,
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

            // Store customer data
            $result = $this->customerService->create($credentials);

            if (! $result) {
                throw new Exception(__('general.process.failed'));
            }

            return ResponseController::success(__('general.process.success'), route('cms.customers.index'));
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
            $customer = $this->customerService->find($id);
            $view = $this->module.'.detail';
            $data = [
                'titles' => $this->titles,
                'customer' => $customer,
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
            $customer = $this->customerService->find($id);
            $view = $this->module.'.create-or-edit';
            $data = [
                'titles' => $this->titles,
                'customer' => $customer,
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

            // Update customer data
            $result = $this->customerService->update($id, $credentials);

            if (! $result) {
                throw new Exception(__('general.process.failed'));
            }

            return ResponseController::success(__('general.process.success'), route('cms.customers.index'));
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
            // Delete customer data
            $result = $this->customerService->delete($id);

            if (! $result) {
                throw new Exception(__('general.process.failed'));
            }

            return ResponseController::success(__('general.process.success'), route('cms.customers.index'));
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
            // Toggle customer status
            $result = $this->customerService->toggleStatus($id);

            if (! $result) {
                throw new Exception(__('general.process.failed'));
            }

            return ResponseController::success(__('general.process.success'), route('cms.customers.index'));
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
            return 'Customers PDF';
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
            return \Maatwebsite\Excel\Facades\Excel::download(new CustomersExport(), 'export-customers-'.now()->timestamp.'.xlsx');
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
