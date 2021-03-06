@extends('templates.admin.master.index') 
@section('title', 'Admin users') 
@section('content')
<!-- DualListBox -->
{!! Html::style('admin/css/bootstrap-duallistbox.min.css') !!}
<!-- Select2 -->
{!! Html::style('admin/css/select2.min.css') !!}
<!-- iCheck -->
{!! Html::style('admin/plugins/iCheck/minimal/red.css') !!}
<div class="row">
        <div class="col-md-12">
            <!-- Body -->
            <div class="nav-tabs-custom margin">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">General</a></li>
                </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            {!! Form::model($adminUser, array('files' => true, 'id' => 'editAdminUserForm', 'class' => 'panel-body form-horizontal')) !!}
                            <div class="box-body">
                                <div class="form-group">
                                    {!! Form::label('firstName', 'Nombre', array('class' => 'col-lg-2 col-sm-2 control-label')) !!}
                                    <div class="col-lg-8">
                                        {!! Form::text('firstName', $adminUser->firstName, array('class' => 'form-control')) !!}
                                        <span class="help-block help-block-error right-light">{{ $errors->first('firstName') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('lastName', 'Apellido', array('class' => 'col-lg-2 col-sm-2 control-label')) !!}
                                    <div class="col-lg-8">
                                        {!! Form::text('lastName', $adminUser->lastName, array('class' => 'form-control')) !!}
                                        <span class="help-block help-block-error right-light">{{ $errors->first('lastName') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Correo electrónico', array('class' => 'col-lg-2 col-sm-2 control-label')) !!}
                                    <div class="col-lg-8">
                                        {!! Form::text('email', $adminUser->email, array('class' => 'form-control')) !!}
                                        <span class="help-block help-block-error right-light">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('phone', 'Teléfono', array('class' => 'col-lg-2 col-sm-2 control-label')) !!}
                                    <div class="col-lg-8">
                                        {!! Form::text('phone', $adminUser->phone, array('class' => 'form-control')) !!}
                                        <span class="help-block help-block-error right-light">{{ $errors->first('phone') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('adminUserRoleIds', 'Roles', array('class' => 'col-lg-2 col-sm-2 control-label')) !!}
                                    <div class="col-lg-8 select-multiple-center">
                                        {!! Form::select('adminUserRoleIds[]', $adminUserRoles, $selectedAdminUserRoles, array('class' => 'form-control multi-select', 'multiple')) !!}
                                    </div>
                                    <span class="help-block help-block-error right-light">{{ $errors->first('adminUserRoleIds') }}</span>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('enabled', 'Habilitado' , array('class' => 'col-lg-2 col-sm-2 control-label')) !!}
                                    <div class="col-lg-8">
                                        <div class="checkbox">
                                            {!! Form::checkbox('enabled', null, $adminUser->enabled, array('class' => 'minimal-red')) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-8 col-lg-offset-2">
                                    {!! Form::submit('Guardar', array('class' => 'btn btn-primary')) !!}
                                    @if(AdminAuthHelper::hasPermission('management/admin-users/change-password'))
                                        <a href="{{ route('management/admin-users/change-password', $adminUser->id) }}" class="btn btn-primary">Cambiar contraseña</a>
                                    @endif
                                    <a href="{{ route('management/admin-users') }}" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                        </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop

@section('custom_script')

<!-- Dualist -->
{!! Html::script('admin/js/jquery.bootstrap-duallistbox.min.js') !!}
<!-- iCheck -->
{!! Html::script('admin/plugins/iCheck/icheck.min.js') !!}
<!-- Select2 -->
{!! Html::script('admin/js/select2.full.min.js') !!}

{!! $editValidator !!}
<script type="text/javascript">
    $(document).ready(function() {
        // Styles to checkbox
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        
        // Styles to select search
        $(".select-search").select2();
    });
</script>
@include('templates.admin.master.dual-list-es')
@stop