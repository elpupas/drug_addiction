<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Questionnare;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionnareResource;
use App\Http\Requests\Questionare\QuestionnareRequest;

class QuestionnareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return QuestionnareResource::make(Questionnare::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionnareRequest $request)
    {
        $validatedData = $request->validated();

        $questionnare = Questionnare::create($validatedData->all());

        return response()->json([
            'message' => 'Questionnare created successfully!',
            'data' => [
                'title' => $questionnare->title,
            ]
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Questionnare $questionnare)
    {
        return QuestionnareResource::make($questionnare);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionnareRequest $request, Questionnare $questionnare)
    {
        $validatedData = $request->validated();
        $questionnare->update($validatedData->all());

        return response()->json([
            'message' => 'Questionnare updated successfully!',
            'data' => [
                'title' => $questionnare->title,
            ]
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnare $questionnare)
    {
        Questionnare::findOrFail($questionnare->id);
        $questionnare->delete();

        return response()->json([
            'message' => 'Questionnare deleted successfully.'
        ], 204);
    }
}
