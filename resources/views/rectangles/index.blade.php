@extends('layouts.app')

@section('content')
    <h1>Create a New Rectangle</h1>
    {{-- {!! Form::open(['action' => ['RectanglesController@store'], 'method' => 'POST']) !!}
    <div class="row">
        <div class="col">
            {{Form::text('width', '', ['class' => 'form-control', 'placeholder' => 'Width'])}}
        </div>
        <div class="col">
            {{Form::text('height', '', ['class' => 'form-control', 'placeholder' => 'Height'])}}
        </div>
        <div class="col">
            {{Form::color('color', '', ['class' => 'form-control'])}}
        </div>
        <div class="col">
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        </div>
    </div>   
    {!! Form::close() !!} --}}
    <section class="w-25 mb-3">
        {!! Form::open(['action' => 'RectanglesController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('width', 'Width (Max 10)')}}
                {{Form::input('number', 'width', 1, ['min' => 1, 'max' => 10, 'class' => 'form-control', 'placeholder' => 'Width'])}}
            
                {{Form::label('height', 'Height (Max 4)')}}
                {{Form::input('number', 'height', 1, ['min' => 1, 'max' => 4,'class' => 'form-control', 'placeholder' => 'Height'])}}
    
                {{Form::label('color', 'Rectangle Color')}}
                {{Form::color('color', '', ['class' => 'form-control'])}}

                {{Form::label('shadowColor', 'Shadow Color')}}
                {{Form::color('shadowColor', '', ['class' => 'form-control'])}}

                {{Form::label('textColor', 'Text Color')}}
                {{Form::color('textColor', 	'#FFFFFF', ['class' => 'form-control'])}}

                {{Form::label('shadowBlur', 'Shadow Blur')}}
                {{Form::text('shadowBlur', 0, ['class' => 'form-control'])}}
            </div>
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
        </section>
   
    <h1>Existing Rectangles </h1>
   
    <section id="rectangles" class="mb-3">
        @if(count($rectangles) > 0)
           @foreach($rectangles as $rectangle)
            <div class="row mb-5" id='row{{$rectangle->id}}'>
                <div class="col">
                    <canvas id='canvas{{$rectangle->id}}' height="200px" width="500px"></canvas>
                </div>
                <div class="col">
                    {!! Form::open(['action' => ['RectanglesController@update', $rectangle->id], 'method' => 'POST']) !!}
                    <div class="form-row">
                        <div class="form-group col">
                            {{Form::label('width', 'Width')}}
                            {{Form::input('number', 'width', $rectangle->width, ['min' => 1, 'max' => 10, 'class' => 'form-control', 'placeholder' => 'Width'])}}
                        </div>
                        <div class="form-group col">
                            {{Form::label('height', 'Height')}}
                            {{Form::input('number', 'height', $rectangle->height, ['min' => 1, 'max' => 4,'class' => 'form-control', 'placeholder' => 'Height'])}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            {{Form::label('color', 'Rectangle')}}
                            {{Form::color('color', $rectangle->color, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col">
                            {{Form::label('shadowColor', 'Shadow')}}
                            {{Form::color('shadowColor', $rectangle->shadowColor, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col">
                            {{Form::label('textColor', 'Text')}}
                            {{Form::color('textColor', $rectangle->textColor, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col">
                            {{Form::label('shadowBlur', 'Blur')}}
                            {{Form::text('shadowBlur', $rectangle->shadowBlur, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col">
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                        </div>
                    </div>   
                    {!! Form::close() !!}
                </div>
                <div class="col">
                    {!!Form::open(['action' => ['RectanglesController@destroy', $rectangle->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}

                </div>
            </div>
        @endforeach
        <script>
            var rectangles = {!! json_encode($rectangles->toArray()) !!};
            rectangles.forEach(rectangle => {
                console.log(rectangle)
                var canvas = document.getElementById(`canvas${rectangle.id}`)
                var ctx = canvas.getContext('2d')
                ctx.fillStyle = rectangle.color
                ctx.shadowColor = rectangle.shadowColor
                ctx.shadowBlur = rectangle.shadowBlur
                ctx.fillRect(0, 0, rectangle.width*50, rectangle.height*50)
                ctx.fillStyle = rectangle.textColor
                ctx.textAlign = "center";
                ctx.fillText(`Area: ${rectangle.width*rectangle.height*50*50}px`, rectangle.width*50/2, rectangle.height*50/2);
                // document.getElementById(`del${rectangle.id}`).addEventListener("click", function() {
                //     var rect = document.getElementById('rectangles')
                //     console.log(rect)
                //     console.log(rectangle)
                //     console.log(rectangle.id)
                //     rect.removeChild(document.getElementById(`row${rectangle.id}`))
                // })
            })

        </script>
    </section>
    @else 
        <p>No rectangles found</p>
    @endif
@endsection
