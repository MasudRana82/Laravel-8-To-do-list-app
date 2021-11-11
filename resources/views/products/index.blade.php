@extends('products.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h1>To Do List App</h1>
               
            </div>
              



        </div>
    </div>
   
   <!--  @if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong> <p>{{ $message }}</p></strong> 
       </div> 
    @endif -->

   
<form action="{{ route('products.store') }}" method="POST">
    @csrf
  
 
 <div class="container">

   <input type="text" name="task" class="form-control" placeholder="Add your Task here!!">
   <table  class="table table-bordered">
       <td>
           <button class="btn btn-success" type="submit"  >Add</button>      
       </td>
   </table>
  </div>
    
   <hr>
   <hr>     
    
   
</form>

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
   
                  <!-- 
                     <a  href="{{ route('products.store',$show->id) }}" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-ok">view</span> </a> -->

    
                    
                     <a href="{{ route('products.edit',$show->id) }}" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-pencil"></span> Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger-lg"><span class="glyphicon glyphicon-trash "></span> Complete</button>
                    
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $table->links() !!}

    
</div>







      
@endsection