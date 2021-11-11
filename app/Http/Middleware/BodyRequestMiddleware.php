<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BodyRequestMiddleware
{
    /**
     * Run the request filter.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);
        if ($validator->fails()){
            return response($validator->errors()->jsonSerialize(), 302);
        }

        return $next($request);
    }

}
