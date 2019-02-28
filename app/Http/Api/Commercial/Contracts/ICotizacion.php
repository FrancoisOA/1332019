<?php
namespace Acciona\Http\Api\Commercial\Contracts;

interface ICotizacion
{
    public function getCommercialTracking(array $params);
}