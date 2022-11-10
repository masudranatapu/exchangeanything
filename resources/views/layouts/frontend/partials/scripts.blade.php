<script src="{{ asset('frontend') }}/js/plugins/jquery.min.js"></script>
<script src="{{ asset('frontend') }}/js/plugins/bootstrap.bundle.min.js"></script>
{{-- toastr notificaiton --}}
<script src="{{ asset('backend') }}/plugins/toastr/toastr.min.js"> </script>
<script src="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2.min.js"> </script>
<script src="{{ asset('frontend/') }}/js/plugins/lan.js"></script>
<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}", 'Success!')
    @elseif(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}", 'Warning!')
    @elseif(Session::has('error'))
        toastr.error("{{ Session::get('error') }}", 'Error!')
    @endif
    // toast config
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "hideMethod": "fadeOut"
    }
    $('.login_required,.signup_required').click(function(event) {

        let redirectUrl = event.target.href;

        event.preventDefault();
        swal({
            title: `Please login first!`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: "Login",
        })
        .then((confirmed) => {
            if (confirmed) {
                  window.location.href = redirectUrl;
              }
        });
    });
    $('#language_switch_button').on('click', function () {
        $('#switch_dropdown').toggle();
    });
</script>
@yield('frontend_script')
<script type="module" src="{{ asset('frontend') }}/js/plugins/app.js"></script>
{!! $settings->body_script !!}
@stack('component_script')
