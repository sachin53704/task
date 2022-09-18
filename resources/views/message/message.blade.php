@push('script')
    <script type="text/javascript">
        $(document).ready(function(){
            @if(session()->has('success'))
                let message = "{{session()->get('success')}}";
                toastr.success(message);
            @endif

            @if(session()->has('error'))
                let message = "{{session()->get('error')}}";
                toastr.error(message);
            @endif
        });
    </script>
@endpush