@extends('base')

@section('library-css')
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('walks.index') }}">
                <button class="btn btn-sm mt-1" style="float:left;">
                    <i class="fa-solid fa-2x fa-circle-left"></i>
                </button>
            </a>
            <h1>
                @if (isset($id))
                    Edit
                @else
                    Add
                @endif
                Walk
            </h1>
        </div>
    </div>
    <form action="{{ isset($id) ? route('walks.update', ['walk' => $id]) : route('walks.store') }}" method="POST">
        @csrf
        @if(isset($id))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-md-6">
                <label for="owners" class="form-label">Owner Name</label>
                @if($errors->has('owner'))
                    <div class="text-danger">{{ $errors->first('owner') }}</div>
                @endif
                <div class="input-group">
                    <select class="search-select col-md-6" name="owner" {{ (isset($id))?'disabled':'' }}>
                        @foreach ($listOwners as $owner)
                            <option value="{{ $owner->id }}" {{ (isset($id) && $walkData->dogOwner->owner->id == $owner->id)?'selected':'' }}>{{ $owner->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="dog" class="form-label">Dog Name</label>
                @if($errors->has('dog'))
                    <div class="text-danger">{{ $errors->first('dog') }}</div>
                @endif
                <div class="input-group">
                    <select class="search-select col-md-6" name="dog" {{ (isset($id))?'disabled':'' }}>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-6">
                <label for="datetimepickerInput" class="form-label">Start at</label>
                @if($errors->has('started_at'))
                    <div class="text-danger">{{ $errors->first('started_at') }}</div>
                @endif
                <div class="input-group log-event" id="datetimepicker" data-td-target-input="nearest"
                    data-td-target-toggle="nearest">
                    <input id="datetimepickerInput" type="text" class="form-control"
                        data-td-target="#datetimepicker" name="started_at" value="{{ (isset($id))?$walkData->started_at:'' }}" />
                    <span class="input-group-text" data-td-target="#datetimepicker" data-td-toggle="datetimepicker">
                        <i class="fas fa-calendar"></i>
                    </span>
                </div>
            </div>
            <div class="col-sm-6">
                <label for="datetimepicker1Input" class="form-label">Finish at</label>
                @if($errors->has('finished_at'))
                    <div class="text-danger">{{ $errors->first('finished_at') }}</div>
                @endif
                <div class="input-group log-event" id="datetimepicker1" data-td-target-input="nearest"
                    data-td-target-toggle="nearest">
                    <input id="datetimepicker1Input" type="text" class="form-control"
                        data-td-target="#datetimepicker1" name="finished_at" value="{{ (isset($id))?$walkData->finished_at:'' }}" />
                    <span class="input-group-text" data-td-target="#datetimepicker1" data-td-toggle="datetimepicker">
                        <i class="fas fa-calendar"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-sm btn-primary">
                    <span class="fa fa-save"></span> Save
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('library-js')
<script>
    function initDateTimePicker() {
        $('#datetimepicker').tempusDominus({
            //put your config here
        });
        $('#datetimepicker1').tempusDominus({
            //put your config here
        });
    }

    function loadDogData() {
        var id = $('select[name="owner"]').val();
        var url = '{{ url('') }}/dogs/owner/' + id;
            
        $.ajax({
            url: url,
            success: function(result) {
                console.log(result);
                var dogNameHtml = "";
                if (result.data.length > 0) {
                    for (var i = 0; i < result.data.length; i++) {
                        console.log(result.data[i]);
                        dogNameHtml += "<option value='" + result.data[i].id + "'>";
                        dogNameHtml += result.data[i].name;
                        dogNameHtml += "</option>";
                    }
                }
                $("select[name=dog]").html(dogNameHtml);
                $("select[name=dog]").select2({
                    placeholder: 'Select an option'
                });
            }
        });
    }

    $(document).ready(function() {
        $('.search-select').select2({
            placeholder: 'Select an option'
        });

        // Init DateTimePicker
        initDateTimePicker();

        // Init for the first time
        loadDogData();

        // For when owner name selected is changed
        $('select[name="owner"]').change(function() {
            loadDogData();
        });
    });
</script>
@endsection