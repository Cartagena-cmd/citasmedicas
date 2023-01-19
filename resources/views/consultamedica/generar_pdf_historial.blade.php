<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<h2 class="text-center">Mi Historial de citas médicas </h2>
<div class="table-responsive">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">Especialidad</th>
          <th scope="col">Fecha</th>
          <th scope="col">Hora</th>
          <th scope="col">Estado</th>
      
        </tr>
      </thead>
      <tbody>
        @foreach ($consultaHistorial as $item)
          <tr>
            <th scope="row">{{ $item->nombreEspecialidad }}</td>
            <td>{{ $item->fechaConsulta }}</td>
            <td>{{ \Carbon\Carbon::parse(strtotime($item->horaConsulta))->format('g:i A') }}</td>
            <td>{{ $item->estado }}</td>
            {{-- <td><a href="{{ url('/consultamedica/verConsulta/'.$item->id) }}" class="btn btn-primary btn-sm">Ver</a></td> --}}
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
  <div class="card-body">
    {{ $consultaHistorial->links() }}
  </div>