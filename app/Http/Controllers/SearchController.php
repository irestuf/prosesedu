<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
   
    public function load(Request $request){
            $search = $request->id;
            
            
    $users = User::where('name','LIKE',"%{$search}%")
                           ->get();
             
    $outputhead = '';
    $outputbody = '';  

    $outputhead .= '<center><p>Hasil pencarian <b>'.$search.'</b></p></center>';
                  
    foreach ($users as $user)

    {   
               if(empty($user->name )){
                   echo 'tak ada';
               }  

    $outputbody .=  ' 
                
                           <div class="media">
  <img class="mr-3" src="'.$user->gravatar.'"  width="50" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0">'.$user->name.'</h5>
    '.$user->email.' | '.$user->created_at->diffForHumans().' | '.$user->role.'
    </div>
        <form method="POST" action="{{url("/admin/userdelete/'.$user->id.'")}}">
<input type="hidden" name="_method" value="DELETE">
<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
</form>
</div>
<hr>
                    ';
                
    }  

         
    echo $outputhead; 
    echo $outputbody; 
 }  
 

}
