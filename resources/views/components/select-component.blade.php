<div class="form-group row">
    <div class="col-sm-1 col-form-label text-sm-right pr-0 pl-0">
        <label for="{{$name}}">{{$label}}</label>
    </div>
    
    <div class="col-sm-11 tag-input-style" id="{{$name}}-parent">
        <div class="col-sm-11 d-inline-block p-0">
            <select id="{{$name}}" name="{{$name}}" class="select2 form-control" data-placeholder="Choose...">
                {{$options}}
            </select>
        </div>

        <div class="col-sm-11 p-0" id="{{$name}}-error-holder" style="display: none;">
            <span class="text-danger" id="{{$name}}-error-text"></span>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $("#{{ $name }}").change(() =>{
            $.ajax({
                type: "GET",
                url: "{{ route('cars.index') }}",
                data: {
                    id: $("#{{ $name }}").find(":selected").val()
                },
                success: function(result){
                    let html = ""
                    html += `
                    <div class="col-sm-1 col-form-label text-sm-right pr-0 pl-0">
                        <label for="car-model">Model</label>
                    </div>
                    <div class="col-sm-11 tag-input-style">
                        <div class="col-sm-11 d-inline-block p-0">
                        <select id="car-model" name="car_model" class="select2 form-control" data-placeholder="Choose...">
                    `;

                    result.map(model => {
                       html += `<option value="${model.id}">${model.name}</option>`;
                    }).join('')

                    html += "</select></div></div>"

                    $('#car-select').html(html); 
                },
                error: function(err) {
                    console.log(err);
                }
            
            });
        });
    </script>
@endsection