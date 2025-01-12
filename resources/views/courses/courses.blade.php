@extends('layout')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Courses</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">List of Courses</li>
                <li class="breadcrumb-item">
                    <a href="/courses/create" class="btn btn-info">
                        Create Course
                    </a>
                </li>
            </ol>
            <div class="card">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <table class="table">
                    <tr>
                        <td>ID</td>
                        <td>NAME</td>
                        <td>STATUS</td>
                        <td>ACTION</td>
                    </tr>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->course_name}}</td>
                            <td>{{$course->status}}</td>
                            <td>
                                <a class="btn btn-success" href="{{route ('courses.show', $course->id) }}"><i class="fa fa-search"> </i></a>
                                <a class="btn btn-warning" href="{{route ('courses.edit', $course->id) }}"><i class="fa fa-pencil"> </i></a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-times"> </i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </main>
@endsection