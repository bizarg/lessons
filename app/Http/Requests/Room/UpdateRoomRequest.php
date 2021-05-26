<?php

declare(strict_types=1);

namespace App\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RoomRequest
 * @package App\Http\Requests\Room
 */
class UpdateRoomRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [];
    }
}
