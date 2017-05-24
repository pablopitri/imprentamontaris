<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;

class ProductosController extends Controller
{
	public function find($id){
		$producto = Producto::where('codigo', $id)->first();
		return response()->json($producto);
	}
}
