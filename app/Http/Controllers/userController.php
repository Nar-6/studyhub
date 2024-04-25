<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

//j'ai juste créer cela pour faire mes tests
class userController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function handdleRegister(UserRequest $request)
    {
        try {
            // Créer un nouvel utilisateur avec les données du formulaire
            $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> $request->role,
            ]);
            // Generer un remember token
            $user->remember_token = Str::random(60);
            // Sauvegarder un utilisateur
            $user->save();
            return redirect()->route($this->getDashboardRoute($user->role))->with('success', 'Votre compte a été créé avec succès !');

        }catch (\Exception $e) {
            // En cas d'erreur, afficher un message d'erreur et rediriger l'utilisateur vers le formulaire d'inscription avec les données précédemment soumises
               return redirect()->back()->withInput()->with('error', 'Une erreur est survenue lors de la création de votre compte. Veuillez réessayer.');
            }
        }

    public function login()
    {
        return view('user.login');
    }

    public function handdleLogin(Request $request):RedirectResponse
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route($this->getDashboardRoute(auth()->user()->role));
        } else {
            return redirect()->back()->withInput()->with('error', 'Informations de connexion non reconnues !');
        }
    }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('login');
    }

    // Méthode pour récupérer le nom de la route du tableau de bord en fonction du rôle de l'utilisateur
    protected function getDashboardRoute($role)
    {
        switch ($role) {
            case 'Professeur':
                return 'dashboard.prof';
            case 'Administration':
                return 'dashboard.administration';
            case 'Parent':
                return 'dashboard.parent';
            default:
                return 'dashboard.etudiant';
        }
    }

 // Méthode pour afficher le formulaire de réinitialisation de mot de passe
 public function forgotView()
 {
     return view('user.forgotPwd');
 }

 // Méthode pour envoyer l'email de réinitialisation de mot de passe
 public function forgotPwdEmail(Request $request)
 {
     $request->validate(['email' => 'required|email']);

     $status = Password::sendResetLink(
         $request->only('email')
     );

     return $status === Password::RESET_LINK_SENT
         ? back()->with(['status' => __($status)])
         : back()->withErrors(['email' => __($status)]);
 }

 // Méthode pour afficher le formulaire de réinitialisation de mot de passe avec le jeton
 public function resetPwdView(string $token)
 {
     return view('user.resetPwd', ['token' => $token]);
 }

 // Méthode pour traiter le formulaire de réinitialisation de mot de passe
 public function resetPwdForm(Request $request)
 {
     $request->validate([
         'token' => 'required',
         'email' => 'required|email',
         'password' => 'required|min:8|confirmed',
     ]);

     $status = Password::reset(
         $request->only('email', 'password', 'password_confirmation', 'token'),
         function (User $user, string $password) {
             $user->forceFill([
                 'password' => Hash::make($password)
             ])->setRememberToken(Str::random(60));

             $user->save();

             event(new PasswordReset($user));
         }
     );

     return $status === Password::PASSWORD_RESET
         ? redirect()->route('login')->with('status', __($status))
         : back()->withErrors(['email' => [__($status)]]);
 }

}
