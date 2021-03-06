<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Info;
use App\Laporan;
use App\Komentar;
use App\Http\Requests\errorProfile;

use Auth;

class MuridController extends Controller
{

    public function show($username)
    {
        $user = User::whereUsername($username)->first();
        $laporans = Laporan::where('murid_id' , $user->id)->orderBy('created_at' , 'desc')->simplePaginate(5);
        $komentars = Komentar::with('laporan')->orderBy('created_at' , 'desc')->get();
        $infotutor= Info::with('user')->where('untuk', 'Tutor')->first();
        $infomurid= Info::with('user')->where('untuk', 'Siswa')->first();
        $tutor = $user->tutors()->where('tutor_id','=' , Auth::user()->id)->pluck('tutor_id')->first();
        // dd($tutor);
        // $murids = $user->murids;
        // if($user->tutors != Null){
        // $tutors = $user->tutors()->where('tutor_id', Auth::user()->id)->first();
        // }
        
        if (empty($user) || $user->role != 'Murid') {
            abort(404);
        }
        else {
            return view('murid.show' , compact('user', 'tutor','komentars' , 'laporans', 'infomurid', 'infotutor' ));
        }
    }
    
    
  
    public function search(Request $request){
    $search = $request->id;
    $users = User::where('name','LIKE',"%{$search}%")->where('role' , 1)
                           ->get();  

    $outputhead = '';
    $outputbody = '';  
    $token = csrf_field();
    $delete = method_field('DELETE') ;
    
    $outputhead .= '<center><p>Hasil pencarian <b>'.$search.'</b></p></center>';
    
    
   if($users->isNotEmpty())   { 
    foreach ($users as $user){
    
    $outputbody .=  '<div class="media">
  <img class="mr-3 rounded-circle border-avatar" src="'.$user->gravatar.'" width="40" height="40"alt="Generic placeholder image">
  <div class="media-body">
    <a href="/tutor/'.$user->username.'"><p class="mt-0 mb-0">'.$user->name.'</p></a>
    <small class="mt-0 ">'.$user->username.' | '.$user->created_at->diffForHumans().' | '.$user->role.'</small>
    </div>

</div>
<hr>';  
    }  

    echo $outputhead; 
    echo $outputbody; 
 }  
  else {
        echo $outputhead;
        echo 'tidak ditemukan';
    }
    }
 
 public function telusuri(){
        $user = Auth::user();
        $infomurid= Info::with('user')->where('untuk', 'Siswa')->first();
        $laporans = Laporan::where('murid_id' , $user->id)->orderBy('created_at' , 'desc')->limit(5)->get();
        return view('murid.telusuri', compact('user', 'laporans','infomurid'));
    } 
    
    public function profile()
    {
        $user = Auth::user();
        $infomurid= Info::with('user')->where('untuk', 'Siswa')->first();
        $laporans = Laporan::where('murid_id' , $user->id)->orderBy('created_at' , 'desc')->limit(5)->get();
        return view('murid.profile', compact('user', 'laporans', 'infomurid'))->with('info' , Auth::user()->profile);  
    }
    
    public function profileUpdate(errorProfile $request)
    {
        Auth::user()->profile()->update([
        'kelas' => $request->kelas,
        'sekolah' => $request->sekolah,
        'ortu' => $request->ortu,
        'note' => $request->note,
        ]);
       return back()->with('status','Data Berhasil Disimpan');
    }
}
