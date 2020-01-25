<table id="zero_config" class="table table-striped table-hover table-bordered">
  <thead class="thead-dark">

    <tr>
      <th>SL</th>
      <th>title</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>acton</th>
    </tr>

  </thead>
  <tbody >
    @foreach ($products as $product)
    <tr>
      <td >{{$sl++}}</td>
      <td >{{$product->title}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->quantity}}</td>
      <td>
        <a href="{{ route('admin.product.view') }}" data-id="{{$product->id}}" id="view" class="btn btn-sm btn-success"> View </a>
        <a href="{{ route('admin.product.edit') }}" data-id="{{$product->id}}" id="edit" class="btn btn-sm btn-info"> Edit </a>
        <a href="{{ route('admin.product.delete') }}" data-id="{{$product->id}}" id="delete" class="btn btn-sm btn-danger"> Delete </a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
  <tfoot >
    <tr>
      <th>SL</th>
      <th>title</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>acton</th>
    </tr>
  </tfoot>
</table>
<script class="">
    /****************************************
     *       Data Table                   *
     ****************************************/
     // $('#zero_config').DataTable();

     $(document).ready(function() {
      $('#zero_config').DataTable( {
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
      } );
    });
</script>