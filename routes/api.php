

Route::get('/user', function (Request $request){
    return $request->user();
})->middleware('auth:sanctum')