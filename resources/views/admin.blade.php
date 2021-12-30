<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <h1>Hello</h1>
    <div class="container">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{session('success')}}
      </div>
        @endif
        <a href="{{url('content/create')}}" class="btn btn-success">Add </a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">picture</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Icons</th>
                    <th scope="col">Handle</th>
                    <th scope="col">See</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $da)
                <tr>
                    <th scope="row">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</th>
                    <td>
                        @if($da->picture)
                        <img src="{{asset('picture/'.$da->picture)}}" alt="" style="width: 200px;height:200px">
                        <!-- {{$da->picture}}</td> -->
                        @endif
                    <td>{{$da->title}}</td>
                    <td><a href="{{url('content/'.$da->id.'/edit')}}" class="btn btn-primary">Update</a></td>
                    <td>
                        @if($da->icon)
                        <!-- {{$da->icon}} -->
                        @foreach($da->icon as $i)
                        <p>{{$i->icon_image}}</p>
                        @endforeach
                        @endif
                    </td>
                    <td>
                        <form action="{{'content/'.$da->id}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                    <td><a href="{{url('content/'.$da->id)}}" class="btn btn-success">See</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        {{$data->links()}}
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>