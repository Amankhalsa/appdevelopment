<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Image;
class AdminController extends Controller
{
    //

    public function admin_dashboard(){
        return view('backend.index');
    }
    // view profile
    public function admin_view_profile(){
        return view('backend.profile.index');
    }
// edit admin profile info 
    public function admin_edit_profile(){
        if(Auth::user()){
            
            $user['edit_profile'] =User::find(Auth::id());
            if($user){
                return view('backend.profile.edit' ,$user);
            }

        }
       
  
    }
//update profile 
    public function admin_update_profile(Request $request){
        $request->validate([
            'name' =>'required',
            'email' =>'required|email',
            'profile_photo_path' =>'required|image|mimes:jpg,png,jpeg,svg,webp|max:4096',
            

            ]);
            $user =User::find(Auth::id());
            $old_profile = $user->profile_photo_path;

            if($request->file('profile_photo_path')){
                $profile_img =  $request->file('profile_photo_path');
                $name_gen = hexdec(uniqid()).'.'.$profile_img->getClientOriginalExtension();
                Image::make($profile_img)->fit(100,100)->save(public_path('backend/images/profile/'.$name_gen));
                $save_url = 'backend/images/profile/'.$name_gen;
                 if(file_exists( $old_profile)){
                unlink( $old_profile);  
                }
                $user =User::find(Auth::id());
                if($user){
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->profile_photo_path = $save_url;
                    $user->save();
                    $notification = array(
                        'message' => ' Profile image updated  ',
                        'alert-type' => 'info'
                        );
                    return redirect()->route('view.profile')->with($notification );
                }
              }else {
                $user =User::find(Auth::id());
                if($user){
                    $user->name = $request->name;
                    $user->email = $request->email;
               
                    $user->save();
                    $notification = array(
                        'message' => ' Profile data updated ',
                        'alert-type' => 'success'
                        );
                    return redirect()->route('view.profile')->with($notification );
                }
              }
            
        }
}
