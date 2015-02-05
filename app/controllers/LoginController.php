<?php
 class LoginController extends BaseController {

 	public function index(){

      if(Input::has('_token')){

        // validation rules
        $rules =  array(
          'email'              => 'required|email',
          'password'           => 'required'
        );

            $validator = Validator::make(Input::get('values'), $rules);

           // get data from post input
            $values = Input::get('values');

           if(!$validator->fails()){

              $user = User::getUserByEmail($values['email']);

              if (!empty($user) && Hash::check($values['password'], $user->password)){ 

                    // save logged user on session
                    Session::put('user', $user);

                    // render user list view
                    return Redirect::to('usuario');

              }else{
                  echo 'empty($user)'; 
              }

           }else{

              return View::make('login.index')->withErrors($validator)->with('values', $values);

           }

      }else{

        // first time 
        return View::make('login.index');
      }
  }

  public function logout(){
    Session::flush();
    return Redirect::to('iniciar-sesion');
  }


 }
?>