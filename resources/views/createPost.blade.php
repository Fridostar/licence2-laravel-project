@extends('layout')
@section('content')
<div>
    <style>
        form {
            width: max-content;
            margin: auto;
        }
        .form-group{
            margin-bottom: 10px;
            display: flex;
            gap: 5px;
            flex-direction: column;
            width: 400px;
        }

        .form-group > label {
            font-weight: 600
        }   

        input {
            border: 1px solid #b1a6a6;
            height: 35px;
            border-radius: 5px;

        }

        input:focus {
            outline: none;
            border: 3px solid rgb(199, 199, 229);
        }

        textarea:focus {
            outline: none;
            border: 3px solid rgb(199, 199, 229);
        }

        textarea {
            border: 1px solid #b1a6a6;
            border-radius: 10px;
        }
        
        input::placeholder {
            color: #897d7d;
            font-size: 12px;


        }
        textarea::placeholder {
            color: #897d7d;
            font-size: 12px;

        }

        input[type='submit'] {
            background: rgb(108, 108, 227);
            color: #fff;
            height: 35px;
        }
    </style>
    <h2 style="text-align: center;">Creer un post</h2>
    <form  method="POST" action="{{route('storePost')}}">
        @csrf
        <div class="form-group">
            <label for="name">Nom du post :</label>
            <input type="text" name="name" id="name" placeholder="Nom du post">
        </div>
        <div  class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
        </div>
        <input type="submit" value="Enregistrer">
    </form>
</div>
@endsection


