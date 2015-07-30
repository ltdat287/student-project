@extends('layout')

@section('content')
<div class="container">
  <h1>Edit Confirm</h1>
  <hr>
      <table id="students-table" class="table table-striped table-bordered">
          <thread>
              <tr>
                  <th class="hidden-md">No</th>
                  <th class="hidden-md">Name</th>
                  <th class="hidden-md">Age</th>
                  <th class="hidden-md">Address</th>
                  <th class="hidden-md">Gender</th>
              </tr>
          </thread>
          <tbody>
              <tr>
                  <td>{{ $student->id }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->age }}</td>
                  <td>{{ $student->address }}</td>
                  <td>
                      @if ($student->gender == 0)
                          Female
                      @else
                          Male
                      @endif
                  </td>
              </tr>
          </tbody>
      </table>
  <hr>
  <div class="row">
    <button class="btn btn-primary" onclick="history.go(-1)">
      « Back
    </button>
    <form method="POST" action="{{ url('/student/edit/'.$student->id) }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="_method" value="PUT">
      <button type="submit" class="btn btn-danger">
        <i class="fa fa-times-circle"></i> Update
      </button>
    </form>
  </div>
</div>
@stop
