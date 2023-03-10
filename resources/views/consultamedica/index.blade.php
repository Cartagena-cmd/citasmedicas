@extends('layouts.panel')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">

  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Mis citas</h3>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if (session('notificacion'))
      <div class="alert alert-success" role="alert">
        {{ session('notificacion') }}
      </div>
      @endif

      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="pill" href="#consultamedica-confirmada" role="tab" aria-selected="true">
            Mis próximas citas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#consultamedica-pendiente" role="tab" aria-selected="false">
            Citas por confirmar
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#consultamedica-historial" role="tab" aria-selected="false">
            Historial de citas
          </a>
        </li>
        
      </ul>
    </div>    

    <div class="tab-content" id="pills-tabContent">
      
        
     
      <div class="tab-pane fade show active" id="consultamedica-confirmada" role="tabpanel">
        <a class="ml-4 mb-4 btn btn-danger "  href="{{route('descargar-pdf')}}" role="tab" aria-selected="false">
          <i class="fa-solid fa-file-pdf"></i> Imprimir
        </a>
        @include('consultamedica.tables.confirmada')
      </div>
      <div class="tab-pane fade" id="consultamedica-pendiente" role="tabpanel">
        <a class="ml-4 mb-4 btn btn-danger "  href="{{route('descargar-pdf-pendientes')}}" role="tab" aria-selected="false">
          <i class="fa-solid fa-file-pdf"></i> Imprimir
        </a>
        @include('consultamedica.tables.pendiente')
      </div>
      <div class="tab-pane fade" id="consultamedica-historial" role="tabpanel">
        <a class="ml-4 mb-4 btn btn-danger "  href="{{route('descargar-pdf-historial')}}" role="tab" aria-selected="false">
          <i class="fa-solid fa-file-pdf"></i> Imprimir
        </a>
        @include('consultamedica.tables.historial')
      </div>
    </div>
    
  </div>
@endsection
