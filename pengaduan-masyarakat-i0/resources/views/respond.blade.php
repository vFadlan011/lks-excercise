@extends("layouts.admin")

@push('style')
<style>
  html {
    scroll-behavior: smooth;
  }

  td {
    padding-top: 8px;
    padding-bottom: 8px;
    vertical-align: top;
  }
</style>
@endpush

@section("container")
<div class="w-3/4 mt-8">
  <h1 class="text-4xl">Detail Aduan</h1>
  <div class="overflow-x-auto mt-8">
    <table id="aduan">
      <tr>
        <td class="w-48 min-w-[120px]">ID Aduan</td>
        <td class="w-3/4 min-w-[360px]">{{$report->id}}</td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>{{$report->name}}</td>
      </tr>
      <tr>
        <td>NIK</td>
        <td>{{$report->nik}}</td>
      </tr>
      <tr>
        <td>E-Mail</td>
        <td>{{$report->email}}</td>
      </tr>
      <tr>
        <td>No. HP</td>
        <td>{{$report->phone}}</td>
      </tr>
      <tr>
        <td>Tanggal Aduan</td>
        <td>{{date('D, j M o, H:i:s',$report->report_timestamp)}}</td>
      </tr>
      <tr>
        <td>Status</td>
        <td>{{$report->status}}</td>
      </tr>
      <tr>
        <td>Aduan</td>
        <td>{{$report->report_msg}}</td>
      </tr>
      <tr>
        <td>Foto 1</td>
        <td>
          <img src="/storage/{{$report->report_img1}}" alt="Foto 1">
        </td>
      </tr>
      <tr>
        <td>Foto 2</td>
        <td>
          @if($report->report_img2!=null)
          <img src="/storage/{{$report->report_img2}}" alt="Foto 2">
          @else
          <p class="text-red-700">Tidak dilampirkan</p>
          @endif
        </td>
      </tr>
      <tr>
        <td>Foto 3</td>
        <td>
          @if($report->report_img3!=null)
          <img src="/storage/{{$report->report_img3}}" alt="Foto 3">
          @else
          <p class="text-red-700">Tidak dilampirkan</p>
          @endif
        </td>
      </tr>
      <tr>
        <td>Foto 4</td>
        <td>
          @if($report->report_img4!=null)
          <img src="/storage/{{$report->report_img4}}" alt="Foto 4">
          @else
          <p class="text-red-700">Tidak dilampirkan</p>
          @endif
        </td>
      </tr>
      <tr>
        <td>Foto 5</td>
        <td>
          @if($report->report_img5!=null)
          <img src="/storage/{{$report->report_img5}}" alt="Foto 5">
          @else
          <p class="text-red-700">Tidak dilampirkan</p>
          @endif
        </td>
      </tr>
    </table>
  </div>
  <h2 class="text-2xl mt-4">Formulir Respon</h2>
  @if($errors->any())
  <h4 class="text-red-800">{{$errors->first()}}</h4>
  @endif
  <form action="" method="post" enctype="multipart/form-data" class="mt-8">
    @csrf
    <!-- status -->
    <div class="form-control md:flex-row md:justify-between md:items-start md:w-3/4 my-3 min-w-[144px] max-w-lg">
      <label for="status" class="label">Status</label>
      <select name="status" id="status" class="select md:w-3/4 max-w-md" required>
        <option {{($report->status=='BARU')?"selected":""}} disabled>BARU</option>
        <option {{($report->status=='DIPROSES')?"selected":""}}>DIPROSES</option>
        <option {{($report->status=='SELESAI')?"selected":""}}>SELESAI</option>
        <option {{($report->status=='DITOLAK')?"selected":""}}>DITOLAK</option>
      </select>
    </div>
    <!-- response_msg -->
    <div class="form-control md:flex-row md:justify-between md:items-start md:w-3/4 my-3 min-w-[144px] max-w-lg">
      <label for="response_msg" class="label">Tanggapan</label>
      <textarea name="response_msg" id="response_msg" cols="30" rows="10" class="textarea md:w-3/4 max-w-md" required>{{(old('response_msg')==null)?$report->response_msg:old('response_msg')}}</textarea>
    </div>
    <!-- img1 -->
    <div class="form-control md:flex-row md:justify-between md:items-start md:w-3/4 my-3 min-w-[144px] max-w-lg">
      <label for="img1" class="label">Foto 1</label>
      <div class="md:w-3/4 max-w-md">
        @if($report->response_img1!=NULL)
        <img src="/storage/{{$report->response_img1}}" class="mb-2">
        @endif
        <input type="file" name="img1" id="img1" class="file-input w-full">
      </div>
    </div>
    <!-- img2 -->
    <div class="form-control md:flex-row md:justify-between md:items-start md:w-3/4 my-3 min-w-[144px] max-w-lg">
      <label for="img2" class="label">Foto 2</label>
      <div class="md:w-3/4 max-w-md">
        @if($report->response_img2!=NULL)
        <img src="/storage/{{$report->response_img2}}" class="mb-2">
        @endif
        <input type="file" name="img2" id="img2" class="file-input w-full">
      </div>
    </div>
    <!-- img3 -->
    <div class="form-control md:flex-row md:justify-between md:items-start md:w-3/4 my-3 min-w-[144px] max-w-lg">
      <label for="img3" class="label">Foto 3</label>
      <div class="md:w-3/4 max-w-md">
        @if($report->response_img3!=NULL)
        <img src="/storage/{{$report->response_img3}}" class="mb-2">
        @endif
        <input type="file" name="img3" id="img3" class="file-input w-full">
      </div>
    </div>
    <!-- img4 -->
    <div class="form-control md:flex-row md:justify-between md:items-start md:w-3/4 my-3 min-w-[144px] max-w-lg">
      <label for="img4" class="label">Foto 4</label>
      <div class="md:w-3/4 max-w-md">
        @if($report->response_img4!=NULL)
        <img src="/storage/{{$report->response_img4}}" class="mb-2">
        @endif
        <input type="file" name="img4" id="img4" class="file-input w-full">
      </div>
    </div>
    <!-- img5 -->
    <div class="form-control md:flex-row md:justify-between md:items-start md:w-3/4 my-3 min-w-[144px] max-w-lg">
      <label for="img5" class="label">Foto 5</label>
      <div class="md:w-3/4 max-w-md">
        @if($report->response_img5!=NULL)
        <img src="/storage/{{$report->response_img5}}" class="mb-2">
        @endif
        <input type="file" name="img5" id="img5" class="file-input w-full">
      </div>
    </div>
    <div class="flex justify-end max-w-lg">
      <input id="submit" name="submit" type="submit" value="Simpan" class="btn btn-primary">
    </div>
  </form>
</div>

@endsection