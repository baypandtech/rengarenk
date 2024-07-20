@extends('voyager::master')

@section('page_title', 'Toplu SMS Gönderimi')

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
            @endif

            <div class="panel panel-bordered">
                <div class="panel-body">
                    <form action="{{ route('bulk-sms.send') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="message">Mesaj</label>
                            <textarea name="message" class="form-control" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone_list">Manuel Telefon Numaraları (Virgülle ayırarak yazın)</label>
                            <input type="text" name="phone_list" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="selected_members">Müşterilerden Seç</label>
                            <select name="selected_members[]" class="form-control select2" multiple>
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->phone }})</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">SMS'leri Gönder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
