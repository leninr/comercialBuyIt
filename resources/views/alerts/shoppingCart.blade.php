
<?php
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
      foreach ($_SESSION["cart_products"] as $key=>$cart_itm)
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

}
?>
