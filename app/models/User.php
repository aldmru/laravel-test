<?php

class User extends Eloquent{

	public static function insert($values){

		return DB::table('users')->insertGetId($values);
	}

	public static function enumerate(){

		return DB::table('users')->where('active', TRUE)->get();
	}

	public static function getUserByEmail($email){

		return DB::table('users')->where('email', $email)->first();
	}

}

?>