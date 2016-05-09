<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserInfo;
use App\UserAction;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('find', ['only' => ['show','update','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = UserInfo::all();

        return response()->json($users->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserInfo::create($request->all());
        return response()->json(["message" => "User created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, $name = null)
    {
        
        $user = $request->get('user');
        
        //Update times that the user has been readed
        $this->_updateUserInputOutput($id);

        return response()->json( $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $request->get('user');
        //Update times that the user has been readed
        $this->_updateUserInputOutput($id);

        $user->fill($request->all());
        $user->save();
        return response()->json(["message" => "User updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = $request->get('user');
        $user->delete();
        return response()->json(["message" => "User deleted"]);
    }


    /**
     * Menthod to define if a user exits in t2
     * or not
     * @param int $userid
     * @return Array 
     */
    protected function _userExists($userid){
        $findUser = UserAction::find($userid);

        if ($findUser) {
            $return = $findUser->toArray();
        }else{
            $return = FALSE;
        }

        return $return;
    }


    /**
     * Method to insert or update the
     * times that user read/updated 
     * @param int $userid
     */  
    protected function _updateUserInputOutput($userid){
        $userExists = $this->_userExists($userid);

        if ($userExists) {
            $numberInputOutput = $userExists['NumberOfI_O'] + 1;
            UserAction::where('Userid', $userid)
                    ->update(['NumberOfI_O' => $numberInputOutput]);
        }else{
            $numberInputOutput = 1;
            UserAction::create(['Userid' => $userid, 'NumberOfI_O' => $numberInputOutput]);
        }
        
    }
}
