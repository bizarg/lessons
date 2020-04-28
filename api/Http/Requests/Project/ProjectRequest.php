<?php

declare(strict_types=1);

namespace Api\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ProjectRequest
 * @package Api\Http\Requests\Project
 */
class ProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}
