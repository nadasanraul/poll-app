<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
        <div id="app">
            <div class="container mt-4">
                <h1>OS Vote</h1>
    
                <form method='POST' action='/'>
    
                    {{csrf_field()}}
    
                    <div class="radio">
                        <label>
                            <input type="radio" name="option" value="Windows" >
                            Windows
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="option" value="Linux">
                            Linux
                        </label>
                    </div>
                    <div class="radio">
                            <label>
                                <input type="radio" name="option" value = "MacOS">
                                Mac OS
                            </label>
                        </div>
                    <button type="submit" class="btn btn-default" @click.prevent="addVote()">Vote</button>
                </form>
                {{--  <poll-component class="mb-3"></poll-component>  --}}
                <chartjs-bar class="mb-3" :datalabel="mylabel" :labels="oslabels" v-bind:data="mydata" :bind="true"></chartjs-bar>
            </div>
        </div>
        
        <script src="{{asset('js/app.js')}}"></script>
        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
