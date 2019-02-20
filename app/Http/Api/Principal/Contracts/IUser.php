<?php
namespace Acciona\Http\Api\Principal\Contracts;

interface IUser
{
    public function getAllCommercials(int $companyId);
}