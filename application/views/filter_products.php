<script>
  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  </script>
<div class="main-top">
        <div class="filter col-md-3">
            <p>Filters:</p><br/>
            <p>
  <label for="amount">Price range:</label>
  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
</p>
 
<div id="slider-range"></div><br/>
<p>Brand:</p>
<input type="checkbox"/>Aaa<br/>
<input type="checkbox"/>Aaa<br/>
<input type="checkbox"/>Aaa<br/><br/>
<p>Colour:</p>
<input type="checkbox"/>Aaa<br/>
<input type="checkbox"/>Aaa<br/>
<input type="checkbox"/>Aaa<br/>
        </div>
    <div class="col-md-9 right-grid">
					<div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="sort">
    		<p>Sort by:
    			<select>
    				<option>Lowest Price</option>
    				<option>Highest Price</option>
    				<option>Lowest Price</option>
    				<option>Lowest Price</option>
    				<option>Lowest Price</option>
    				<option>In Stock</option>  				   				
    			</select>
    		</p>
    		</div>
    		<div class="show">
    		<p>Show:
    			<select>
    				<option>4</option>
    				<option>8</option>
    				<option>12</option>
    				<option>16</option>
    				<option>20</option>
    				<option>In Stock</option>  				   				
    			</select>
    		</p>
    		</div>
    		<div class="page-no">
    			<p>Result Pages:<ul>
    				<li><a href="#">1</a></li>
    				<li class="active"><a href="#">2</a></li>
    				<li><a href="#">3</a></li>
    				<li>[<a href="#"> Next>>></a >]</li>
    				</ul></p>
    		</div>
            <div class="clearfix"></div>
    	</div>
	      <div class="section group proizvodi">
				<div class="col-md-9 right-grid proizvod">
				<div class="col-md-3 levo">
					 <a href="single.html"><img src="<?php echo $base_url; ?>images/new-pic3.jpg" alt="" /></a>
				</div>
				<div class="col-md-6 desno">
					 <h2>Lorem Ipsum is simply </h2>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
					 <p><span class="strike">$528.22</span><span class="price">$505.22</span></p>
					  <div class="button"><span><img src="<?php echo $base_url; ?>images/cart.jpg" alt="" /><a href="single.html" class="cart-button">Add to Cart</a></span> </div>
				     <div class="button"><span><a href="single.html" class="details">Details</a></span></div>
				</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-9 right-grid proizvod">
				<div class="col-md-3 levo">
					 <a href="single.html"><img src="<?php echo $base_url; ?>images/feature-pic2.jpg" alt="" /></a>
				</div>
				<div class="col-md-6 desno">
					 <h2>Lorem Ipsum is simply </h2>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
					 <p><span class="strike">$528.22</span><span class="price">$505.22</span></p>
					  <div class="button"><span><img src="<?php echo $base_url; ?>images/cart.jpg" alt="" /><a href="single.html" class="cart-button">Add to Cart</a></span> </div>
				     <div class="button"><span><a href="single.html" class="details">Details</a></span></div>
				</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
			   </div>
    
    <div class="clearfix"></div>
</div>