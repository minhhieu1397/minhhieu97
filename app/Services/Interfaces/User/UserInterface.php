<?php
namespace App\Services\Interfaces\User;

interface UserInterface 
{
	public function update($request);

	public function updatePassword($request);
}