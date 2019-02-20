<?php
namespace Acciona\Http\Api\Commercial\Contracts;

interface IComment extends IBase
{
    public function getClassName(): string;

    public function getCommentsByClient(int $client_id);

    public function getCommentsWithDatesByUser(int $user_id);

    public function reportCustomerTracking(array $rangeDate);
}