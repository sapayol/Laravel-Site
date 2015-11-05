<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
use Illuminate\Http\Request;
use Response;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware('guest');
    }


    /**
     * Send a reset link to the given user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function postEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        switch ($response)
        {
            case Password::RESET_LINK_SENT:
                if ($request->wantsJson() || $request->ajax()) {
                    return Response::json(trans($response), 200);
                } else {
                    return redirect()->back()->with('status', trans($response));
                }

            case Password::INVALID_USER:
                if ($request->wantsJson() || $request->ajax()) {
                    return Response::json(trans($response), 400);
                } else {
                    return redirect()->back()->withErrors(['email' => trans($response)]);
                }
        }
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function getReset($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        return view('pages.auth.reset')->with('token', $token);
    }
}
