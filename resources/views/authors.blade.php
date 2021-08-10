@extends('layout')
@section('content')
    @foreach($sorts as $key => $val)
        <a style="margin:10px" href=
           @if (Request::get('how') &&  Request::get('how')=='asc' ||  !Request::get('how'))
               "{{ route('author.index',['order_by' => $key, 'how' => 'desc'])  }}"
        @elseif (Request::get('how') &&  Request::get('how')=='desc')
            "{{ route('author.index',['order_by' => $key, 'how' => 'asc'])  }}"
        @endif
        >{{$val}}
        </a>
    @endforeach()
    @if(!empty($authors))
    <table class="table table-bordered">

        <tr>
            <td>id</td>
            <td>title</td>
            <td>remove</td>
            <td>change</td>
        </tr>
        @foreach($authors as $author)
            <tr>
                <td>
                    {{ $author->id }}
                </td>
                <td>
                    <a href="{{ route('author.show',['author' => $author]) }}">{{ $author->name }}</a>
                </td>
                <td>
                    <form action="{{ route('author.destroy',['author' =>$author]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">remove</button>
                    </form>
                </td>
                <td>
                    <button class="btn btn-danger"><a style="color:black"
                                                      href="{{ route('author.edit',['author' =>$author])}}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $authors->links() }}

    @endif
    <button class="btn btn-success"><a href="{{ route('author.create') }}">Add Author</a></button>

    @if(Session::has('message'))
        <p class="text-success">{{ Session::get('message') }}</p>
    @endif
@endsection
