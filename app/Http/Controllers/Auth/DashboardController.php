<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function fetchTriviaData(Request $request)
{
    
    $response = Http::get('https://the-trivia-api.com/api/questions?page=' . $request->query('page', 1));

   
    $triviaData = $response->json();

   
    $perPage = 6;
    $currentPage = $request->query('page', 1);
    $currentItems = array_slice($triviaData, ($currentPage - 1) * $perPage, $perPage);
    $categories = new LengthAwarePaginator($currentItems, count($triviaData), $perPage, $currentPage);
    if ($triviaData !== null) {
        $currentItems = array_slice($triviaData, ($currentPage - 1) * $perPage, $perPage);
        $categories = new LengthAwarePaginator($currentItems, count($triviaData), $perPage, $currentPage);
    } else {
        
        $categories = []; 
    }
  
    return view('categories.index', ['categories' => $categories]);
}

}
