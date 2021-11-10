@extends('products.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h1>To Do List App</h1>
               
            </div>
              

   
<form action="{{ route('products.store') }}" method="POST">
    @csrf
  
  
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Task:</strong>
                <input type="text" name="task" class="form-control" placeholder="Task">
            </div>
              <div class="form-group">
                <strong>status:</strong>
                <input type="text" name="status" class="form-control" placeholder="0 or 1">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Add</button>
        </div>
    
   
</form>

        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
   
    <table class="table table-bordered">
        <tr  class="table-active">
            <th>Task</th>
           
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            
            <del><td class="table-success"> {{ $product->task }}</td>
           
        
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a style='font-size:20px;color:#2196F3;' href="{{ route('products.show',$product->id) }}">Complete</a>
    
                    <a class=" fas fa-edit"  style='font-size:30px;color:#2196F3;' href="{{ route('products.edit',$product->id) }}"></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="fas fa-trash"  style='font-size:30px;color:red;'></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $products->links() !!}

    
</div>


      
@endsection