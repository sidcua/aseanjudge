@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <img src="{{ asset('storage/asean.png') }}" style="height: 70px; width: 70px; margin-top:-10px;">
            <p class="h1 text-center ml-4"><span class="align-middle">ASEAN 2019 Tabulator</span></p>
        </div><br>
        <div class="row">
            <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active h4" id="song" data-toggle="pill" href="#v-pills-song" role="tab" aria-controls="v-pills-home" aria-selected="true">Song</a>
                    <a class="nav-link h4" id="dance" data-toggle="pill" href="#v-pills-dance" role="tab" aria-controls="v-pills-profile" aria-selected="false">Dance</a>
                    <a class="nav-link h4" id="infographic" data-toggle="pill" href="#v-pills-infographic" role="tab" aria-controls="v-pills-messages" aria-selected="false">InfoGraphic</a>
                </div>
                <div>
                    <div class="alert alert-primary">
                        <p class="h6"><span class="font-weight-bold text-danger">Note:</span> To <span class="font-weight-bold">update</span> or <span class="font-weight-bold">change</span> the score of a performer, input the new scores with the <span class="font-weight-bold">corresponsing performer #</span></p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="tab-content" id="v-pills-tabContent">
                    {{-- Song Form --}}
                    <div class="tab-pane fade show active" id="v-pills-song" role="tabpanel" aria-labelledby="song">
                        <form id="song-form" method="POST" autocomplete="off">
                            @csrf
                            <h1>Song</h1>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Performer #</label>
                                <input name="performer"type="number" class="form-control form-control-lg border-primary" id="formGroupExampleInput">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Content / Unity of idea and meaning <span class="h5">(20%)</span></label>
                                <input name="content" min="1" max="20" type="number" class="form-control form-control-lg" id="formGroupExampleInput2">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Melody and tonal quality <span class="h5">(20%)</span></label>
                                <input name="melody" min="1" max="20" type="number" class="form-control form-control-lg" id="formGroupExampleInput2">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Accompaniment / appropriateness of chords in relation to the melody <span class="h5">(20%)</span></label>
                                <input name="accompaniment" min="1" max="20" type="number" class="form-control form-control-lg" id="formGroupExampleInput2">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Interpretation <span class="h5">(20%)</span></label>
                                <input name="interpretation" min="1" max="20" type="number" class="form-control form-control-lg" id="formGroupExampleInput2">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Harmony <span class="h5">(20%)</span></label>
                                <input name="harmony" min="1" max="20" type="number" class="form-control form-control-lg" id="formGroupExampleInput2">
                            </div>
                            <div class="float-right">
                                <button class="btn btn-danger btn-lg reset">Clear</button>
                                <button id="submit-song" min="1" max="20" class="btn btn-success btn-lg" type="button">Submit</button>
                            </div>
                        </form>
                    </div>
                    {{-- Dance Form --}}
                    <div class="tab-pane fade" id="v-pills-dance" role="tabpanel" aria-labelledby="dance">
                        <form id="dance-form" method="POST" autocomplete="off">
                            @csrf
                            <h1>Dance</h1>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Performer #</label>
                                <input name="performer" type="number" class="form-control form-control-lg border-primary" id="formGroupExampleInput">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Choreogrpahy <span class="h5">(30%)</span></label>
                                <input name="choreography" min="1" max="30" type="number" class="form-control form-control-lg" id="formGroupExampleInput2">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Execution and Performance <span class="h5">(30%)</span></label>
                                <input name="execution" min="1" max="30" type="number" class="form-control form-control-lg" id="formGroupExampleInput2">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Aesthetics <span class="h5">(20%)</span></label>
                                <input name="aesthetic" min="1" max="20" type="number" class="form-control form-control-lg" id="formGroupExampleInput2">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Costume and Appropriateness of Props <span class="h5">(20%)</span></label>
                                <input name="costume" min="1" max="20" type="number" class="form-control form-control-lg" id="formGroupExampleInput2">
                            </div>
                            <div class="float-right">
                                <button class="btn btn-danger btn-lg reset">Clear</button>
                                <button id="submit-dance" type="submit" class="btn btn-success btn-lg" type="button">Submit</button>
                            </div>
                        </form>
                    </div>
                    {{-- Infographic Form --}}
                    <div class="tab-pane fade" id="v-pills-infographic" role="tabpanel" aria-labelledby="infographic">
                        <form id="infographic-form" method="POST" autocomplete="off">
                            @csrf
                            <h1>InfoGraphics</h1>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Performer #</label>
                                <input name="performer" type="number" class="form-control form-control-lg border-primary" id="formGroupExampleInput">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Editing (How it’s put together) <span class="h5">(25%)</span></label>
                                <input name="editing" min="1" max="25" type="number" class="form-control form-control-lg" id="formGroupExampleInput2">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Cinematography (How it looks) <span class="h5">(25%)</span></label>
                                <input name="cinematography" min="1" max="25" type="number" class="form-control form-control-lg" id="formGroupExampleInput2">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Creativity (How original it is) <span class="h5">(25%)</span></label>
                                <input name="creativity" min="1" max="25" type="number" class="form-control form-control-lg" id="formGroupExampleInput2">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Artistic Vision (Was there a message or theme?) <span class="h5">(25%)</span></label>
                                <input name="artistic" min="1" max="25" type="number" class="form-control form-control-lg" id="formGroupExampleInput2">
                            </div>
                            <div class="float-right">
                                <button class="btn btn-danger btn-lg reset">Clear</button>
                                <button id="submit-infographic" type="submit" class="btn btn-success btn-lg" type="button">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div id="submit-success" class="alert alert-success collapse"><h4>Score save successfully!</h4></div>
                <div id="submit-error" class="alert alert-danger collapse"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // $(document).ready(function(){
        //     getView();
        // })
        $('#song,#dance,#infographic').click(function (){
            $(".reset").click();
            $("#submit-error").hide();
            $("#submit-success").hide();
            $("#submit-error").html();
        })
        $(".reset").click(function(e) {
            e.preventDefault();
            $(this).closest('form').find("input[type=number]").val("");
            $('#submit-success').hide();
            $('#submit-error').hide();
			$('#submit-error').html('');
        });
        $("#submit-song").click(function (e){
            e.preventDefault();
            submitSong();
        });
        $("#submit-dance").click(function (e){
            e.preventDefault();
            submitDance();
        });
        $("#submit-infographic").click(function (e){
            e.preventDefault();
            submitInfoGraphic();
        });
    </script>
@endsection
