<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <style>
       
        .category-container {
            width: calc(33.33% - 20px);
            margin: 10px; 
            padding: 20px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
            display: inline-block;
            text-align: center; 
            box-sizing: border-box;
            background-color: #007bff; 
            color: #fff; 
        }

        
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

      
        #categories {
            text-align: center;
            margin-bottom: 20px; 
        }

      
        #loadMore {
            display: block;
            margin: 0 auto;
            padding: 10px 20px; 
            background-color: #007bff;
            color: #fff; 
            border: none;
            border-radius: 5px; 
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Trivia Categories</h1>
    <div id="categories">
        @foreach ($categories as $category)
            <div class="category-container">
                <a href="{{ route('quiz.show', ['category' => $category['category']]) }}">{{ $category['category'] }}</a>
            </div>
        @endforeach
        <div class="clearfix"></div>
    </div>

    <button id="loadMore">Load More</button>

</body>
</html>
