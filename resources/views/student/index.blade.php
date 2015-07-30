@extends('layout')

@section('content')
<div class="container">
  <h1>{{ config('student.title') }}</h1>
  <h5>Page {{ $students->currentPage() }} of {{ $students->lastPage() }}</h5>
  <hr>

  @include('admin.partials.success')

  <table id="students-table" class="table table-striped table-bordered">
      <thread>
          <tr>
              <th class="hidden-md">No</th>
              <th class="hidden-md">Name</th>
              <th class="hidden-md">Age</th>
              <th class="hidden-md">Address</th>
              <th class="hidden-md">Gender</th>
              <th data-sortable="false">Actions</th>
          </tr>
      </thread>
      <tbody>
          @foreach ($students as $student)
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
              <td>
                  <a href="{{ url('/student/detail/'.$student->id) }}" class="btn btn-xs btn-info">
                      <i class="fa fa-detail"></i>Detail
                  </a>
                  @if (Auth::check())
                  <a href="{{ url('/student/edit/'.$student->id) }}" class="btn btn-xs btn-warning">
                      <i class="fa fa-edit"></i>Edit
                  </a>
                  @endif
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>

  <hr>
  {!! $students->render() !!}
</div>

@stop
