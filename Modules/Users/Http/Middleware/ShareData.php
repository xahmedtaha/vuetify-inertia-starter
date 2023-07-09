<?php

namespace Modules\Users\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShareData extends \Inertia\Middleware
{
    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'modules' => [
                'Users' => [

                ],
            ]
        ]);
    }
}
