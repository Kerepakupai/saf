@if($customer->status == 0)
    <td> Sin Gestión </td>
@elseif($customer->status == 1)
    <td> Potencial </td>
@elseif($customer->status == 2)
    <td> Muestra Entregada </td>
@elseif($customer->status == 3)
    <td> Activo </td>
@elseif($customer->status == 4)
    <td> Rechazado </td>
@elseif($customer->status == 5)
    <td> Baja </td>
@else()
    <td> STATUS ERROR </td>
@endif