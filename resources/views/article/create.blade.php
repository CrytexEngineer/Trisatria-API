@extends('app')

@section('content')

<div class="card">
<div class="card-body ">

    <form action="/artikel" method="post">
        @csrf
        <label for="fname">Title:</label><br>
        <input type="text" id="fname" name="fname" ><br>
        <label for="lname">Body:</label><br>
        <input type="text" id="lname" name="lname"><br><br>
        <input type="submit" value="Submit">
    </form>
</div>
</div>
@endsection
