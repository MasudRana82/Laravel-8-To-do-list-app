@extends('products.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h1>To Do List App</h1>
               
            </div>
              

   
<form action="{{ route('products.store') }}" method="POST">
    @csrf
  
  
      



 <div class="input-group mb-3">
   <input type="text" name="task" class="form-control" placeholder="Task">
    <button class="btn btn-success" type="submit">ADD</button> 
  </div>
        
        
    
   
</form>

        </div>
    </div>
   
    @if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong> <p>{{ $message }}</p></strong> 

       </div> 
    @endif
    <div class="container">
   
    <table class="table table-bordered">
        <tr  class="table-warning">
            <th>Task</th>
           
            <th width="480px">Action</th>
        </tr>
        @foreach ($table as $show)
        <tr>
            
            <del><td class="table-danger"> {{ $show->task }}</td>
           
        
            <td>
                <form action="{{ route('products.destroy',$show->id) }}" method="POST">
   
                  
                     <a  href="{{ route('products.store',$show->id) }}" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-ok"></span> </a>

    
                    
                     <a href="{{ route('products.edit',$show->id) }}" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-pencil"></span> </a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger-lg"><span class="glyphicon glyphicon-trash "></span> Delete</button>
                    
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $table->links() !!}

    
</div>







      
@endsection