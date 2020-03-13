@extends('layouts.app')

@section('content')

    <edit></edit>

@endsection

@push('scripts')
    <script>
        let value = parseInt('{{$country->id}}');
    </script>
@endpush
