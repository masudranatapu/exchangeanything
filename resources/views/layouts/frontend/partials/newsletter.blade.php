{{-- 
    <section class="subscribe bgcolor--g">
        <div class="container">
            <div class="subscribe__content">
                <div class="subscribe__left">
                    <h2 class="subscribe__title text--heading-2">{{ __('subscribe_to_our_newsletter') }}</h2>
                    <p class="text--body-3 subscribe__description">
                        {{ $cms->newsletter_content }}
                    </p>
                </div>
                
            </div>
        </div>
    </section>
--}}
@push('newslater_script')
<script src="{{ asset('frontend') }}/js/axios.min.js"></script>
<script>
    $(document).on('submit', '#mailForm', function(event){

        event.preventDefault();
        let email = $("#email").val();

        axios.post('{{ route('newsletter.subscribe') }}', {
            email: email
        })
        .then(res => {
            $('#mailForm')[0].reset();
            $(".error").text('');
            toastr.success(res.data);
        })
        .catch(err => {
            $(".error").text(err.response.data.errors.email[0]);
        })
    });
</script>
@endpush
