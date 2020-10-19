<div class="portfolio-modal modal fade" id="publicacion{{$publication->id}}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="{{ asset('/assets/img/close-icon.svg')}} " alt="Close modal" />
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">{{$publication->title}}</h2>
                            <p class="item-intro text-muted"></p>
                            <img class="img-fluid d-block mx-auto" src="{{'/storage/imagenes/publicaciones/'.$publication -> image}}" alt="" />
                            <p>{{$publication->description}}</p>
                            <ul class="list-inline">
                                <li>Fecha: {{$publication->created_at->format('d/m/Y')}}</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Cerrar publicación
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
