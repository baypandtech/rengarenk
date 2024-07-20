<form id="verify" action="/{!!Request::path()!!}"  method="post">
    @csrf
    <input type="hidden" name="token" value="{{ request('token') }}">
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Sayfa yüklendiğinde formu post etmek için bu işlevi kullanacağız
        function postForm() {
            var form = document.getElementById("verify"); // Form elementini al
            form.submit(); // Formu gönder
        }

        // postForm fonksiyonunu çağır, sayfa yüklendiğinde formu otomatik olarak gönder
        postForm();
    });
</script>
