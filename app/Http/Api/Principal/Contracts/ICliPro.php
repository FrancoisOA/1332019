<?php

namespace Acciona\Http\Api\Principal\Contracts;

interface ICliPro
{
    public function searchClients(string $text);

    public function getCommercials(int $company_Id);
}