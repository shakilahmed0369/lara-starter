@php($package='env-editor')
@php($translatePrefix='env-editor::env-editor.')

{{-- @extends(config("$package.layout")) --}}
@extends('backend.layouts.master')
@push('documentTitle')
    <i class="fa fa-cog" aria-hidden="true"></i>
{{trans('env-editor::env-editor.menuTitle')}}
@endpush   

@section('content')
<div class="header bg-primary pb-6"></div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
        <div class="card">
            <div class="card-header border-2">
                <h3>Env Editor</h3>
            </div>
            <div class="card-body">
    <div id="env-editor">
        <div id="env-alerts"></div>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#current-env" role="tab">{{__($translatePrefix.'views.tabTitles.currentEnv')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#backup-env" role="tab">{{__($translatePrefix.'views.tabTitles.backup')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#upload-env" role="tab">{{__($translatePrefix.'views.tabTitles.upload')}}</a>
            </li>
            <li class="nav-item ml-auto">
                <env-editor-config-actions></env-editor-config-actions>
            </li>
        </ul>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active p-3" id="current-env" role="tabpanel" aria-labelledby="nav-home-tab">
                <env-main-tab></env-main-tab>
            </div>
            <div class="tab-pane fade p-3" id="backup-env" role="tabpanel" aria-labelledby="nav-profile-tab">
                <env-editor-backups></env-editor-backups>
            </div>
            <div class="tab-pane fade p-3" id="upload-env" role="tabpanel" aria-labelledby="nav-contact-tab">
                <env-file-upload></env-file-upload>
            </div>
        </div>

        <env-keys-modal ref="keysModal"></env-keys-modal>
    </div>
</div>
</div>
</div>
</div>
</div>


@stop
@include('env-editor::components._itemModal')
@include('vendor.geo-sv.env-editor.components._currentEnv')
@include('env-editor::components._upload')
@include('env-editor::components._backup')
@include('env-editor::components._configActions')
@push('scripts')
    <script>
        window.envEventBus = new Vue();
        const envAlert = ($type, $text) => {
            let alert =
                '<div id="__id__" class="alert alert-__type__ alert-dismissible fade show" role="alert">' +
                '  <div>__text__</div>' +
                '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '    <span aria-hidden="true">&times;</span>' +
                '  </button>' +
                '</div>';
            let $id = 'env-alert_' + Date.now();
            let $html = alert.replace('__type__', $type).replace('__text__', $text).replace('__id__', $id);
            $('#env-alerts').append($html);
            setTimeout(() => {
                $('#' + $id).alert('close')
            }, 3000)

        };

        const dotEnv = new Vue({
            el: '#env-editor',
            components: {
                'env-main-tab': itemsWrapper,
                'env-keys-modal': itemsModal,
                'env-file-upload': fileUpload,
                'env-editor-backups': backUps,
                'env-editor-config-actions': configActions
            }
        })
    </script>
 
@endpush

@section('extraJs')
    <span class="javascripts">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>
        @stack('scripts')

    </span>
@endsection
