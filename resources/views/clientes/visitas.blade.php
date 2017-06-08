
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cupo a fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Inicial</td>
                        <td>{{$datos[0]->cupo}}</td>
                    </tr>
                    @forelse($datos as $dato)
                    <tr>
                        <td>{{$dato->fecha}}</td>
                        <td>{{$dato->cupo_a_fecha}}</td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-sm-8">
            {!! $chart->render() !!}
        </div>
    </div>
</div>