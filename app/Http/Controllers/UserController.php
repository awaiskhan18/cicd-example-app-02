<?php


namespace App\Http\Controllers;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Jobs\SendEmailNotification;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $user = new User();
//        $user->name = $request->name;
        $user->name = Carbon::now();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        SendEmailNotification::dispatch();
//        SendEmailNotification::dispatchNow($user, 'account_verification');
//        dispatch(new SendEmailNotification($user, 'account_verification'))->dispatchSync();

        return response()->json(['message' => 'Operation successful'], 200);
    }

}
