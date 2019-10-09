<?php
namespace App\Services\Interfaces\Admin;

interface AdminInterface 
{
	public function getAll();

	public function create($request);

	public function update($admin, $request);
	
	public function delete($admin);
}