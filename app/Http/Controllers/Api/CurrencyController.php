<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    // Listar todas las divisas
    public function index()
    {
        return response()->json(Currency::all());
    }

    // Mostrar una divisa por su código (USD, PEN, etc)
    public function show($code)
    {
        $currency = Currency::where('code', strtoupper($code))->first();

        if (!$currency) {
            return response()->json(['message' => 'Divisa no encontrada'], 404);
        }

        return response()->json($currency);
    }

    // Crear una divisa
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|size:3|unique:currencies,code',
            'symbol' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'symbol_native' => 'required|string|max:10',
            'decimal_digits' => 'required|integer|min:0',
            'rounding' => 'required|numeric|min:0',
            'name_plural' => 'required|string|max:255',
        ]);

        $currency = Currency::create($data);

        return response()->json($currency, 201);
    }

    // Actualizar una divisa
    public function update(Request $request, $id)
    {
        $currency = Currency::findOrFail($id);

        $data = $request->validate([
            'symbol' => 'string|max:10',
            'name' => 'string|max:255',
            'symbol_native' => 'string|max:10',
            'decimal_digits' => 'integer|min:0',
            'rounding' => 'numeric|min:0',
            'name_plural' => 'string|max:255',
        ]);

        $currency->update($data);

        return response()->json($currency);
    }

    // Eliminar una divisa
    public function destroy($id)
    {
        $currency = Currency::findOrFail($id);
        $currency->delete();

        return response()->json(['message' => 'Divisa eliminada correctamente']);
    }
}
