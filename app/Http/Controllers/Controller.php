<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(Request $request)
    {
    $userPersonalization = User::create($request->except(['disease_ids', 'interest_ids', 'allergy_ids']));
    
    if ($request->has('disease_ids')) {
        $userPersonalization->diseases()->sync($request->input('disease_ids'));
    }

    if ($request->has('interest_ids')) {
        $userPersonalization->interests()->sync($request->input('interest_ids'));
    }

    if ($request->has('allergy_ids')) {
        $userPersonalization->allergy()->sync($request->input('allergy_ids'));
    }

    if ($request->has('favorite_ids')) {
        $userPersonalization->favorites()->sync($request->input('favorite_ids'));
    }

    return redirect()->route('admin');
}
}
