@extends('layouts.main')
@section('title','Exams')
@section('content')
<section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1>Create Exam</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Create Exam</li>
             </ol>
          </div>
       </div>
    </div>
 </section>
 <section class="content">
    <div class="container-fluid">
       <div class="row">
          <div class="col-12">
             <div class="card">
                <div class="card-header">
                   <h3 class="card-title">Basic Info</h3>
                </div>
                <form
                action="{{ route('admin.exams.store') }}"
                method="POST"
                enctype="multipart/form-data"
                >
                @csrf
                   <div class="card-body">
                      <div class="form-group">
                         <label for="ex_title">Exam Title</label>
                         <input name="title" type="text" class="form-control" id="ex_title" placeholder="Enter ttitle">
                      </div>
                      <div class="form-group">
                         <label for="total_marks">Total Marks (Optional)</label>
                         <input name="total_marks" type="text" class="form-control" id="total_marks">
                      </div>
                      <div class="form-group">
                         <label for="total_time">Total Time</label>
                         <input name="total_time" type="text" class="form-control" id="total_time" placeholder="Ex: 10">
                      </div>
                      <div class="form-group">
                         <label for="total_time">Start Time</label>
                         <input name="start" type="datetime-local" class="form-control" id="start_time" placeholder="Ex: 10">
                      </div>
                      <div class="form-group">
                         <label for="total_time">End Time</label>
                         <input name="end" type="datetime-local" class="form-control" id="end_time" placeholder="Ex: 10">
                      </div>
                      <div class="form-group">
                        <label for="question_length">Question Length</label>
                        <input name="question_length" type="number" class="form-control" id="question_length">
                     </div>
                   </div>
                   <div class="card-footer">
                    <button
                    type="submit"
                    class="
                    btn
                    btn-primary
                    btn-sm
                    text-capitalize
                    "
                    id="submit_button"
                    title="Collapse">
                 <i class="fas fa-plus mr-1"></i>
                 create exam
                 </button>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </div>
 </section>
@endsection
@push('js')

@endpush
