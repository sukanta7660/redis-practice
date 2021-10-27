@extends('layouts.main')
@section('title','Single Exam')
@push('css')
<link href="{{ asset('custom.css') }}" rel="stylesheet"/>
@endpush
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>{{ $exam->title }}</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ route('admin.exams.index') }}">Exam List</a></li>
               <li class="breadcrumb-item active">{{ $exam->title }}</li>
            </ol>
         </div>
      </div>
   </div>
</section>
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <form
            action="{{ route('admin.exams.submit_answer') }}"
            method="post"
            >
            @csrf
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">{{ $exam->title }}</h3>
                     <div class="card-tools">
                         <h5 class="text-danger text-bold">
                             Time left:
                            <span id="demo"></span>
                         </h5>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="container mt-sm-5 my-1">
                        <div class="question ml-sm-5 pl-sm-5 pt-2">
                           <div class="py-2 h5">
                              <b>#{{ Session::get('nextq') }}. {{ $question->question }}</b>
                           </div>
                           @foreach ($question->option as $k => $row)
                           <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                              <label class="options">{{ $row->option }} <input type="radio" name="option" value="{{ $row->id }}"> <span class="checkmark"></span> </label>
                           </div>
                           @endforeach
                        </div>
                        {{-- Question Id hiddenly set --}}
                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                        <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                        <div class="d-flex align-items-center pt-3">
                           <div id="prev">
                               <button
                               id="previous"
                               class="btn btn-primary
                               ">Previous</button>
                            </div>
                           <div class="ml-auto mr-sm-5">
                               <button type="submit" class="btn btn-success">Next</button>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
@endsection
@push('js')
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script>

    let start = '{{ date('m/d/Y H:i:s',strtotime($exam->start)) }}';
    let end = '{{ date('m/d/Y H:i:s',strtotime($exam->end)) }}';
// console.log(end);
// Set the date we're counting down to
var countDownDate = new Date(end).getTime();



// Update the count down every 1 second
var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate - now;

  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("demo").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";

  }
}, 1000);
</script>
@endpush
