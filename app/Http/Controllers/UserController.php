<?php

namespace App\Http\Controllers;


class UserController extends Controller
{
    // // Logout
    // public function doLogout() {
    //     Auth::logout();
    //     return redirect()->route('user.showLogin');
    // }
    
    // // Show index
    // public function showIndex($id) {
        
    //     if($id == "") {
    //         return redirect()->route('user.showLogin');
    //     }
        
    //     $user = User::find($id);
    //     $chores = $user->chores()->get();
    //     return view('user_views.index', compact('chores', 'user')); // CARGA LA VIEW PRINCIPAL CON LA INFO DEL USUARIO
    // }
    
    // //Show login form
    // public function showLogin() {
    //     return view('user_views.login'); // CARGA LA VIEW DE LOGIN PARA PODER REALIZAR LOGIN
    // }

    // //Do login
    // public function doLogin(Request $request) {
    //     // VALIDAR DATOS DE ENTRADA
    //     $validator = Validator::make(
    //         $request->all(),
    //         [
    //             "email" => "required|email:rfc,dns|exists:App\Models\User,email",
    //             "password" => "required",
    //         ]
    //     );

    //     // SI LOS DATOS SON INVÁLIDOS, DEVOLVER A LA PÁGINA ANTERIOR E IMPRIMIR LOS ERRORES DE VALIDACIÓN
    //     if ($validator->fails()) {
    //         return redirect()->route('user.showLogin')->withErrors($validator)->withInput();
    //     }

    //     // SI EL LOGIN ES INCORRECTO, DEVOLVER A LA PÁGINA ANTERIOR E IMPRIMIR LOS ERRORES DE VALIDACIÓN
    //     // SI LOS DATOS SON VÁLIDOS (SI EL LOGIN ES CORRECTO) CARGAR LA VISTA PRINCIPAL DEL USUARIO.
    //     // LA VISTA PRINCIPAL DE USUARIO DEBE INCLUIR:
    //     /*
    //         -> Un header que contenga el nombre del usuario.
    //         -> Un botón de logout que redirija a la view de login.

    //         -> La lista de tareas, tanto pendientes como realizadas, que el usuario tiene asignadas.
    //         -> Un botón al lado de cada tarea para eliminar la tarea.
    //         -> Un botón para marcar como hecha la tarea.
    //     */
    //     $userEmail = $request->get('email');
    //     $userPassword = $request->get('password');
        
    //     $emailYPasswordUser = [
    //         'email' => $userEmail,
    //         'password' => $userPassword,
    //     ];
    //     if (Auth::attempt($emailYPasswordUser, true)) { // Auth::attempt busca al usuario en la base de datos y, si las credenciales son correctas, devuelve true y además crea una Session en la BD
    //         $request->session()->regenerate();

    //         $user = User::where('email', $userEmail)->first();
    //         return redirect()->route('user.showIndex', ['id' => $user->id]); // CARGA LA VIEW PRINCIPAL CON LA INFO DEL USUARIO
    //     } else {
    //         $validator->errors()->add('credentials', 'Credenciales incorrectas');
    //         return redirect()->route('user.showLogin')->withErrors($validator)->withInput();
    //     }
        
    // }

    // //Show register form
    // public function showRegister() {
    //     return view('user_views.register'); // CARGA LA VIEW DE REGISTER PARA PODER REALIZAR UN ALTA DE USUARIO
    // }

    // //Do register
    // public function doRegister(Request $request) {

    //     // VALIDAR DATOS DE ENTRADA. LAS REGLAS DE VALIDACIÓN SON LAS SIGUIENTES:
    //     /*
    //         -> nombre es obligatorio, debe ser un string y debe ser menor de 20 carácteres
    //         -> email es obligatorio, debe seguir un formato estándar, debe ser único en la base de datos
    //         -> password es obligatoria, debe ser mayor de 5 carácteres, menor de 20 carácteres, debe contener una minúscula, una mayúscula y al menos un dígito
    //         -> password_repeat es obligatoria y debe ser igual a password
    //     */
    //     $validator = Validator::make(
    //         $request->all(),
    //         [
    //             "name"=>"required|string|max:20",
    //             "email"=> "required|email:rfc,dns|unique:App\Models\User,email",
    //             "password"=>"required|min:5|max:20|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/",
    //             "password_repeat"=>"required|same:password"
    //         ],[
    //             "password.min" => "La contraseña debe contener 5 carácteres mínimo",
    //             "password.max" => "La contraseña debe contener 20 carácteres máximo",
    //             "password.regex" => "La contraseña debe contener una minúscula, una mayúscula y un dígito",
    //         ]
    //     );

    //     // SI LOS DATOS SON INVÁLIDOS, DEVOLVER A LA PÁGINA ANTERIOR E IMPRIMIR LOS ERRORES DE VALIDACIÓN
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
        
    //     // SI LOS DATOS SON VÁLIDOS (SI EL REGISTRO SE HA REALIZADO CORRECTAMENTE) CARGAR LA VIEW DE LOGIN PARA PODER REALIZAR LOGIN
    //     $datosUsuario = $request->all();
    //     $user = new User();
    //     $user->name = $datosUsuario['name'];
    //     $user->email = $datosUsuario['email'];
    //     $user->password = $datosUsuario['password'];
    //     $user->save();

    //     return redirect()->route('user_views.login'); // CARGA LA VIEW DE LOGIN PARA PODER REALIZAR LOGIN
    // }
}
