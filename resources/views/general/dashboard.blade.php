@extends('layouts.main')
@section('title','Dashboard')
@section('content')
<section class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
             </ol>
          </div>
       </div>
    </div>
 </section>
 <section class="content">
    <div class="card">
       <div class="card-header">
          <h3 class="card-title">Dashboard</h3>
          <div class="card-tools">
             <button
                type="button"
                class="btn btn-primary"
                title="Collapse">
             <i class="fas fa-minus"></i>
             </button>
          </div>
       </div>
       <div class="card-body">
          Start creating your amazing application!
       </div>
       <div class="card-footer">
          Footer
       </div>
    </div>
 </section>
@endsection
