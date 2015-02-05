<?php
 class UserController extends BaseController {

  
  public function __construct(){

    //not user on session
    $this->beforeFilter(function()
        {
      if(is_null(Session::get('user'))){

        return Redirect::to('iniciar-sesion');
      }
        });
  }


 	public function getIndex(){

      $nombre = 'Fernando';

      $a = array(
        'a'   =>'alde',
        'b'   => 'diaz');

      return View::make('user.index')->with('a', $a);
    }


   public function enumerate(){

   $users = User::enumerate();

   return View::make('user.index')->with('users', $users);

   }

    public function add() {

      if(Input::has('_token')){

        // validation rules
        $rules =  array(
          'real_name'          => 'required',
          'email'              => 'required|email',
          'password'           => 'required',
          'repeat_password'    => 'required|same:password',
          'level'              => 'required',
          'active'             => ''
        );

            $validator = Validator::make(Input::get('values'), $rules);

           // get data from post input
            $values = Input::get('values');

           if(!$validator->fails()){

              $user = array(
                'real_name'       => $values['real_name'],
                'email'           => $values['email'],
                'password'        => Hash::make($values['password']),
                'level'           => $values['level'],
                'active'          => isset($values['active'])?$values['active']:'0'
              );

              // inset user on DB
              if(User::insert($user)>0){

                return Redirect::to('usuario');

              }else{

                 echo 'No se pudo insertar el usuario';  
                
              }

           }else{

              return View::make('user.add')->withErrors($validator)->with('values', $values);

           }

      }else{

        // first time 
        return View::make('user.add');
      }
   }

   public function edit($userId) {
      echo 'user '. $userId;
   }


 }
?>