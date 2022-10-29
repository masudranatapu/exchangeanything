@extends('backend.settings.setting-layout')
@section('title') {{ __('website_setting') }} @endsection

@section('custom-setting')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">{{ __('custom_css_js') }}</h3>
        </div>
        <div class="card-body">
            <div class="row p2-3 pb-4 justify-content-center">
                <div class="col-12">
                    <form action="{{ route('setting', 'custom') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <x-forms.label name="header_custom_style_before_head_end" />
                            <textarea name="header_css" id="headerCss" class="form-control @error('name') is-invalid @enderror"
                                rows="5">{{ $setting->header_css }}</textarea>
                            @error('name')<span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span>@enderror
                            <span>{{ __('write_style_with_style_tag') }} like,&nbsp;&nbsp;</span>
                            <span>
                                <code>
                                    &lt;style&gt;
                                        .header-custom-style {
                                            color: red;
                                        }
                                    &lt;/style&gt;
                                </code>
                            </span>
                        </div>
                        <div class="form-group">
                            <x-forms.label name="header_custom_script_before_head_end"/>
                            <textarea name="header_script" id="headerScript" class="form-control @error('name') is-invalid @enderror"
                                rows="5">{{ $setting->header_script }}</textarea>
                            @error('name')<span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span>@enderror
                            <span>{{ __('write_script_with_script_tag') }} like,&nbsp;&nbsp;</span>
                            <span>
                                <code>
                                    &lt;script&gt;
                                        console.log('Hello World');
                                    &lt;/script&gt;
                                </code>
                            </span>
                        </div>
                        <div class="form-group">
                            <x-forms.label name="footer_custom_script_before_body_end" />
                            <textarea name="body_script" id="bodyScript" class="form-control @error('name') is-invalid @enderror"
                                rows="5">{{ $setting->body_script }}</textarea>
                            @error('name')<span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span>@enderror
                            <span>{{ __('write_script_with_script_tag') }} like,&nbsp;&nbsp;</span>
                            <span>
                                <code>
                                    &lt;script&gt;
                                        console.log('Hello World');
                                    &lt;/script&gt;
                                </code>
                            </span>
                        </div>
                        @if (userCan('setting.update'))
                        <div class="form-group">
                            <button class="btn btn-primary">{{ __('update') }}</button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('style')
<!-- Create a simple CodeMirror instance -->
<link rel="stylesheet" href="{{ asset('backend') }}/plugins/codemirror/codemirror.css">
<link rel="stylesheet" href="{{ asset('backend') }}/plugins/codemirror/addon/foldgutter.css"">
@endsection
@section('script')
<!-- Create a simple CodeMirror instance -->
<script src="{{ asset('backend') }}/plugins/codemirror/codemirror.js"></script>
<script src="{{ asset('backend') }}/plugins/codemirror/mode/javascript/javascript.js"></script>
<script src="{{ asset('backend') }}/plugins/codemirror/mode/css/css.js"></script>
<script src="{{ asset('backend') }}/plugins/codemirror/addon/active-line.js"></script>
{{-- <script src="{{ asset('backend') }}/plugins/codemirror/addon/foldcode.js"></script>
<script src="{{ asset('backend') }}/plugins/codemirror/addon/foldgutter.js"></script> --}}
<script src="{{ asset('backend') }}/plugins/codemirror/addon/closebrackets.js"></script>
<script>
    let headerCss = document.getElementById('headerCss');
    let headerScript = document.getElementById('headerScript');
    let bodyScript = document.getElementById('bodyScript');

    var editor = CodeMirror.fromTextArea(headerCss, {
      lineNumbers: true,
      styleActiveLine: true,
      lineWrapping: true,
      autoCloseBrackets: true,
    //   foldGutter: true,
    //   extraKeys: {"Ctrl-Q": function(cm){ cm.foldCode(cm.getCursor()); }},
    //   gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
      mode: "css",
    });
    var editor = CodeMirror.fromTextArea(headerScript, {
      lineNumbers: true,
      styleActiveLine: true,
      lineWrapping: true,
      autoCloseBrackets: true,
    //   foldGutter: true,
    //   extraKeys: {"Ctrl-Q": function(cm){ cm.foldCode(cm.getCursor()); }},
    //   gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
      mode: "javascript",
    });
    var editor = CodeMirror.fromTextArea(bodyScript, {
      lineNumbers: true,
      styleActiveLine: true,
      lineWrapping: true,
      autoCloseBrackets: true,
    //   foldGutter: true,
    //   extraKeys: {"Ctrl-Q": function(cm){ cm.foldCode(cm.getCursor()); }},
    //   gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
      mode: "javascript",
    });
  </script>
@endsection
