<!DOCTYPE html>
<html>
<head>
    <title>Laravel Category Treeview Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/treeview.css')}}">

</head>
<body>
<div class="container">
    <div class="card card-primary card-outline">
        <div class="card-header">
            Manage Category Tree
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3>Category List</h3>
                    <ul id="tree1">
                        @foreach($categories as $category)
                            <li>
                                @if(count($category->childs) > 0) > @endif{{ $category->title }}

                                @if(count($category->childs))

                                    @include('manageChild',['childs' => $category->childs])

                                @endif

                            </li>
                            {{$category->test}}
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="form">

                        <h3>Add New Category</h3>

                        <form action="{{route('add.category')}}" method="POST">
                            @csrf

                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">

                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                            <label for="parent_id" class="form-label">Category</label>
                            <select name="parent_id" id="parent_id" class="form-control" placeholder="Select Category">
                                <option selected="selected" disabled="disabled" hidden="hidden" value="">Select Category</option>
                                @foreach($allCategories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>


                            <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add New</button>
                        </div>

                        </form>
                    </div>
                    <a href="#" class="show_form_btn" onclick="showForm()">+ Add Category</a>
                    <a href="#" class="hide_form_btn mb-4" onclick="hideForm()">+ Cancel</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Categories API :- <a href="{{asset('')}}categories"> {{asset('')}}categories</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
{{-- <script src="{{asset('js/vue.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script> --}}
<script src="{{asset('js/treeview.js')}}"></script>
</body>
</html>
