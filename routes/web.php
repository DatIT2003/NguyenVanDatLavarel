<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PtController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/giaiptb1', function () {
    return view('giaiptb1.giaiptb1');
});
// Route::post('giaiptb1', function(Request $req){
//     $a = $req->hsa;
//     $b = $req->hsb;

//     $a = floatval($a);
//     $b = floatval($b);

//     if($a == 0) {
//         if($b == 0)
//             $ketqua = "Phương trình vô số nghiệm";
//         else
//             $ketqua = "Phương trình vô nghiệm";
//     } else {
//         $ketqua = "Phương trình có nghiệm x=" . (-$b / $a);
//     }
//     return view('giaiptb1.giaiptb1', compact('ketqua','a', 'b'));
// })->name('postgiaiptb1');
Route::get('/giaiptb1',[PtController::class, 'getGiaiptb1'])->name('getgiaiptb1');
Route::post('/giaiptb1',[PtController::class, 'giaiptb1'])->name('postgiaiptb1');

Route::get('/random', function () {
    return view('giaiptb1.random');
});
Route::match(['get', 'post'], 'random', function(Request $req){
    if ($req->isMethod('post')) {
        $from = $req->input('from');
        $to = $req->input('to');

        $from = floatval($from);
        $to = floatval($to);

        if($from >= $to) {
            return back()->with('error', 'Số "từ" phải nhỏ hơn số "đến".');
        }

        $result = rand($from, $to);

        return back()->with('result', "Số ngẫu nhiên từ $from đến $to: $result");
    }

    return view('giaiptb1.random');
})->name('random');
Route::get('/hi/create', [CarController::class, 'create'])->name ('cars.create');
Route::post('/hi', [CarController::class, 'store'])->name ('cars.store');
Route::get('/hi', [CarController::class, 'index'])->name('cars.index');

Route::resource('cars',CarController::class);
/* tương đương 7 route sau:
// Hiển thị danh sách xe
Route::get('cars', [CarController::class, 'index'])->name('cars.index');

// Hiển thị form để thêm xe mới
Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');

// Lưu xe mới
Route::post('cars', [CarController::class, 'store'])->name('cars.store');

// Hiển thị chi tiết xe
Route::get('cars/{id}', [CarController::class, 'show'])->name('cars.show');

// Hiển thị form chỉnh sửa xe
Route::get('cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');

// Cập nhật thông tin xe
Route::put('cars/{car}', [CarController::class, 'update'])->name('cars.update');

// Xóa xe
Route::delete('cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

I
*/
