<!--ESTILOS TABLA ITEMS-->
<style type="text/css">
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
  color: #333;
}

table {
  text-align: center;
  border-collapse: separate;
  border-spacing: 0;
  border: 2px solid #36404E;
  width: 90%;
  margin: 20px auto;
  border-radius: .25rem;
}

thead tr:first-child {
  background: #36404E;
  color: #fff;
  border: none;
}

th:first-child,
td:first-child {
  padding: 0 5px 0 10px;
}

th {
  font-weight: 500;
}

tbody tr:hover {
  background-color: #f2f2f2;
  cursor: default;
}


tbody td {
  border-bottom: 1px solid #ddd;
  font-size:9pt;
}

</style>

<!--ESTILOS CABEZERA-->
<style type="text/css">
  .titulo{
    text-align: center;
    margin-top: 20px;
  }
</style>

<!--Titulo-->
<div class="titulo"><h3>List of Processed Sales</h3></div>
<table>
  <thead>
    <tr>
        <th>Code</th>
        <th>Customer</th>
        <th>Qty.</th>
        <th>Subt.</small></th>
        <th>Tax</small></th>
        <th>Total</th>
        <th>Disc. %</th>
        <th>To Pay ({{$sistema->moneda}})</th>
        <th>Date</th>
    </tr>                            
  </thead>
  <tbody>
        @foreach($datos as $d)

           <?php

                  $total_sin_impuestos = 0;
                  $total_impuesto      = 0;

                  $datos_detalles =\DB::table('detalleprocesos')->where('proceso_id', $d->id)->get();

                  foreach ($datos_detalles as $key => $dt) {

                      //capturar tributo
                      $tributo =\DB::table('tributos')->where('id', $dt->tributo_id)->first();

                      
                      //total sin impuestos Suma de precios publico po cantidad
                      $total_sin_impuestos += $dt->cantidad * $dt->costo_publico_vendido;

                      //Suma de los valores de los impuestos
                      $calculo =  $dt->cantidad * $dt->costo_publico_vendido;

                      $total_impuesto += $calculo * ($tributo->monto/100);

                      /*if($key == 0){
                        dd($total_impuesto);
                      }*/

                  }

            ?>
        <tr>
            <td><b>{{ $d->codigo_proceso }}</b></td>
            <td><b>{{ \App\Http\Controllers\GeneralController::getClientName($d->cliente->cedula) }}</b></td>
            <td>{{ $d->items_totales }}</td>
            <td>{{ number_format($total_sin_impuestos,2) }}</td>
            <td>{{ number_format($total_impuesto,2) }}</td>
            <td>{{ number_format($d->subtotal,2) }}</td>
            <td>{{ $d->descuento }}</td>
            <td>{{ number_format($d->total,2) }}</td>
            <td>{{ date('Y-m-d', strtotime($d->created_at)) }}</td>
        </tr>
        @endforeach
  </tbody>
</table>