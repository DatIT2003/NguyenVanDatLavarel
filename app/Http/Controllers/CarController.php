<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Mf;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
{
    $query = Car::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('description', 'LIKE', "%{$search}%")
              ->orWhere('model', 'LIKE', "%{$search}%")
              ->orWhereHas('mf', function($q) use ($search) {
                  $q->where('mf_name', 'LIKE', "%{$search}%");
              });
    }

    $cars = $query->get();

    return view('hi.index', compact('cars'));
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mfs = Mf::all();
        return view('hi.create', compact('mfs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
        // Method to handle the form submission
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'model' => 'required',
            'produced_on' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mf_id' => 'required|exists:mfs,id',
        ]);
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('image'), $imageName);
        $car = new Car();
        $car->description = $request->description;
        $car->model = $request->model;
        $car->produced_on = $request->produced_on;
        $car->image = $imageName; // Save the image file name
        $car->mf_id =$request->mf_id;
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Xe đã được thêm thành công.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $car=Car::find($id);
        if (!$car) {
            return redirect()->route('cars.index')->with('error', 'Car not found.');
        } // tương đương mysql: select * from cars where id
        //dd($car);
        return view('hi.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return redirect()->route('cars.index')->with('error', 'Car not found.');
        }
    
        $mfs = Mf::all(); // Fetch manufacturers if needed for the dropdown
        return view('hi.edit', compact('car', 'mfs'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'model' => 'required',
            'produced_on' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mf_id' => 'required|exists:mfs,id',
        ]);
    
        $car = Car::find($id);
        if (!$car) {
            return redirect()->route('cars.index')->with('error', 'Car not found.');
        }
    
        if ($request->hasFile('image')) {
            // Delete the old image
            $linkImage = public_path('image/') . $car->image;
            if (File::exists($linkImage)) {
                File::delete($linkImage);
            }
    
            // Save the new image
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('image'), $imageName);
            $car->image = $imageName;
        }
    
        $car->description = $request->description;
        $car->model = $request->model;
        $car->produced_on = $request->produced_on;
        $car->mf_id = $request->mf_id;
        $car->save();
    
        return redirect()->route('cars.index')->with('success', 'Chỉnh sửa xe thành công.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car=Car::find($id);
        $linkImage=public_path('image/').$car->image;
        if(File::exists($linkImage)){
            File::delete($linkImage);
        }
        $car->delete();     
        return redirect()->back()->with('message','Bạn đã xóa thành công');
    }
}
