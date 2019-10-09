<?php
namespace App\Services\Interfaces\Admin;

interface UserInterface 
{
	public function create($request);

	public function getAll();

	public function search($request);

	public function delete($user);

	public function update($user, $request);
	
	public function resetPassword($user, $request);
}