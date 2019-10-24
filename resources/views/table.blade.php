<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
   


    <div class="container">
        @if(Session::has('successMessage'))
                <p id="alert_message" class="alert alert-success">{{Session::get('successMessage')}}</p>
          @endif
          @if(Session::has('failMessage'))
              <p id="alert_message" class="alert alert-danger">{{Session::get('failMessage')}}</p>
          @endif
        <h2>Table List</h2>
        <div>
          <form action="{{route('show')}}" method="get">
          <select name="name" id="name" class="form-control">
            @foreach ($tables as $table)
            <option value="{{$table}}">{{$table}}</option>  
            @endforeach
            
          </select>
          <button type="submit" class="btn btn-sm btn-success">show</button>
        </form>
        </div>
        @isset($columns)
            
        <form action="{{route('add')}}" method="post">
          @csrf
          <button type="submit" class="btn btn-sm btn-success pull-right">add</button>
        <table class="table table-striped">
          <input type="hidden" name="tb_name" value="{{$name}}">
          <thead>
            <tr>
              @foreach ($columns as $c)
                  <th>
                    {{$c}}
                    <br>
                    <input type="text" name="{{$c}}" required>
                  </th>
              @endforeach
            </tr>
          </thead>
          <tbody>
              
             @foreach ($table_data as $td)
                <tr>
                    @foreach ( $columns as $c)
                    
                        <td>{{$td->$c}}</td>
                        
                    @endforeach
                </tr>
             @endforeach
           
            
          </tbody>
        </table>
      </form>
        @endisset
      </div>

      <!-- Modal -->
  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
      
      //flash msg
      $("#alert_message").fadeTo(1000, 500).slideUp(500, function(){
        $("#alert_message").alert('close');
    });
</script>
  </body>
</html>