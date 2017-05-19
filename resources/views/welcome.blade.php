<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task Manager </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{URL::to('css\bootstrap.css')}}" >
        <link rel="stylesheet" href="{{URL::to('css\me.css')}}">
        <link rel="stylesheet" href="{{URL::to('css\bootstrap-datetimepicker.css') }}">

        <script type="text/javascript" src="{{URL::to('js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('js/moment.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('js/transition.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('js/collapse.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('js/bootstrap.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('js/bootstrap-datetimepicker.min.js')}}"></script>


    </head>
    <body>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="margin:10px 0">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

      <div class="container">
          <div class="row" style="margin-top: 50px">
              <div class="col-md-2">
                  <ul class="list-group">
                      <li style="list-style:none"><a  class="list-group-item active"  ><span class="glyphicon glyphicon-th-list "></span>  Groups </a></li>
                      <li style="list-style:none"><a href="/" class="list-group-item "  >  All Group</a></li>
                      @foreach($groups as $group)
                          <li style="list-style:none"><a class="list-group-item" href="{{ URL::to('group/'.$group->id ) }}">{{$group->name}} </a></li>
                      @endforeach
                  </ul>

              </div>
              <div class="col-md-10">
                  <table class="table ">
                      <th>title task</th>
                      <th>status</th>
                      <th>categories</th>
                      <th>dead line</th>
                      <th>created at</th>
                      <th>updated at</th>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                  @foreach($tasks as $task)
                      @if($task->state== 'Done')
                        <tr class="success">
                      @else
                        <tr class="danger">
                      @endif
                            <td>{{$task->title}}</td>
                            <td >{{$task->state}}</td>
                            <td>{{$task->group->name}}</td>
                            <td>{{$task->created_at}}</td>
                            <td>{{$task->deadline}}</td>
                            <td>{{$task->updated_at}}</td>
                            <td><a href="/pending/{{$task->id}}" class="btn btn-info" >pending</a></td>
                            <td><a href="/done/{{$task->id}}" class="btn btn-success" >Done</a></td>
                            <td><a href="/delete/{{$task->id}}" class="btn btn-danger" >delete</a></td>
                        </tr>

                  @endforeach
                  </table>
              </div>
              <hr>


              <div class="row">
                <div class="col-md-12">
                    <div class="main-content">
                        <div class="form-mini-container">
                            <h1>To do list</h1>
                            <form class="form-mini" method="post" action="/addtask">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-row">
                                    <input type="text" name="title" placeholder="Task here">
                                </div>
                                <div class="form-row">
                                    <label>
                                        <select name="group_id">
                                            <option value="0">Choose categories list</option>
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                    <input type="text" name="group" placeholder="if you want new group">
                                </div>

                                <div class="form-row">
                                    <div class="form-radio-buttons">
                                        <div>
                                            <label>
                                                <input type="radio" name="state" value="Done">
                                                <span>Done</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label>
                                                <input type="radio" name="state" value="pending">
                                                <span>Pending</span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12" >
                                        <div class="form-group form-group-lg ">
                                            <div class='input-group date' id='datetimepicker9'>
                                                <input type='text' name="deadline" class="form-control" placeholder="dead line here" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar">
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#datetimepicker9').datetimepicker({
                                            format: 'YY-MM-DD HH:ss:00'

                                        });
                                    });
                                </script>

                                <div class="form-row form-last-row">
                                    <button type="submit">Add</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
              </div>

          </div>
      </div>
    </body>
</html>
