<div class="cntnr" id="renkdanisma">
    <div class="col-12">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
             <p class="text-center"> {{session('success')}}</p>
          </div>
        @endif
    </div>
    <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger mt-3" id="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <br>
    <h1>Renk Danışma</h1>
    <div class="frm-cntnr">
        <div class="frm-sc">
            <form action="{{ route('form.danisma') }}" method="POST" onsubmit="return disableSubmitButton(this)" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name" class="frm-lbl">Ad</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Adınız" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="surname" class="frm-lbl">Soyad</label>
                        <input name="surname" type="text" class="form-control" id="surname" placeholder="Soyadınız" required>
                    </div>
                </div>
                <div class="frm-gp">
                    <label for="gsm" class="frm-lbl">GSM</label>
                    <input name="gsm" type="text" class="form-control" id="gsm" placeholder="GSM">
                </div>
                <div class="frm-gp">
                    <label for="email" class="frm-lbl">E-posta Adresi</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="E-posta Adresiniz" required>
                </div>
                <div class="frm-gp">
                    <label for="description" class="frm-lbl">Talep Açıklaması</label>
                    <textarea name="description" class="form-control" id="description" rows="3" placeholder="Renk danışmanlığı almak istediğiniz konu hakkında kısa açıklamanız"></textarea>
                </div>
                <div class="frm-gp">
                    <label for="file" class="frm-lbl">Fotoğraf Yükleme</label>
                    <input name="file" type="file" class="form-control-file" id="file" accept="image/*">
                    <small class="form-text text-muted">Danışmak istediğiniz alanın genel görünüşünü içeren bir fotoğraf.</small>
                </div>
                <button type="submit" class="btn btn-dark">Gönder</button>
            </form>
        </div>
        <div class="txt-sc">
            <p>{!! $consultation->aciklama !!}</p>
        </div>
    </div>
</div>

<script>
    function disableSubmitButton(form) {
        const submitButton = form.querySelector('button[type="submit"]');
        if (submitButton.disabled) {
            return false;
        }
        submitButton.disabled = true;
        submitButton.innerText = 'Gönderiliyor...';
        return true;
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if(window.location.hash) {
            var element = document.querySelector(window.location.hash);
            if(element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
</script>