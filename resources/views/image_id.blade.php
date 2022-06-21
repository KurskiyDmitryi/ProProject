@extends('layout.app')
@section('content')
    <form method="post" enctype="multipart/form-data" id="js_upload">
        @csrf
        <div class="form-group">
            <input type="file" name="file">

            <input type="hidden" class="hidden" name="id" value="{{$image->id}}">
        </div>
        <button type="submit" class="btn btn-primary">Upload file</button>
    </form>
    <div id="train">

    </div>
@endsection
@push('js')
    <script type="text/javascript">
            $(document).ready(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#js_upload').submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    var id = $('.hidden').val()
                    $.ajax({
                        type:'POST',
                        url: "{{ route('store_image')}}",
                        data: formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: (response) => {
                            this.reset();
                            $("#train").html('');
                            $("#train").append(response);
                            alert('alles gut')

                        },
                        error: function(data){
                            console.log(data);
                        }
                    });
                });
            });
    </script>
@endpush
