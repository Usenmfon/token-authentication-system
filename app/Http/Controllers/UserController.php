<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */

     public function profile() {
        try {
            $user = auth()->userOrFail(); // Throws UserNotDefinedException if user is not authenticated
            return response()->json($user);
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error' => 'User not authenticated'], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}
