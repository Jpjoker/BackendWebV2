<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')
    <style>
        body {
            background-color: #1F1F1F;
        }

        .faq-table {
            width: 100%;
            margin: 20px;
            background-color: white;
            border-collapse: collapse;
        }

        .faq-table th,
        .faq-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .faq-table th {
            background-color: #f4f4f4;
        }

        .faq-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')

        <!-- Sidebar Navigation end-->
        <div class="container-fluid pt-3">
            <!-- Loop through each question and display -->
            @if ($questions->isNotEmpty())
                <table class="faq-table">
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{ $question->question }}</td>
                                <td>{{ $question->answer }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('faq-questions.edit', $question->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('faq-questions.destroy', $question->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this question?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No questions available.</p>
            @endif
        </div>


        <!-- Page Footer-->
        @include('admin.footer')
    </div>
</body>

</html>
