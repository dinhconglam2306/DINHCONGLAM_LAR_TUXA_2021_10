@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');

    $statusValue      = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $typeMenuValue       = ['default' => 'Select value', 'link' => config('zvn.template.type_menu.link.name'), 'category_article' => config('zvn.template.type_menu.category_article.name')];
    $typeOpenValue       = ['default' => 'Select value', '_blank' => config('zvn.template.type_open._blank.name'), '_self' => config('zvn.template.type_open._self.name')];
    $inputHiddenID    = Form::hidden('id', @$item['id']);

    $elements = [
        [
            'label'   => Form::label('name', 'Name', $formLabelAttr),
            'element' => Form::text('name', @$item['name'], $formInputAttr )
        ],
        [
            'label'   => Form::label('link', 'Link', $formLabelAttr),
            'element' => Form::text('link', @$item['link'],  $formInputAttr )
        ],
        [
            'label'   => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue, @$item['status'], $formInputAttr)
        ],
        [
            'label'   => Form::label('ordering', 'Ordering', $formLabelAttr),
            'element' => Form::number('ordering',@$item['ordering'], $formInputAttr)
        ],
        [
            'label'   => Form::label('type_menu', 'Type menu', $formLabelAttr),
            'element' => Form::select('type_menu',$typeMenuValue, @$item['type_menu'],  $formInputAttr )
        ],
        [
            'label'   => Form::label('type_open', 'Type open', $formLabelAttr),
            'element' => Form::select('type_open',$typeOpenValue,  @$item['type_open'],  $formInputAttr )
        ],
        [
            'element' => $inputHiddenID  . Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
@endphp

@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false])
    @include ('admin.templates.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Form'])
                <div class="x_content">
                    {{ Form::open([
                        'method'         => 'POST', 
                        'url'            => route("$controllerName/save"),
                        'accept-charset' => 'UTF-8',
                        'enctype'        => 'multipart/form-data',
                        'class'          => 'form-horizontal form-label-left',
                        'id'             => 'main-form' ])  }}
                        {!! FormTemplate::show($elements)  !!}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
