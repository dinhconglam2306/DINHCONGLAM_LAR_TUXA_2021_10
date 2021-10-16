
@php
use App\Helpers\Form as FormTemplate;
use App\Helpers\Template;

$formInputAttr      = config('zvn.template.form_input');
$formLabelAttr      = config('zvn.template.form_label');


$elements = [
    [
        'label'   => Form::label('username', 'UserName', $formLabelAttr),
        'element' => Form::text('username', 'abc', $formInputAttr )
    ],
    [
        'element' => Form::submit('Save', ['class'=>'btn btn-success','name' => 'taskAdd']),
        'type'    => "btn-submit"
    ]
];
@endphp
{{-- <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
   
        <div class="x_panel">
            <h4>Gửi tin nhắn cho chúng tôi</h4>
            <span>Bạn ghi đầy đủ thông tin cá nhân và vấn đề cần tra đổi với ZendVN vào form bên dưới,
                sau khi nhận được thông tin này chúng tôi sẽ liên hệ với các bạn trong thời gian ngắn nhất
            </span>
            <div class="x_content">
                {{ Form::open([
                    'method'         => 'POST', 
                    'url'            => route("$controllerName/form"),
                    'accept-charset' => 'UTF-8',
                    'enctype'        => 'multipart/form-data',
                    'class'          => 'form-horizontal form-label-left',
                    'id'             => 'main-form' ])  }}
                    {!! FormTemplate::show($elements)  !!}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div> --}}

<h4>Gửi tin nhắn cho chúng tôi</h4>
<span>Bạn ghi đầy đủ thông tin cá nhân và vấn đề cần tra đổi với ZendVN vào form bên dưới,
    sau khi nhận được thông tin này chúng tôi sẽ liên hệ với các bạn trong thời gian ngắn nhất
</span>
<form method="POST" action="{{ route("$controllerName/send-contact") }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal form-label-left" id="contact-form">
    
    <div class="form-group">
        <label for="exampleInputEmail1">Họ và tên</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="form-group">
        <label for="message">Lời nhắn</label>
        <textarea rows="3"  type="text" class="form-control" id="message" style=" resize: none;" required></textarea>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <button type="submit" class="btn btn-primary btn-contact">Submit</button>
</form>
