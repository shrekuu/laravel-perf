<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redis;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        // --- BEGIN: without redis ---
        // return User::paginate();
        // --- END: without redis ---

        // --- BEGIN: with redis ---
        $page = $req->input('page', 1);
        $limit = $req->input('limit', 10);
        $offset = ($page - 1) * $limit;

        $jsonUsers = Redis::get('users:page:' . $page);

        if (!$jsonUsers) {
            $users = User::skip($offset)->take($limit)->get();
            Redis::set('users:page:' . $page, $users->toJson());
        } else {
            $users = json_decode($jsonUsers);
        }

        return $users;
        // --- END: with redis ---
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
