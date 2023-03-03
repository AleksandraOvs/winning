
                <div class="products__name">
                  <?php the_title() ?>
                </div>
                <div class="products__discr">
                  <?php the_content() ?>
                </div>

                <?php $prod_tags = get_the_tags();
                    //if ( $prod_tags ) { ?>
                        <div class="products__colors">
                        <?php 
	                    foreach( $prod_tags as $tag ) {
                        ?>
                        <div class="input input-colors">
                            <input class="input-colors__input" type="radio" name="pr-c-1" id="pr-c-1-1" value="0">
                            <label class="input-colors__label" for="pr-c-1-1" style="background-color: <?php echo $tag->description;?>"></label>
                        </div>

	                    <?php
                        }
                        ?>
                        </div>
                    <?php //} ?>


                <div class="products__sizes">
                  <div class="input input-sizes">
                    <input class="input-sizes__input" type="radio" name="pr-s-1" id="pr-s-1-1">
                    <label class="input-sizes__label" for="pr-s-1-1">
                      10oz
                    </label>
                  </div>
                  <div class="input input-sizes">
                    <input class="input-sizes__input" type="radio" name="pr-s-1" id="pr-s-1-2">
                    <label class="input-sizes__label" for="pr-s-1-2">
                      12oz
                    </label>
                  </div>
                  <div class="input input-sizes">
                    <input class="input-sizes__input" type="radio" name="pr-s-1" id="pr-s-1-3">
                    <label class="input-sizes__label" for="pr-s-1-3">
                      14oz
                    </label>
                  </div>
                  <div class="input input-sizes">
                    <input class="input-sizes__input" type="radio" name="pr-s-1" id="pr-s-1-4">
                    <label class="input-sizes__label" for="pr-s-1-4">
                      16oz
                    </label>
                  </div>
                </div>
                <a class="products__link btn popup--link" href="#popup">
                  оформить заказ
                </a>
              </div>
