<?php
namespace App\Services\Admin;

use Illuminate\Http\Request;
use App\Repositories\Admin\EmailRepository;

class EmailService
{
	protected $emailRepository;

	public function __construct(EmailRepository $emailRepository)
	{
		$this->emailRepository = $emailRepository;
	}

	public function getAll()
	{
		return $this->emailRepository->all();
	}

	public function create($request)
	{
		$emails = $this->emailRepository->create([
			'email' => $request->input('email')
		]);

		return $emails;
	}

	public function delete($email)
	{
		return $this->emailRepository->delete($email);
	}

	public function show($add)
	{
		return $this->emailRepository->show($add);
	}
}