<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Laravel\Prompts\Output\ConsoleOutput;


class AdminController extends Controller
{
    public function index(){


        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $max=Incident::select('zone',  DB::raw('count(num) as total'))->where('zone','not like','')->groupBy('zone')->orderBy('total','DESC')->get();
        $nb_users=User::all()->count();
        $var=$max->first();
        return view("dashboard",compact('var','nb_users'));
    }




    public function users(Request $request){
        $users= User::all();

        return view('admin.users',compact('users'));
    }

    public function edit_user($id){
        $edit=User::where('id',$id)->get()->first();
        $test=0;


        return view('admin.edit',compact('edit','id'));
    }

    public function delete_user($id){
        $delete=User::findOrFail( $id );
        $delete->delete();
        return response()->json(['status'=>'User Deleted Successfully']);
        //return redirect('/admin/users');
    }

    public function changePassword(Request $request , $id){
        $test=1;
        $request->validate([
            'CurrPass' => 'required',
            'NewPass'=> 'required|min:8',
            'ConfirmPass'=> 'required|same:NewPass',
        ]);
        $user=User::where('id',$id)->get()->first();

       /* if(!(Hash::check($request->CurrPass, Auth::user()->password))){
            return redirect()->back()->with('error','Your current password does not match with the password you entered');
        }*/
        if(!(Hash::check($request->CurrPass, $user->password))){
            return redirect()->back()->with('error','Your current password does not match with the password you entered');
        }


        if(Hash::check($request->NewPass, $user->password)){
            return redirect()->back()->with('error','New Password cannot be same as your current password');
        }


        User::where('id',$request->id)->update(['password'=>(Hash::make($request->NewPass))]);
        User::where('id',$request->id)->update(['updated_at'=>(date('Y-m-d H:i:s'))]);

        Alert::toast('Your password is reset!','success');
        return redirect('/admin/users');

    }


    public function add_user(Request $request){
        return view('admin.add');
    }
    public function insert_user(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=>'required|unique:users',
            'password'=> 'required|min:8',
            'confirm_password'=> 'required|same:password',
        ]);

        $data= array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $data['profil']=$request->profil;
        $data['created_at']=date('Y-m-d H:i:s');
        $data['updated_at']=date('Y-m-d H:i:s');


    $insert =User::create($data);
    if($insert){

        Alert::toast('Vous avez ajouté un utilisateur','success');
        return redirect('/admin/users');
    }else{
       Alert::error('Error','une erreur est parvenue');
       return redirect('/');
    }

    }
    public function update_user(Request $request, $id){

        $request->validate([
            'name'=> 'required',
            'email'=> 'required',

        ]);
        $test=2;
        $name=$request->name;
        $email=$request->email;
        $profile=$request->profil;
        if (User::where('email', $email)->count()>1){
            redirect()->back()->with('error','This email is already existant !');
        }







    $update =User::where('id',$id)->update(['name'=>$name,  'email'=>$email,'profil'=>$profile, 'updated_at'=>date('Y-m-d H:i:s') ]);
    if($update){
        Alert::toast('User\'s informations updated !','success');
        return redirect('/admin/users');
    }
    Alert::toast('Error!! Try again','error');
        return redirect('/');



    }


    public function profile(Request $request){
        $edit=User::where('id',Auth::user()->id)->get()->first();

        return view('admin.profile',compact('edit'));
    }
}
