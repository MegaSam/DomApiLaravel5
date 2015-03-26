<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Myuser;
use Illuminate\Http\Request;
use PhpParser\Error;
use Psy\Exception\ErrorException;

class MainController extends Controller {

  public function __construct()
  {
    $this->middleware('auth');
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $myusers = Myuser::getAll();
    $message = '';
    if (\Input::get('message') == 'edit')
      $message = 'Изменения успешно сохранены!';
    elseif (\Input::get('message') == 'add')
      $message = 'Пользователь успешно добавлен!';

    return view('main')->with(array(
      'message'=>$message,
      'myusers'=>$myusers
    ));
	}

  public function addUser()
  {
    $data = \Input::all();

    if (count($data))
    {
      $rules = [
        'login' => 'required|min:5',
        'nick' => 'required|min:5',
        'email' => 'required|email|unique'
      ];

      $val = \Validator::make($data, $rules);
      if ($val->fails())
      {
        return redirect()->back()->withErrors($val->errors());
      }

      Myuser::addUser($data);
      return redirect('/?message=add');
    }
    else
      return view('add');
  }

  public function editUser($id)
  {
    $id = (int)$id;
    $myuser = Myuser::getUser($id);

    $data = \Input::all();

    if (count($data))
    {
      $rules = [
        'login' => 'required|min:5',
        'nick' => 'required|min:5',
        'email' => 'required|email'
      ];

      $val = \Validator::make($data, $rules);
      if ($val->fails())
      {
        return redirect()->back()->withErrors($val->errors());
      }

      Myuser::editUser($id, $data);
      return redirect('/?message=edit');
    }
    else
      return view('edit')->with('myuser', $myuser);
  }

  public function deleteUser($id)
  {
    $id = (int)$id;
    Myuser::deleteUser($id);

    return redirect('/');
  }

  public function infoUser($id)
  {
    $user = Myuser::getUser($id);

    return view('info')->with('user', $user);
  }
}