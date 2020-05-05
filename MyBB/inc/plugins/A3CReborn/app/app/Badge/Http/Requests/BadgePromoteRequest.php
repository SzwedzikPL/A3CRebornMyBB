<?php

namespace App\Badge\Http\Requests;

use App\Badge\Model\Badge;
use Illuminate\Foundation\Http\FormRequest;

class BadgePromoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $badge = Badge::find($this->badge_id);

        return $badge && $this->user()->can('promoteBadge', $badge);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'badge_id' => 'required|integer|exists:badges,id',
            'winner_id' => 'required|integer',
            'promote_reason' => 'required|string',
        ];
    }
}
