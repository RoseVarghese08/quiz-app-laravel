<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    public function showQuiz($category)
    {
        
        $response = Http::get('https://the-trivia-api.com/api/questions');

       
        if ($response->successful()) {
           
            $questions = $response->json();

           
            $filteredQuestions = array_filter($questions, function ($question) use ($category) {
                return isset($question['options']) && $question['category'] === $category;
            });

           
            if (empty($filteredQuestions)) {
                return response()->json(['error' => 'No questions found for the selected category'], 404);
            }

            return view('quiz.show', ['category' => $category, 'questions' => $filteredQuestions]);
        } else {
           
            return response()->json(['error' => 'Failed to fetch questions'], $response->status());
        }
    }
}
