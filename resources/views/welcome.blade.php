@extends('layouts.app')
@section('content')
    <livewire:user/>
@endsection
@section('footer_scripts')
    <script type="text/javascript">
        window.livewire.on('userStore', () => {
            $('#createModal').modal('hide');
        });
    </script>
@endsection
