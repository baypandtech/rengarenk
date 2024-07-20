<div class="a1 mt-5">
    <div class="b2">
        <h1>Süreç Nasıl İşliyor ?</h1>
    </div>
    <div class="c3">
        @foreach ($processes->sortBy('sira') as $index => $process)
            <div class="h8"></div>
            <div class="d4">
                @if ($process->image)
                 <img src="/public/storage/{{ $process->image }}" alt="Step 1">
                @endif
                <div class="e5">{{ $index+1 }}</div>
                <h3>{{ $process->baslik }}</h3>
                <div class="f6">
                    <p>{{ $process->aciklama }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>