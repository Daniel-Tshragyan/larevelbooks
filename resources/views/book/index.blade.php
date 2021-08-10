@extends('layouts.layout')
@section('content')
    @foreach($sorts as $key => $val)
        <a style="margin:10px" href=
           @if (Request::get('how') &&  Request::get('how')=='asc' ||  !Request::get('how'))
               "{{ route('book.index',['order_by' => $key, 'how' => 'desc'])  }}"
        @elseif (Request::get('how') &&  Request::get('how')=='desc')
            "{{ route('book.index',['order_by' => $key, 'how' => 'asc'])  }}"
        @endif
        >{{$val}}
        </a>
    @endforeach()
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>title</td>
            <td>remove</td>
            <td>change</td>
        </tr>
        @if(!empty($books))
        @foreach($books as $book)
            <tr>
                <td>
                    {{ $book->id }}
                </td>
                <td>
                    <a href="{{ route('book.show',['book' => $book]) }}">{{ $book->title }}</a>
                </td>
                <td>
                    <form action="{{ route('book.destroy',['book' =>$book]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">remove</button>
                    </form>
                </td>
                <td>
                    <button class="btn btn-danger"><a style="color:black"
                                                      href="{{ route('book.edit',['book' =>$book])}}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $books->links() }}
@endif
    <button class="btn btn-success"><a href="{{ route('book.create') }}">Add Book</a></button>
    @if(Session::has('message'))
        <p class="text-success">{{ Session::get('message') }}</p>
    @endif
@endsection
