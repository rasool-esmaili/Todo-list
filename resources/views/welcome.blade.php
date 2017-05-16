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
        <link rel="stylesheet" href="css\app.css">
        <link rel="stylesheet" href="css\me.css">

    </head>
    <body>
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <table class="table table-striped">
                      <th>title task</th>
                      <th>status</th>
                      <th>categores</th>
                      <th>created at</th>
                      <th>updated at</th>
                  @foreach($tasks as $task)

                    <tr>
                        <td>{{$task->title}}</td>
                        <td>{{$task->state}}</td>
                        <td>{{$task->cat}}</td>
                        <td>{{$task->created_at}}</td>
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
                                        <select name="cat">
                                            <option>Choose categories list</option>
                                            <option>Category One</option>
                                            <option>Category Two</option>

                                        </select>
                                    </label>
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
