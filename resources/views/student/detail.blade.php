@extends('layout')

@section('content')
<div class="container">
  <h1>{{ config('student.title') }}</h1>
  <hr>
      <table id="students-table" class="table table-striped table-bordered">
          <thread>
              <tr>
                  <th class="hidden-sm">No</th>
                  <th class="hidden-md">Name</th>
                  <th class="hidden-md">Age</th>
                  <th class="hidden-md">Address</th>
                  <th class="hidden-sm">Gender</th>
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
  <button class="btn btn-primary" onclick="history.go(-1)">
    « Back
  </button>
</div>
@stop
