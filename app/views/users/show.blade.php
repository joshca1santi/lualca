  @extends('layouts.master')
  @section('section')
  <div class="row">
    <div class="page-header">
      <ol class="breadcrumb">
        <li><a href="{{URL::route('users')}}">Users</a></li>
        <li>{{{ $title or 'Default' }}}</li>
      </ol>
    </div>
    <div class="col-md-6">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h1 class="panel-title text-capitalize">{{$user->first_name.' '.$user->last_name }}</h1>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-3 col-lg-3 " align="center">
              <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle">
            </div>
            <div class=" col-md-9 col-lg-9">
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Department:</td>
                    <td>Programming</td>
                  </tr>
                  <tr>
                    <td>Hire date:</td>
                    <td>06/23/2013</td>
                  </tr>
                  <tr>
                    <td>Date of Birth</td>
                    <td>01/24/1988</td>
                  </tr>
                  <tr>
                    <tr>
                      <td>Gender</td>
                      <td>Male</td>
                    </tr>
                    <tr>
                      <td>Home Address</td>
                      <td>Metro Manila,Philippines</td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><a href="mailto:info@support.com">{{$user->email}}</a></td>
                    </tr>
                    <td>Phone Number</td>
                    <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
          </span>
        </div>
    </div>
    </div>
  </div>
  @stop

  @section('custom-js')

  {{HTML::script('js/user.js')}}

  @stop
