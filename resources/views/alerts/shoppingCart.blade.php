
<?php use Gloudemans\Shoppingcart\Facades\Cart;
      if (Cart::count() != 0): ?>
<div class="cart-view-table-front" id="view-cart">
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

          <?php foreach(Cart::content() as $row) :?>

              <tr>
                  <td><?php echo $row->qty; ?></td>
                  <td>
                      <p><strong><?php echo $row->name; ?></strong></p>
                      <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                  </td>
                  <td>$<?php echo $row->price; ?></td>
                  <td>$<?php echo $row->total; ?></td>
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
              <td>Tax</td>
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
        {!!link_to_route('producto.checkout', $title = 'Checkout', $parameters = '', $attributes = ['class' => 'btn btn-link']);!!}
      </td>

      <td colspan="2">
        <!--<button type="submit" class="btn btn-link">VaciarCarro</button>-->
        {!!link_to_route('producto.vaciarCarro', $title = 'Vaciar Carro', $parameters = '', $attributes = ['class' => 'btn btn-link']);!!}
      </td>
  </table>
</div>
<?php endif; ?>



<?php
/*
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
    echo '<div class="cart-view-table-front" id="view-cart">';
    echo '<h3>Carro de Compras</h3>';
    echo '<br>';
    echo '<form method="post" action="producto.updateDeleteCart">';
    echo '<table width="100%"  cellpadding="6" cellspacing="0">';
    echo '<tbody>';
      echo '<tr>';
        echo '<td>Cantidad</td>';
        echo '<td>Producto</td>';
        echo '<td>Subtotal</td>';
        echo '<td>Eliminar?</td>';
      echo '</tr>';

      $total =0;
      $b = 0;
      foreach(Cart::content() as $row) :
      {
          $product_name = $cart_itm["nombreProducto"];
          //$product_qty = $cart_itm["product_qty"];
          $product_qty = 1;
          $product_price = $cart_itm["precioProducto"];
          $product_code = $cart_itm["idProducto"];
          $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
          echo '<tr class="'.$bg_color.'">';
            echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
            echo '<td>'.$product_name.'</td>';
            $subtotal = ($product_price * $product_qty);
            echo '<td> $ '.$subtotal.'</td>';
            echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
          echo '</tr>';

          $total = ($total + $subtotal);
      }
      echo '<tr>';
        echo '<td>Total $ '.$total.'</td>';
      echo '</tr>';
      echo '<tr>';
        echo '<td colspan="2">';
          echo '<a href="/checkout" class="btn btn-primary btn-lg btn-block">Checkout</a>';
        echo '</td>';
        echo '<td colspan="2">';
          echo '<button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar</button>';
        echo '</td>';
      echo '</tr>';
    echo '</tbody>';
    echo '</table>';

    echo '</form>';
    echo '</div>';

}*/
?>
