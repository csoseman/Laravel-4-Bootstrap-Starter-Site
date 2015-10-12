<?php

class UserController extends BaseController {

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * @var UserRepository
     */
    protected $userRepo;

    /**
     * Inject the models.
     * @param User $user
     * @param UserRepository $userRepo
     */
    public function __construct(User $user, UserRepository $userRepo)
    {
        parent::__construct();
        $this->user = $user;
        $this->userRepo = $userRepo;
    }

    /**
     * Users settings page
     *
     * @return View
     */
    public function getIndex()
    {
        list($user,$redirect) = $this->user->checkAuthAndRedirect('user');
        if($redirect){return $redirect;}

        // Show the page
        return View::make('site/user/index', compact('user'));
    }

    /**
     * Stores new user
     *
     */
    public function postIndex()
    {
        $user = $this->userRepo->signup(Input::all());

        // If the user's registration was successful, send an email to all administrators
        // to let them know that a user has registered and is waiting for approval.

        // 1. Get a list of all admin users
        $admin_users = Role::find(1)->users()->get();
        $admin_emails = '';

        foreach($admin_users as $auser)
        {
            $admin_emails[] = $auser->email;
        }

        if ($user->id) {
            if (Config::get('confide::signup_email')) {
                // Send confirmation email to user
                Mail::queueOn(
                    Config::get('confide::email_queue'),
                    Config::get('confide::email_account_request'),
                    compact('user'),
                    function ($message) use ($user, $admin_users) {
                        $message
                            ->to($user->email, $user->first_name . " " . $user->last_name)
                            ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                    }
                );

                // Send notification to administrators
                Mail::queueOn(
                    Config::get('confide::email_queue'),
                    Config::get('confide::email_account_to_admin'),
                    compact('user'),
                    function ($message) use ($user, $admin_users) {
                        foreach($admin_users as $admin)
                        {
                            $message->to($admin->email, $admin->first_name . ' ' . $admin->last_name);
                        }
                        $message
                            ->subject(Lang::get('confide::confide.email.user_request.subject'));
                    }
                );

            }

            return Redirect::to('user/login')
                ->with('success', Lang::get('user/user.user_request_sent'));
        } else {
            $error = $user->errors()->all(':message');

            return Redirect::back()
                ->withInput(Input::except('password'))
                ->with('error', $error);
        }

    }

    /**
     * Edits a user
     * @var User
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(User $user)
    {
        $oldUser = clone $user;

        $user->username = Input::get('username');
        $user->email = Input::get('email');

        $password = Input::get('password');
        $passwordConfirmation = Input::get('password_confirmation');

        if (!empty($password)) {
            if ($password != $passwordConfirmation) {
                // Redirect to the new user page
                $error = Lang::get('admin/users/messages.password_does_not_match');
                return Redirect::to('user')
                    ->with('error', $error);
            } else {
                $user->password = $password;
                $user->password_confirmation = $passwordConfirmation;
            }
        }

        if ($this->userRepo->save($user)) {
            return Redirect::to('user')
                ->with( 'success', Lang::get('user/user.user_account_updated') );
        } else {
            $error = $user->errors()->all(':message');
            return Redirect::to('user')
                ->withInput(Input::except('password', 'password_confirmation'))
                ->with('error', $error);
        }

    }

    /**
     * Displays the form for user creation
     *
     */
    public function getCreate()
    {
        return View::make('site/user/create');
    }


    /**
     * Displays the login form
     *
     */
    public function getLogin()
    {
        $user = Auth::user();
        if(!empty($user->id)){
            return Redirect::to('/');
        }

        return View::make('site/user/login');
    }

