@extends('layouts.maestra')
@section('contenido')

<div class="container-fluid">
  <br>
    <div class="row">
      <div class="medium-6 columns">
        <img src="{{ asset('imgs/' . $product->imagenProducto) }}" class="thumbnail" height="350" width="650">
        <div class="row small-up-4">
          <div class="column">
            <img class="thumbnail" src="http://placehold.it/250x200">
          </div>
          <div class="column">
            <img class="thumbnail" src="http://placehold.it/250x200">
          </div>
          <div class="column">
            <img class="thumbnail" src="http://placehold.it/250x200">
          </div>
          <div class="column">
            <img class="thumbnail" src="http://placehold.it/250x200">
          </div>
        </div>
      </div>
      <div class="medium-6 large-5 columns">
        <h3>{{$product->nombreProducto}}</h3>
        <?php foreach ($types as $type): ?>
          <?php if ($type->idTipoProducto == $product->idTipoProducto): ?>
            <h5>{{$type->descripcionTipoProducto}}</h5>
          <?php endif; ?>
        <?php endforeach; ?>

        <?php if ($product->rateProducto == 0): ?>
          <p> - </p>
        <?php else: ?>
          <?php for ($i = 0; $i < $product->rateProducto; $i++) {?>
            <p class="fa fa-star"></p>
          <?php } ?>
        <?php endif; ?></p>

        <h5> En Stock: {{$product->stockProducto}}</h5>
        <h5> {{$product->estadoProducto}}</h5>
        <h4>Precio: $ {{$product->precioProducto}}</h4>

        <button class="fa fa-shopping-cart btn btn-primary btn-lg btn-block"> Comprar</button>
        <br>
        <br>

        <div class="small secondary expanded button-group">
            <a class="button">Facebook</a>
            <a class="button">Twitter</a>
            <a class="button">Yo</a>
          </div>
        </div>
    </div>

    <div class="column row">
      <div class="panel-body">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
              <li class="active"><a href="#Pago" data-toggle="tab">Forma de Pago</a>
              </li>
              <li><a href="#Entrega" data-toggle="tab">Forma de Entrega</a>
              </li>
              <li><a href="#FAQs" data-toggle="tab">FAQs</a>
              </li>
              <li><a href="#Recomendaciones" data-toggle="tab">Recomendaciones</a>
              </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
              <div class="tab-pane fade in active" id="Pago">
                <br>
                  <p>{{$product->descripcionPagoProducto}}</p>
              </div>

              <div class="tab-pane fade" id="Entrega">
                <br>
                  <p>{{$product->descripcionEntregaProducto}}</p>
              </div>

              <div class="tab-pane fade" id="FAQs">
                <br>
                  <div class="media-object stack-for-small">
                    <div class="media-object-section">
                      <img class="thumbnail" src="http://placehold.it/200x200">
                    </div>
                    <div class="media-object-section">
                      <h5>Mike Stevenson</h5>
                      <p>I'm going to improvise. Listen, there's something you should know about me... about inception. An idea is like a virus, resilient, highly contagious. The smallest seed of an idea can grow. It can grow to define or destroy you.</p>
                    </div>
                  </div>
                  <div class="media-object stack-for-small">
                    <div class="media-object-section">
                      <img class="thumbnail" src="http://placehold.it/200x200">
                    </div>
                    <div class="media-object-section">
                      <h5>Mike Stevenson</h5>
                      <p>I'm going to improvise. Listen, there's something you should know about me... about inception. An idea is like a virus, resilient, highly contagious. The smallest seed of an idea can grow. It can grow to define or destroy you</p>
                    </div>
                  </div>
                  <div class="media-object stack-for-small">
                    <div class="media-object-section">
                      <img class="thumbnail" src="http://placehold.it/200x200">
                    </div>
                    <div class="media-object-section">
                      <h5>Mike Stevenson</h5>
                      <p>I'm going to improvise. Listen, there's something you should know about me... about inception. An idea is like a virus, resilient, highly contagious. The smallest seed of an idea can grow. It can grow to define or destroy you</p>
                    </div>
                  </div>
              </div>

              <div class="tab-pane fade" id="Recomendaciones">
                  <div class="row medium-up-3 large-up-5">
                    <?php $cont=0; ?>
                    <?php foreach ($types as $type): ?>
          						<?php if ($type->idTipoProducto == $product->idTipoProducto):
                                if ($cont<8): ?>
                                  <div class="column">
                                    <img class="thumbnail" src="{{ asset('imgs/' . $product->imagenProducto) }}" height="350" width="250">
                                    <h5>{{$product->nombreProducto}} <small>$ {{$product->precioProducto}}</small></h5>
                                    <p>{{$product->estadoProducto}}</p>
                                    {!!link_to_route('producto.show', $title = 'Ver', $parameters = $product->idProducto, $attributes = ['class' => 'button hollow tiny expanded']);!!}
                                  </div>
                						<?php endif;
                                  $cont++;
                                endif; ?>
          					<?php endforeach; ?>
                  </div>

              </div>
          </div>
      </div>

    </div>
</div>
@stop
