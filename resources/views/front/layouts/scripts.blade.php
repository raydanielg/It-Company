<script src="{{ asset('dist-front/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('dist-front/js/popper.min.js') }}"></script>
<script src="{{ asset('dist-front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist-front/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('dist-front/js/jquery-ui.js') }}"></script>
<script src="{{ asset('dist-front/js/jquery.countdown.js') }}"></script>
<script src="{{ asset('dist-front/js/bxslider.js') }}"></script>
<script src="{{ asset('dist-front/js/mixitup.js') }}"></script>
<script src="{{ asset('dist-front/js/wow.js') }}"></script>
<script src="{{ asset('dist-front/js/appear.js') }}"></script>
<script src="{{ asset('dist-front/js/select2.min.js') }}"></script>
<script src="{{ asset('dist-front/js/swiper.min.js') }}"></script>
<script src="{{ asset('dist-front/js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('dist-front/js/owl.js') }}"></script>
<script src="{{ asset('dist-front/js/script.js') }}"></script>

@if($global_setting->google_recaptcha_status == 'Show')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: 'error',
            title: '{{ $error }}'
        });
    </script>
    @endforeach
@endif
@if(Session::has('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: 'error',
            title: '{{ Session::get("error") }}'
        });
    </script>
@endif
@if(Session::has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: "{{ Session::get("success") }}"
        });
    </script>
@endif
@if(Session::has('info'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1800,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "info",
            title: "{{ Session::get("info") }}"
        });
    </script>
@endif