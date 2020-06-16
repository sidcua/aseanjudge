@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <img src="{{ asset('storage/asean.png') }}" style="height: 70px; width: 70px; margin-top:-10px;">
            <p class="h1 text-center ml-4"><span class="align-middle">ASEAN 2019 Tabulator</span></p>
            {{-- <form id="form-view" method="post" autocomplete="off">
                @csrf
                <input type="hidden" id="input-view" name="view"/>
                <button id="toggle-view" type="button" class="btn btn-primary">Toggle View</button>
            </form> --}}
        </div><br>
        <div class="row">
            <div class="col-4">
                <h1 class="text-danger">Song</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Performer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1st</td>
                            <td id="song-rank-1"></td>
                        </tr>
                        <tr>
                            <td>2nd</td>
                            <td id="song-rank-2"></td>
                        </tr>
                        <tr>
                            <td>3rd</td>
                            <td id="song-rank-3"></td>
                        </tr>
                    </tbody>
                </table>
                <div id="song-cards">
                </div>
            </div>
            <div class="col-4">
                <h1 class="text-primary">Dance</h1>
                <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Rank</th>
                                <th scope="col">Performer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1st</td>
                                <td id="dance-rank-1"></td>
                            </tr>
                            <tr>
                                <td>2nd</td>
                                <td id="dance-rank-2"></td>
                            </tr>
                            <tr>
                                <td>3rd</td>
                                <td id="dance-rank-3"></td>
                            </tr>
                        </tbody>
                    </table>
                <div id="dance-cards">
                </div>
            </div>
            <div class="col-4">
                <h1 class="text-success">InfoGraphic</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Performer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1st</td>
                            <td id="infographic-rank-1"></td>
                        </tr>
                        <tr>
                            <td>2nd</td>
                            <td id="infographic-rank-2"></td>
                        </tr>
                        <tr>
                            <td>3rd</td>
                            <td id="infographic-rank-3"></td>
                        </tr>
                    </tbody>
                </table>
                <div id="infographic-cards">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (){
            loadSongs()
            loadDances()
            loadInfoGraphics()
        })
        $("#toggle-view").click(function (){
            toggleView();
        })
    </script>
@endsection