<?php
namespace Acciona\Http\Api\Principal\Contracts;

interface IPort
{
    public function searchPorts(string $text);
}