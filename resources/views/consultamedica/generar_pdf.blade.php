
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

<h2 class="text-center">Mis Citas Médicas </h2>
<div class="table-responsive">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">Descripción</th>
          <th scope="col">Especialidad</th>
          @if ($rolUsuario == 'paciente')
            <th scope="col">Médico</th>
          @elseif ($rolUsuario == 'doctor')
            <th scope="col">Paciente</th>
          @endif
          <th scope="col">Fecha</th>
          <th scope="col">Hora</th>
          <th scope="col">Tipo</th>
       
        </tr>
      </thead>
      <tbody>
        @foreach ($consultaConfirmada as $item)
        <tr>
          <th scope="row">{{ $item->descripcion }}</th>
          <td>{{ $item->nombreEspecialidad }}</td>
          @if ($rolUsuario == 'paciente')
            <td>{{ $item->nombreMedico }}</td>
          @elseif ($rolUsuario == 'doctor')
            <td>{{ $item->nombrePaciente }}</td>
          @endif
          <td>{{ $item->fechaConsulta }}</td>
          <td>{{ \Carbon\Carbon::parse(strtotime($item->horaConsulta))->format('g:i A') }}</td>
          <td>{{ $item->tipoConsulta }}</td>
        
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
  <div class="card-body">
    {{ $consultaConfirmada->links() }}
  </div>