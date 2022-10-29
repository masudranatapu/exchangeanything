<form class="form-horizontal" action="{{ route('admin.cookie.update') }}" method="POST"
    enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row justify-content-between">
        <div class="offset-1 col-md-6">
            
            <div class="form-group">
                <x-forms.label name="cookie_policy" />
                <div class="row">
                    <textarea id="cookie_ck"  class="form-control" name="cookie_body"
                        placeholder="{{ __('write_the_answer') }}">{{ $cms->cookie_body }}</textarea>
                    @error('cookie_body')
                    <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-8 offset-1 ">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-sync"></i> {{ __('update_cookie_policy') }}
            </button>
        </div>
    </div>
</form>


