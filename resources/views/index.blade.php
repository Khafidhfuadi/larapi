
@forelse ($data as $corona)
<tr>
  <th>Negara</th>
  <th>:</th>
  <th>{{$corona['name']}}</th>
</tr>
@empty
@endforelse
