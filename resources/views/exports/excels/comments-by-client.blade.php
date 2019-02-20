<table>
    <thead>
        <tr style="height: 100px;">
            <th colspan="6">REPORTE SEGUIMIENTO CLIENTE</th>
        </tr>
        <tr>
            <th >FECHA DE REGISTRO</th>
            <th>TIPO CLIENTE</th>
            <th>CLIENTE</th>
            <th>COMERCIAL</th>
            <th>FECHA DE LLAMADA</th>
            <th>FECHA DE REUNION</th>
        </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <td>{{ $comment->created_at }}</td>
            <td>{{ $comment->type_client }}</td>
            <td>{{ $comment->client }}</td>
            <td>{{ $comment->commercial }}</td>
            <td>{{ $comment->type_register === 'call' ? $comment->date : '' }}</td>
            <td>{{ $comment->type_register === 'cite' ? $comment->date : '' }}</td>
        </tr>
    @endforeach
    <tr>
        <th><img src="{{URL::asset('images/logo.png')}}"></th>
    </tr>
    </tbody>
</table>