<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'      => 'required|string',
            'type'      => 'required|in:user,admin',
            'status'    => 'required|in:1,0',
        ];

        if ($this->method() == 'PUT') {
            $rules['email'] = 'required|email|unique:users,email,'. $this->get("id");
            $rules['password'] = 'min:6';
            /*
            return [
                'name'      => 'required|string',
                'email'     => 'required|email|unique:users,email,'. $this->get("id"),
                'password'  => 'required_if:operation,create|min:6',
                'type'      => 'required|in:user,admin',
                'status'    => 'required|in:1,0',
            ];
            */
        } else {
            $rules['email'] = 'required|email|unique:users,email';
            $rules['password'] = 'required|min:6';
        }
/*
        return [
            'name'      => 'required|string',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required_if:operation,create|min:6',
            'type'      => 'required|in:user,admin',
            'status'    => 'required|in:1,0',
        ];*/

        return $rules;
    }
}
