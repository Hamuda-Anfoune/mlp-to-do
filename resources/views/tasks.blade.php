
@extends('layout.main');


@section('content')
{{-- Logo --}}
{{-- Using 'style' as Bootstrap V 3.4.1 does not supprt pt-* and pb-* classess --}}
<div style="padding-top: 15px; padding-bottom: 50px;">
    <img src="{{ asset('assets\images\logo.png') }}" alt="MLP logo">
</div>
{{-- End: Logo --}}

<div class="row">
    <div class="col-sm-12 col-md-4">
        <div>
            <form action="{{route('task.create')}}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="" placeholder="insert task name" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Add</button>
            </form>
        </div>
    </div>
    <div class="col-sm-12 col-md-8">
        <div class="table-container">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th class="col-sm-1">#</th>
                        <th class="col-sm-9">Task</th>
                        <th class="col-sm-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="">{{$task->id}}</td>
                            <td>
                                @if($task->done == true)
                                    <strike>{{$task->name}}</strike>
                                @else
                                    {{$task->name}}
                                @endif
                            </td>
                            <td>
                                @if($task->done == false)
                                    <div class="row">
                                        {{-- Mark as done button --}}
                                        <div class="col-sm-6 p-x-small">
                                            <form action="{{route('task.update', $task)}}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="done" value="1" required>
                                                <button type="submit" class="btn btn-success pull-right">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                </button>
                                            </form>
                                        </div>

                                        {{-- Delete button --}}
                                        <div class="col-sm-6 p-x-small">
                                            <form action="{{route('task.delete', $task)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