    /**
     * Attempt to do login
     *
     */
    public function postLogin()
    {
        $repo = App::make('UserRepository');
        $input = Input::all();

        if ($this->userRepo->login($input)) {
            return Redirect::intended('/');
        } else {
            if ($this->userRepo->isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ($this->userRepo->existsButNotConfirmed($input)) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::to('user/login')
                ->withInput(Input::except('password'))
                ->with('error', $err_msg);
        }

    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string $code
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getConfirm($code)
    {
        if ( Confide::confirm( $code ) )
        {
            return Redirect::to('user/login')
                ->with( 'notice', Lang::get('confide::confide.alerts.confirmation') );
        }
        else
        {
            return Redirect::to('user/login')
                ->with( 'error', Lang::get('confide::confide.alerts.wrong_confirmation') );
        }
    }

    /**
     * Displays the forgot password form
     *
     */
    public function getForgot()
    {
        return View::make('site/user/forgot');
    }

    /**
     * Attempt to reset password with given email
     *
     */
    public function postForgotPassword()
    {
        if (Confide::forgotPassword(Input::get('email'))) {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
            return Redirect::back()
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
            return Redirect::back()
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    /**
     * Shows the change password form with the given token
     *
     */
    public function getReset( $token )
    {

        return View::make('site/partials/user/reset_password')
            ->with('token',$token);
    }


    /**
     * Attempt change password of the user
     *
     */
    public function postReset()
    {

        $input = array(
            'token'                 =>Input::get('token'),
            'password'              =>Input::get('password'),
            'password_confirmation' =>Input::get('password_confirmation'),
        );

        // By passing an array with the token, password and confirmation
        if ($this->userRepo->resetPassword($input)) {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
            return Redirect::to('user/login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
            return Redirect::back()
                ->with('token', $input['token'])
                ->withInput()
                ->with('error', $error_msg);
        }

    }

    /**
     * Log the user out of the application.
     *
     */
    public function getLogout()
    {
        Confide::logout();

        return Redirect::to('/');
    }

    /**
     * Get user's profile
     * @param $username
     * @return mixed
     */
    public function getProfile()
    {
        $user_id = Auth::user()->id;
        //$user = User::findOrFail($user_id)->with(['roles', 'roles.permissions'])->first();
        $user = User::where('id', $user_id)->with(['roles.permissions'])->get()->first();
        //return $user;
        $mode = 'edit';

        // Check if the user exists
        if (is_null($user))
        {
            return App::abort(404);
        }

        return View::make('admin/users/profile', compact('user', 'mode'));
    }

    /**
     * Changes user's profile information (for now just changes their password if that is entered)
     * @param $username
     * @return mixed
     */
    public function postProfile()
    {
        $current_user = Auth::id();
        $submitted_user = Input::get('id');

        $password = Input::get( 'password' );
        $passwordConfirmation = Input::get( 'password_confirmation' );

        if(!empty($password) && $current_user === $submitted_user) {
            if($password === $passwordConfirmation) {
                $user = $this->user->findOrFail($submitted_user);
                // Need to have both passwords due to Ardent's validation feature
                $user->password = $password;
                $user->password_confirmation = $passwordConfirmation;
                $user->save();
                return Redirect::to('user/profile')->with('success', Lang::get('user/user.alerts.password_reset'));
            } else {
                // Redirect to the new user page
                return Redirect::to('user/profile')->with('error', Lang::get('admin/users/messages.password_does_not_match'));
            }
        } else {
            return Redirect::to('user/profile');
        }
    }

    public function getSettings()
    {
        list($user,$redirect) = User::checkAuthAndRedirect('user/settings');
        if($redirect){return $redirect;}

        return View::make('site/user/profile', compact('user'));
    }

    /**
     * Process a dumb redirect.
     * @param $url1
     * @param $url2
     * @param $url3
     * @return string
     */
    public function processRedirect($url1,$url2,$url3)
    {
        $redirect = '';
        if( ! empty( $url1 ) )
        {
            $redirect = $url1;
            $redirect .= (empty($url2)? '' : '/' . $url2);
            $redirect .= (empty($url3)? '' : '/' . $url3);
        }
        return $redirect;
    }
}
