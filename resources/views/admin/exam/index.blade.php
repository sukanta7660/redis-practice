@extends('layouts.main')
@section('title','Exams')
@section('content')
<section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1>Exam List</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Exam List</li>
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
                   <h3 class="card-title">All Exam</h3>
                   <div class="card-tools">
                      <a
                         href="{{ route('admin.exams.create') }}"
                         class="
                         btn
                         btn-primary
                         btn-sm
                         text-capitalize
                         "
                         title="Collapse">
                      <i class="fas fa-plus mr-1"></i>
                      Add new
                      </a>
                   </div>
                </div>
                <div class="card-body">
                   <table
                      id="example1"
                      class="table
                      table-bordered
                      table-striped
                      ">
                      <thead>
                         <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Marks</th>
                            <th>Question</th>
                            <th>Duration</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Action</th>
                         </tr>
                      </thead>
                      <tbody>
                         @foreach ($exams as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->total_marks }}</td>
                                <td>{{ $item->question_length }}</td>
                                <td>{{ $item->total_time }}</td>
                                <td>{{ date('d/m/Y h:i a',strtotime($item->start)) }}</td>
                                <td>{{ date('d/m/Y h:i a',strtotime($item->end)) }}</td>
                                <td>
                                    <a
                                    href="{{ route('admin.exams.show',$item->id) }}"
                                    class="
                                    btn
                                    btn-primary
                                    btn-sm
                                    text-capitalize
                                    "
                                    title="give exam">
                                    Give Exam
                                    </a>
                                </td>
                            </tr>
                         @endforeach
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
@endsection
