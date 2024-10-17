# Auth module

# 1- Create user login with jetstream 
# 2- add this coloum in user $table->string('utype')->default('buyer');
# 3- make middleware php artisan make:middle AuthAdmin
# 4- In Admin middlewire
public function handle(Request $request, Closure $next)
    {
        if (session('utype') === 'admin') {
            return $next($request);
        } else {
            session()->flush();
            return redirect()->route('login');
        }
        return $next($request);
    }

# 5- open kernal.php
inside the  protected $routeMiddleware = [
        'authadmin' => \App\Http\Middleware\AuthAdmin::class,
],

# 6- go to provide 
   open route service provider
    can change this public const HOME = '/dashboard';
    public const HOME = '/';

# 7- open  vendor then laravel then forify then src then actions then 
open AttemptToAuthenticate.php
inside this handle method
public function handle($request, $next)
    {
        if (Fortify::$authenticateUsingCallback) {
            return $this->handleUsingCustomCallback($request, $next);
        }

        if ($this->guard->attempt(
            $request->only(Fortify::username(), 'password'),
            $request->boolean('remember')
        )) {
            if (Auth::user()->utype === 'admin') {
                session(['utype' => 'admin']);
                return redirect(RouteServiceProvider::HOME);
            }
            return $next($request);
        }

        $this->throwFailedAuthenticationException($request);
    }
# 8- open web.php and this 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'authadmin'])->group(function () {
    //inside this admin pages
});




# 9- i will make two saprete routes for admin and user with 2 middleware and 2 web gaurd
