<table>
    <thead>
        <tr>
            <th colspan="11">REPORTE SEGUIMIENTO COMERCIAL</th>
        </tr>
        <tr>
            <th >N°</th>
            <th>FECHA SOLICITUD</th>
            <th>NRO. COTIZACIÓN</th>
            <th>FECHA RESPUESTA</th>
            <th>SOLICITADO POR</th>
            <th>COMERCIAL</th>
            <th>EMPRESA</th>
            <th>CONTACTO</th>
            <th>TIPO EMBARQUE</th>
            <th>FCL/LCL</th>
            <th>OBSERVACIONES</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rows as $index => $row)
        <tr>
            <td>{{$index + 1}}</td>
            <td>{{ date('d/m/Y', strtotime($row->f_creacion)) }}</td>
            <td>{{ $row->code }}</td>
            <td>{{ date('d/m/Y', strtotime($row->f_enviado_comercial)) }}</td>
            <td>{{ $row->user_name }}</td>
            <td>{{ $row->commercial }}</td>
            <td>{{ $row->client }}</td>
            <td>{{ $row->contact }}</td>
            <td>{{ $row->via }}</td>
            <td>{{ $row->type }}</td>
            <td>{{ $row->observations }}</td>
        </tr>
    @endforeach
    </tbody>
</table>