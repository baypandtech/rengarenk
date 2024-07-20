<div class="container faq-section" id="sorular">
    <h2>Sık Sorulan Sorular</h2>
    <p>Kafanızda soru işareti kalmasın uygun fiyata kaliteli boya badana hizmeti alın. Diğer sorularınız için bize whatsapp veya mailden ulaşabilirsiniz.</p>
    <div id="accordion" class="accordion">
        <div class="row">
            @php
            $half = ceil($questions->count() / 2);
            @endphp

            <div class="col-md-6">
                @foreach ($questions->sortBy('sira')->slice(0, $half) as $question)
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $question->id }}"
                                    aria-expanded="false" aria-controls="collapse{{ $question->id }}">
                                    {{ $question->soru }}
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                            </h5>
                        </div>

                        <div id="collapse{{ $question->id }}" class="collapse" aria-labelledby="heading{{ $question->id }}" data-parent="#accordion">
                            <div class="card-body">
                                {{ $question->aciklama }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6">

            @foreach ($questions->sortBy('sira')->slice($half) as $question)
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $question->id }}"
                                aria-expanded="false" aria-controls="collapse{{ $question->id }}">
                                {{ $question->soru }}
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </h5>
                    </div>

                    <div id="collapse{{ $question->id }}" class="collapse" aria-labelledby="heading{{ $question->id }}" data-parent="#accordion">
                        <div class="card-body">
                            {{ $question->aciklama }}
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"
                                aria-expanded="false" aria-controls="collapseFive">
                                Herhangi bir ek ücret ödeyecek miyim?
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                        <div class="card-body">
                            Hayır, ek ücret ödemenize gerek yoktur.
                        </div>
                    </div>
                </div> --}}
                
            </div>
        </div>
    </div>
    {{-- <a href="#" class="btn-view-all">Tüm Sıkça Sorulan Sorular</a> --}}
</div>