@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <img src="{{ asset('storage/zppsulogo.png') }}" style="height: 70px; width: 70px; margin-top:-10px;">
            <p class="h1 text-center ml-4"><span class="align-middle">ZPPSU Judge Tabulator</span></p>
        </div><br>
        <div class="row">
            <div class="col-6 text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Condidate (Male)</th>
                            <th scope="col">Score</th>
                        </tr>
                    </thead>
                    <tbody id="finals-body-male">

                    </tbody>
                </table>
            </div>
            <div class="col-6 text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Candidate (Female)</th>
                            <th scope="col">Score</th>
                        </tr>
                    </thead>
                    <tbody id="finals-body-female">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-md-6 text-center">
                <h1 class="text-info">Finals</h1>
                <div id="finals-cards" class="card-columns">
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (){
            loadFinals();
            loadRankingFinalsMale();
            loadRankingFinalsFemale();
        })
    </script>
@endsection