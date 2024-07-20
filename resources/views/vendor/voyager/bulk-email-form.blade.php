@extends('voyager::master')

@section('page_title', 'Toplu Mail Gönderimi')

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="panel panel-bordered">
                <div class="panel-body">
                    <form action="{{ route('bulk-email.send') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="subject">Konu</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Mesaj</label>
                            <textarea name="message" class="form-control" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="email_list">Manuel E-posta Adresleri (Virgülle ayırarak yazın)</label>
                            <input type="text" name="email_list" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="selected_members">Müşterilerden Seç</label>
                            <select name="selected_members[]" class="form-control select2" multiple>
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">E-postaları Gönder</button>
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
