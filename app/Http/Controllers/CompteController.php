<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="Ges-Comptes API Documentation",
 *     version="1.0.0",
 *     description="Documentation de l'API Ges-Comptes avec Swagger"
 * )
 */
class CompteController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/comptes",
     *     operationId="getClientsList",
     *     tags={"Comptes"},
     *     summary="Lister tous les comptes",
     *     description="Retourne la liste complète des comptes",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des comptes récupérée avec succès"
     *     )
     * )
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
