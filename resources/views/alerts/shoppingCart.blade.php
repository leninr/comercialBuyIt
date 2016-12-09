
<?php use Gloudemans\Shoppingcart\Facades\Cart;
      use comercialBuyIt\Producto;
      if (Cart::count() != 0): ?>


      <div class="cart-view-table-front" id="view-cart">
    <div class="panel-group" id="accordion">
      <div class="panel panel-default" id="panel1">
        <div class="panel-heading">
             <h4 class="panel-title">
               <a data-toggle="collapse" data-target="#collapseOne"
                href="#collapseOne">
                  Carro de Compras
                </a>
              </h4>
        </div>
          <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body">

                <table>
                    <thead>
                        <tr>
                            <th>Cantidad</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                      <?php foreach(Cart::content() as $row) :
                              $product = Producto::find($row->id);?>

                            <tr>
                                <td><?php echo $row->qty; ?></td>
                                <td>
                                    <p><strong><a href="{!! route('producto.show', $parameters = $product->idProducto) !!}"><?php echo $row->name; ?></strong></p>
                                    <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                                </td>
                                <td>$<?php echo $row->price; ?></td>
                                <td>$<?php echo $row->subtotal; ?></td>
                            </tr>

                        <?php endforeach;?>

                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Subtotal</td>
                            <td><?php echo Cart::subtotal(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>IVA</td>
                            <td><?php echo Cart::tax(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Total</td>
                            <td><?php echo Cart::total(); ?></td>
                        </tr>
                    </tfoot>
                </table>
                <table>
                    <td colspan="2">
                      <!--<button type="submit" class="btn btn-link">Checkout</button>-->
                      {!!link_to_route('venta.checkout', $title = 'Checkout', $parameters = '', $attributes = ['class' => 'btn btn-link']);!!}
                    </td>

                    <td colspan="2">
                      <!--<button type="submit" class="btn btn-link">VaciarCarro</button>-->
                      {!!link_to_route('producto.vaciarCarro', $title = 'Vaciar Carro', $parameters = '', $attributes = ['class' => 'btn btn-link']);!!}
                    </td>
                </table>
              </div>
              <?php endif; ?>

            </div>
        </div>
    </div>
  </div>
