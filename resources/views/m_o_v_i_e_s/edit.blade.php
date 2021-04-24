@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('mOVIES.index') !!}">M O V I E S</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit M O V I E S</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($mOVIES, ['route' => ['mOVIES.update', $mOVIES->id], 'method' => 'patch']) !!}

                              @include('m_o_v_i_e_s.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection