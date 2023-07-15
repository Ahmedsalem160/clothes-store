<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function make_order(Request $req){
    //     $customer_id = Auth::guard('api')->user()->id;
    //     $product_id = $req->header('product_id');
    //     // $user = JWTAuth::parseToken()->authenticate();
    //     //return response()->json(['product_id'=>$product_id, 'user'=>$customer_id]);
    //     $order = Order::create([
    //         'customer_id'=>$customer_id,
    //         'product_id'=>$product_id,
    //         'status'=>"initiated",
    //     ]);
    //     return response()->json(['msg'=>"order created successfully",'order'=>$order], 201);
    // }
    /**
     * Create a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth:user-api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {

       $credentials = request(['email', 'password']);

        if (! $token = Auth::guard('user-api')->attempt($credentials) ) {
            return failed('Unauthorized', 401);
            //response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(Auth::guard('user-api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('user-api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('user-api')->refresh());
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
            'expires_in' => Auth::guard('user-api')->factory()->getTTL() * 60
        ]);
    }
}
