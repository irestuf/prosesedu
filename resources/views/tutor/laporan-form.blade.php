<form role="form" action="{{ url('tutor/'.$user->username.'/laporan') }}" method="POST">
    {{ csrf_field() }}
<div class="input-group mb-1">
    <div class="btn-group btn-group-toggle justify-content-between" data-toggle="buttons">
  <label class="btn btn-outline-danger ">
    <input type="radio" name="hadir" value="0" id="option1" autocomplete="off" required> Absen
  </label>
  <label class="btn btn-outline-info" >
    <input type="radio" name="hadir" value="1"  id="option2" autocomplete="off" required > Hadir
  </label>
</div>
</div>
<div class="input-group mb-1">
<div class="input-group-prepend">
        <select class="form-control custom-select" id="" name="nilai_afektif" required >
      <option value="">Nilai Afektif</option>
      <option value="A">A | Amat Baik</option>
      <option value="B">B | Baik</option>
      <option value="C">C | Cukup Baik</option>
      <option value="D">D | Kurang Baik</option>
    </select>
</div>
<input type="text"  class="form-control" name="nilai_kognitif" placeholder="Nilai Kognitif" required >
</div>
  <div class="input-group mb-1">
   <input type="text" class="form-control " autocomplete="off" id="mapel" name="mapel" placeholder="Ketik mata pelajaran" required >
   <div class="autocomplete shadow"></div>
   </div>
   <div class="input-group mb-1">
        <select class="form-control custom-select" id="" name="kelas" required >
      <option value="">Jenis Program</option>
      <option value="1">Kelas Regular</option>
      <option value="2">Kelas Private</option>
      <option value="3">Kelas Intensif</option>
      <option value="4">Kelas Master</option>
      <option value="5">Kelas Olimpiade</option>
    </select>
</div>
  <div class="form-group">
    <textarea name="isi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Catatan" required ></textarea>
  </div>
  <button class="btn btn-primary btn-block" type="submit">Kirim</button>
</form>