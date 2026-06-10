<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function login( Request $request ) {

        $username = $request->input( 'username' );
        $password = $request->input( 'password' );

        $usercheck = User::where( 'email', $username )->first();

        if ( $usercheck ) {
            $credentials = [
                'email' => $username,
                'password' => $password,
            ];
            // dd( $test );
            if ( Auth::attempt( $credentials ) ) {
                $user = User::where( 'email', $username )->first();
                Auth::login( $user );
                $userid = Auth::user()->userid;

                return response()->json( [
                    'status'=>'200',
                    'message'=>'User Login Successfully',
                ] );
            } else {

                return response()->json( [
                    'status'=>'500',
                    'message'=>'Invalid Credentials',
                ] );
            }
        } else {

            return response()->json( [ 'status'=>'error', 'User Not Available', 400 ] );
        }
    }

    public function logout( Request $request ) {
        try {
            Auth::logout();

            return response()->json( [
                'status'=>'200',
                'message'=>'User Logged out Successfully',
            ] );
        } catch ( \Throwable $th ) {
            return response()->json( [
                'status'=>'500',
                'message'=>'Failed to Log out',
            ] );
        }
    }
    
    public function forgetpassword( Request $request ) {

        $email = $request->input( 'username' );
        $newpassword = $request->input( 'password' );
        $oldpassword = $request->input( 'old_password' );

        $user = User::where( 'email', $email )->first();

        if ( $user ) {
            // Verify old password before allowing reset
            if (!\Illuminate\Support\Facades\Hash::check($oldpassword, $user->password)) {
                return response()->json( [
                    'status' => '401',
                    'message' => 'Current password is incorrect',
                ] );
            }
            $user->password = bcrypt( $newpassword );
            $user->save();

            return response()->json( [
                'status' => '200',
                'message' => 'Password updated successfully',
            ] );
        } else {
            return response()->json( [
                'status' => '404',
                'message' => 'Email does not exist',
            ] );
        }
    }
}