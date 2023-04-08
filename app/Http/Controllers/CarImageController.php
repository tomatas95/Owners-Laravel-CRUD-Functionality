<?php

namespace App\Http\Controllers;

use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CarImageController extends Controller
{
    
    public function destroy($id)
{
    $carImage = CarImage::findOrFail($id);
    Storage::delete($carImage->filename);
    $carImage->delete();
    Session::flash('message', __("Your Photo has been deleted successfully!"));
    Session::flash('alert-class', 'alert-success');
    return redirect()->back();
}
}
