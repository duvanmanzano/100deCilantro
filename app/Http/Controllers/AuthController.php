<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\User;
use App\Movie;
use App\Schedule;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', [
            'except' => [
                'login','signin','test','allUSers','storeAppreciation', 'validateMail'
            ]
        ]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        try{
            $credentials = request(['email', 'password']);
            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return $this->respondWithToken($token);
        }catch (\Exception $e) {
            response()->json(['message' => $e->getMessage()]);
        }
    }

    public function signin(Request $request)
    {
        try{ 
            $data = $request->all();
            User::create($data);
            return $this->login($request);
        }catch (\Exception $e) {
            response()->json(['message' => $e->getMessage()]);
        }
    }

    public function allUSers()
    {
        try{
            $data =  User::all();
            return $data ;
        }catch (\Exception $e) {
            response()->json(['message' => $e->getMessage()]);
        }
    }

   
    /*public function user($id)
    {
        return response()->json([
            'user' => User::find($id)
        ]);
    }*/



    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    protected function test()
    {        
        return response()->json([
            'helou' => 'friend',
            'view' => view('welcome')->render()
        ]);
    }

    public function validateMail($email) {
        $mail = DB::table('users')->where('email', $email)->count();
        return $mail;
    }
}
