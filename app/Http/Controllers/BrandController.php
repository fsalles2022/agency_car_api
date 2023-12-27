<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Requests\StoreBrandRequest;
use Illuminate\Http\Exceptions\HttpResponseException;



class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Brand $brand)
    {
        // return "cheguei aqui";
        return Brand::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request, Brand $brand)
    {

        if (Brand::create($request->all())) {
            return response()->json([
                'message' => 'Marca cadastrada com sucesso!'
            ], 201);
        }
        return response()->json([
            'message' => 'Erro ao ralizar o cadastro da marca'
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show($brand)
    {
        // return Brand::findOrFail($brand);
        $brand = Brand::find($brand);
        if ($brand) {
            return $brand;
        }
        return response()->json([
            'message' => 'Marca não encontrada'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, string $brandId)
    {
        try {
            $brand = Brand::find($brandId);

            if ($brand) {
                // Receba os campos específicos que podem ser atualizados
                $brandFields = $request->only(['name', 'image']);
                $brand->update($brandFields);

                return response()->json([
                    'message' => "Marca atualizada com sucesso!",
                    'brand' => $brand, // Inclua o objeto Brand diretamente
                ], 201);
            }
        

            // Adicione o código para lidar com a situação em que $brand não é encontrado
        } catch (HttpResponseException $message) {
            // Retorna a resposta de erro personalizada em caso de falha na validação
            return $message->getResponse();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $brand)
    {
        //    return Brand::destroy($brand);
        if (Brand::destroy($brand)) {
            return response()->json([
                'message' => 'Marca excluída com sucesso'
            ], 201);
        }
        return response()->json([
            'message' => 'Não possível realizar esta exclusão, marca ou ID não encontrados!'
        ], 404);
    }
}
