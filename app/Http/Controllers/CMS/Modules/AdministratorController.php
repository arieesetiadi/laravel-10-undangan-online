<?php

namespace App\Http\Controllers\CMS\Modules;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CMS\ResponseController;
use App\Http\Requests\CMS\Administrator\StoreRequest;
use App\Http\Requests\CMS\Administrator\UpdateRequest;
use App\Models\Administrator;
use Exception;

class AdministratorController extends Controller
{
	/**
	 * Controller properties.
	 *
	 * @var string
	 */
	private $viewPath = 'cms.modules.administrator';
	private $viewTitle = 'Administrator';
	private $uploadPath = '/profiles';

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$title = $this->viewTitle;
		$administrators = Administrator::getAll();

		$viewPath = $this->viewPath . '.index';
		$viewData = compact('title', 'administrators');

		return view($viewPath)->with($viewData);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$title = $this->viewTitle;
		$onEdit = false;

		$viewPath = $this->viewPath . '.create-or-edit';
		$viewData = compact('title', 'onEdit');

		return view($viewPath)->with($viewData);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreRequest $request)
	{
		try {
			$credentials = $request->credentials();

			// Upload image if exist
			if ($request->avatar) {
				$profileImageName = FileController::uploadImage($request->avatar, $this->uploadPath);
				$credentials['avatar'] = $profileImageName;
			}

			// Check store result
			$result = Administrator::create($credentials);

			if (!$result) {
				return ResponseController::failed(__('general.process.failed'));
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
		$title = $this->viewTitle;
		$administrator = Administrator::find($id);

		$viewPath = $this->viewPath . '.detail';
		$viewData = compact('title', 'administrator');

		return view($viewPath)->with($viewData);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$title = $this->viewTitle;
		$administrator = Administrator::find($id);
		$onEdit = true;

		$viewPath = $this->viewPath . '.create-or-edit';
		$viewData = compact('title', 'administrator', 'onEdit');

		return view($viewPath)->with($viewData);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateRequest $request, $id)
	{
		try {
			$credentials = $request->credentials();
			// Upload image if exist

			if ($request->avatar) {
				$profileImageName = FileController::uploadImage($request->avatar, $this->uploadPath);
				$credentials['avatar'] = $profileImageName;
			}

			// Check update result
			$result = Administrator::find($id)->update($credentials);

			if (!$result) {
				return ResponseController::failed(__('general.process.failed'));
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
			// Check update result
			$administrator = Administrator::find($id);
			$result = $administrator->delete();

			if (!$result) {
				return ResponseController::failed(__('general.process.failed'));
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
	public function toggleStatus($id)
	{
		try {
			// Toggle administrator status
			$administrator = Administrator::find($id);
			$result = $administrator->update([
				'status' => !$administrator->status,
			]);

			if (!$result) throw new Exception(__('general.process.failed'));

			return ResponseController::success(__('general.process.success'), route('cms.administrator.index'));
		}
		// 
		catch (\Throwable $th) {
			return ResponseController::failed($th->getMessage());
		}
	}
}
