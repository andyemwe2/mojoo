<!-- looping products -->
  <?php foreach($products as $product) : ?>
  <div class="col-sm-3 col-md-3">
    <div class="thumbnail">
      <?=img([
        'src'        => $product->image,
        'style'        => 'max-width: 100%; max-height:100%; height:100px'
      ])?>
      <div class="caption">
        <h3 style="min-height:60px;text-align: center;"><?=$product->name?></h3>
        <p style="min-height:60px;text-align: center;"><b>Rp. <?=number_format($product->price)?></b></p>
        <p><?=$product->description?></p>                
        <p style="text-align: center;">
            <?=anchor('welcome/add_to_cart/' . $product->id, 'Beli' , [
                'class'    => 'btn btn-primary',
                'role'    => 'button'
            ])?>
        </p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
<!-- end looping -->
