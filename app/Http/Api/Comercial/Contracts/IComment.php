<?php
namespace Acciona\Http\Api\Comercial\Contracts;

interface IComment extends IBase
{
    public function getClassName(): string;

    public function getCommentsByClient(int $client_id);

    public function getCommentsWithDatesByUser(int $user_id);
}