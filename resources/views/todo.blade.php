<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="_token" content="{!! csrf_token() !!}"/>

        <title>To-do it</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
    <div class="blog-masthead">
        <div class="container">
            <nav class="nav blog-nav">
                <a class="nav-link active" href="{{ route('index') }}">To-do it</a>
                <a class="nav-link" href="#">About</a>
            </nav>
        </div>
    </div>

    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">To-do it</h1>
            <p class="lead blog-description">Keep track of what you gotta do.</p>
        </div>
    </div>

    <div class="container app">
        <div class="row">
            <div class="col-md-12">
                <form v-on:submit.prevent>
                    <div class="form-group">
                        <input type="text" v-on:keyup.enter="addTodo" v-model="todo" class="form-control" id="addTodo" aria-describedby="addTodoHelp" placeholder="Add todo">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 blog-main">
                <ul class="list-group blog-post">
                    <li
                        class="list-group-item"
                        is="todo-item"
                        v-for="(todo, index) in todos"
                        v-bind:todo="todo"
                        v-on:remove="todos.splice(index, 1)"
                    ></li>
                </ul>
            </div>
        </div>
    </div>

    <footer class="blog-footer">
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <!-- Vue JS -->
    <script src="https://unpkg.com/vue@2.3.4"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.3.4"></script>

    <!-- App JS -->
    <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
