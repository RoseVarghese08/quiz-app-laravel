
<h1>Quiz Questions - {{ $category }}</h1>
<div id="questions">
    @foreach ($questions as $question)
        <div>
            <h2>{{ $question['question'] }}</h2>
            <ul>
                @foreach ($question['options'] as $option)
                    <li>{{ $option }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
