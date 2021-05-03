@extends('plantilla')

@section('cuerpo')
<div class="container">
    <div class="row"    >
        <div class="card-panel">
            <div class="card">
                <span class="card-title">Galería</span>
            </div>
            <div class="card-content">
                {!! Form::open(['route'=> 'galeria.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                <div class="dz-message" style="height:200px;">
                    Drop your files here
                </div>
                <div class="dropzone-previews"></div>
                <button type="submit" class="btn btn-success" id="submit">Save</button>
                {!! Form::close() !!}
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('js/dropzone.js'); !!}
<script>
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    Dropzone.options.myDropzone = {
        autoProcessQueue: false,
        uploadMultiple: true,
        maxFilezise: 10,
        maxFiles: 6,
        addRemoveLinks: true,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        
        init: function() {
            var submitBtn = document.querySelector("#submit");
            myDropzone = this;
            
            submitBtn.addEventListener("click", function(e){
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();
            });
            this.on("addedfile", function(file) {
               
            });
            
            this.on("complete", function(file) {
                myDropzone.removeFile(file);
            });

            this.on("success", 
                myDropzone.processQueue.bind(myDropzone)
            );
            
        }
        
    };
</script>
@endsection