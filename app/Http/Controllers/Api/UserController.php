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
        $page = $req->input('page', 1);
        $limit = $req->input('limit', 10);
        $offset = ($page - 1) * $limit;

        $users = Redis::get('users:page:' . $page);

        Redis::del('users:page:' . $page);

        if (!$users) {
            $users = User::skip($offset)->take($limit)->get();
            Redis::set('users:page:' . $page, $users->toJson()); // Convert to JSON before storing
        } else {
            $users = json_decode($users, true); // Decode JSON into an associative array
        }

        return response()->json($users); // Return a proper JSON response
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
