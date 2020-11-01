@extends('app')


@section('content')
{{--    @foreach($articles as $article)--}}
{{--        <h1>{{$article['title']}}</h1>--}}
{{--        <p>{{$article['body']}}</p>--}}

{{--    @endforeach--}}

    <table id="table_id" class="display" width="100%">
        <thead>
        <tr>
            <th>Title</th>
            <th>Body</th>
        </tr>
        </thead>
    </table>

@push('script')
    <script>
        $(function() {
        $('#table_id').DataTable({
        dom: 'Blfrtip',
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollX": true,
        processing: true,
        serverSide: false,
        ajax: '/artikel/json',
        columns: [
        { data: 'title', name: 'title' },
        { data: 'body', name: 'body' },
        ]
        });
        });

    </script>
@endpush

@endsection


