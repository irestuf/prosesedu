<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $fillable = ['level_id', 'pelajaran_id', 'pertanyaan', 'A', 'B', 'C', 'D', 'E', 'kunci'];
     
    public function level()
    {
        return $this->belongsTo('App\Level');
    }
    
    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran');
    }
    
      public function jawaban()
    {
        return $this->belongsTo('App\Jawaban');
    }
}
