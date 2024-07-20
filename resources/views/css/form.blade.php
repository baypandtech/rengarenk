@if (setting('css.form') && !empty(setting('css.form')))
<style>
    {!! setting('css.form') !!}
</style>
@else
<style>
.btn-back {
    background-color: {{ setting('css.ana_renk') }};
    border: none;
    color: white;
    margin-bottom: 10px;

}

.alert-container {
    margin: 20px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    }

.alert {
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 30px 20px;
    width: 100%;
    max-width: 600px;
    font-family: 'Arial', sans-serif;
    position: relative;
    background-color: #fff;
}

.alert-icon {
    background-color: #fff;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 80px;
    height: 80px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.alert-icon i {
    font-size: 3em;
}

.alert-message {
    text-align: center;
}

.alert-success {
    border-top: 6px solid {{ setting('css.ana_renk') }};
}

.alert-success .alert-icon {
    border: 4px solid {{ setting('css.ana_renk') }};
    color: {{ setting('css.ana_renk') }};
}

.alert-danger {
    border-top: 6px solid #dc3545;
}

.alert-danger .alert-icon {
    border: 4px solid #dc3545;
    color: #dc3545;
}

.alert ul {
    list-style-type: none;
    padding-left: 0;
    margin: 0;
}

.animate__fadeInDown {
    animation: fadeInDown 1s;
}

.animate__shakeX {
    animation: shakeX 0.5s;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translate3d(0, -100%, 0);
    }
    to {
        opacity: 1;
        transform: none;
    }
}

@keyframes shakeX {
    from, to {
        transform: translate3d(0, 0, 0);
    }
    10%, 30%, 50%, 70%, 90% {
        transform: translate3d(-10px, 0, 0);
    }
    20%, 40%, 60%, 80% {
        transform: translate3d(10px, 0, 0);
    }
}
/* Checkbox normal görünümü */
.custom-checkbox .custom-control-input:checked~.custom-control-label::after {
    background-color: {{ setting('css.ana_renk') }} !important;
    border-color: {{ setting('css.ana_renk') }} !important;
}
.custom-radio .custom-control-input:checked~.custom-control-label::after {
    background-color: {{ setting('css.ana_renk') }} !important;
    border-color: {{ setting('css.ana_renk') }} !important;
}
.form-div {
    max-width: 600px;
    margin: 0 auto;
    padding-top: 50px;
    text-align: center;
    position: relative;
    flex: 1;
}

.form-section {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0, 0, 0, .125);
    margin-bottom: 20px;
    position: relative;
    z-index: 1;
}

.form-section h2 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
}

.form-section .question {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
}

.form-section .form-check-label {
    font-size: 16px;
    font-weight: 600;
    padding-left: 10px;
}

.info-box {
    background-color: #f0f0f0;
    padding: 10px;
    border-radius: 5px;
    margin-top: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: solid 1px #ccc;
}

.info-box img {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    margin-right: 10px;
}

.info-box span {
    font-size: 14px;
}

.gigbi-card {
    border-radius: 5px;
    border: solid 1px var(--gigbi-color-grey);
    background-color: var(--gigbi-color-white);
}

.text-left {
    text-align: left !important;
}

.rounded-lg {
    border-radius: .3rem !important;
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
}

.form-check:last-child {
    border-bottom: none;
}

.form-check-input {
    margin-left: -5px;
}

.close {
    font-size: 20px;
}

.header-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    position: absolute;
    top: -26px;
    left: 50%;
    transform: translateX(-50%);
}

.header {
    position: relative;
    text-align: center;
    padding-top: 50px;
    margin-bottom: 20px;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
}

.absolute-top-left {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100%;
    background-color: #fff;
    z-index: -1;
}

.progress {
    display: -ms-flexbox;
    display: flex;
    height: 1rem;
    overflow: hidden;
    font-size: .75rem;
    background-color: #e9ecef;
    border-radius: .25rem;
}

.progress-bar {
    background-color: {{ setting('css.ana_renk') }};
}

.header-divider {
    width: 80%;
    height: 1px;
    background-color: #e0e0e0;
    margin: 0 auto 20px;
    position: relative;
    top: 40px;
}

.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

.w-100 {
    width: 100% !important;
}

.footer {
    margin-top: 20px;
}

.btn-continue {
    background-color: {{ setting('css.ana_renk') }};
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    width: 100%;
}

.btn-continue:hover {
    background-color: {{ setting('css.ucuncu_renk') }};
    color: {{ setting('css.color') }};
}

.btn-continue.inactive {
    background-color: #cccccc;
    cursor: not-allowed;
}

.btn-change {
    background-color: {{ setting('css.ana_renk') }};
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
}

.area-size {
    font-size: 36px;
    font-weight: bold;
    margin: 0 20px;
}

.datepicker-container {
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.hidden-section {
    display: none;
}

.date-info {
    font-size: 14px;
    color: #777;
}

.divider {
    border-top: 1px solid #e0e0e0;
    margin: 10px 0;
}

@media (max-width: 768px) {
    .absolute-top-left {
    left: 47%;
    }
}

</style>
@endif