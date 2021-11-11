<?php
  
namespace App\Http\Controllers;
   
use App\Models\Todo;
use Illuminate\Http\Request;
  
class ProductController extends Controller
{
   
    public function index()
    {
        $table = Todo::latest()->paginate(5);
    
        return view('products.index',compact('table'))
            ->with('id');
    }
     

    //   public function indexx()
    // {
    //     $completes = Complete::latest()->paginate(5);
    
    //     return view('products.index',compact('completes'))
    //         ->with('id');
    // }
    
    // public function create()
    // {
    //     return view('products.create');
    // }
    
  
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required',
            
             
             
        ]);
    
        Todo::create($request->all());
     
        return redirect()->route('products.index')
                        ->with('success','  Task created successfully.');
    }

    public function complete(Request $request)
    {
        $request->validate([
            'task' => 'required',             
             
        ]);
    
        complete::create($request->all());
     
        return redirect()->route('products.index')
                        ->with('success','Task created successfully.');
    }
     
    
    // public function show(Product $product)
    // {
    //     return view('products.show',compact('product'));
    // } 
     
    
    public function edit(Todo $product)
    {
        return view('products.edit',compact('product'));
    }
    
   
    public function update(Request $request, Todo $product)
    {
        $request->validate([
            'task' => 'required',
            
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Task updated successfully');
    }
    
    
    public function destroy(Todo $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Task deleted Successfully!!!');
    }
}