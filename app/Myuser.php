<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Myuser extends Model {

  protected $table = 'myusers';
  public $timestamps = false;
  public static $unguarded = true;


  public static function getAll()
  {
    $myusers = Myuser::all();

    return $myusers;
  }

  public static function addUser($data)
  {
    $new_user = Myuser::create([
      'login' => $data['login'],
      'nick' => $data['nick'],
      'email' => $data['email']
    ]);

    return $new_user;
  }

  public static function editUser($id, $data)
  {
    $new_user = Myuser::where('id','=',$id)->update([
      'login' => $data['login'],
      'nick' => $data['nick'],
      'email' => $data['email']
    ]);

    return $new_user;
  }

  public  static function deleteUser($id)
  {
    $del = Myuser::find($id)->delete();

    return $del;
  }

  public static function getUser($id)
  {
    $myuser = Myuser::find($id);

    return $myuser;
  }

}
