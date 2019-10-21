<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Email;

class EmailService
{
	protected $model;

	public function __construct(Email $model)
	{
		$this->model = $model;
	}

	public function getAll()
	{
		return $this->model->all();
	}

	public function create($request)
	{
		return $this->model->create([
			'email' => $request->input('email')
		]);

		return $emails;
	}

	public function delete($email)
	{
		return $this->model->find($email)->delete();
	}

	public function show($add)
	{
		return $this->model->all()->where('id', $add);
	}
}