@extends('layouts.admin')
@section('page-title', 'Color Range Map')
@section('content')
    <form action="{{ route('home.color-range.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <h5 class="card-header">Upload Excel File</h5>
            <div class="card-body">
                <h5 class="card-title">Please Select and Upload Excel File Like Template ...</h5>
                <div class="input-group">
                    <div class="custom-file mr-2">
                        <input type="file" class="custom-file-input" id="uploadExcel" name="uploadExcel" required>
                        <label class="custom-file-label" for="uploadExcel" id="uploadExcelLable">Choose File...</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i> Upload</button>
                </div>
                <p class="card-text mt-3">
                    Color Range: #FFFFFF - #4A0000 <br>
                    Excel Example: <a href="/files/excel_template.xlsx">(Download)</a>
                </p>
            </div>
        </div>
    </form>
@endsection
@section('footer')
    <script>
        $('#uploadExcel').change(function() {
            var fileAddress = $('#uploadExcel').val();
            $('#uploadExcelLable').text(fileAddress);
        });

    </script>
@endsection
