<?php
namespace Acciona\Http\Api\Principal\Controllers;

use Acciona\Http\Api\Principal\Contracts\IConcept;
use Acciona\Http\Controllers\Controller;

class ConceptController extends Controller
{
    protected $IConcept;

    public function __construct(IConcept $IConcept)
    {
        $this->IConcept = $IConcept;
    }

    public function searchConcepts()
    {
        $data = $this->IConcept->searchConcept(request()->get('text'));
        return $this->responseSuccess($data);
    }
}