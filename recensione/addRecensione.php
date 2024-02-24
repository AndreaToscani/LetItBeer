

 <form method="POST" enctype="multipart/form-data" class="upload-form" nome="formup" id="upload-form" action="../recensione/upload.php" > 
	<div class="modal-body">
			<div class="rate">
				<input type="radio" id="star1" name="rate" value="1" /> <label for="star1" onclick="colorBeer_1()"  title="1"  class="fa-solid fa-beer-mug-empty star-light submit_star " id="submit_star_1" data-rating="1" ></label>
				<input type="radio" id="star2" name="rate" value="2" /><label for="star2"  onclick="colorBeer_2()" title="2" class="fa-solid fa-beer-mug-empty star-light submit_star " id="submit_star_2" data-rating="2" ></label>
				<input type="radio" id="star3" name="rate" value="3" /> <label for="star3"  onclick="colorBeer_3()" title="3" class="fa-solid fa-beer-mug-empty star-light submit_star " id="submit_star_3" data-rating="3" ></label>
				<input type="radio" id="star4" name="rate" value="4" /> <label for="star4"  onclick="colorBeer_4()" title="4" class="fa-solid fa-beer-mug-empty star-light submit_star " id="submit_star_4" data-rating="4" ></label>
				<input type="radio" id="star5" name="rate" value="5" />  <label for="star5"  onclick="colorBeer_5()"  title="5" class="fa-solid fa-beer-mug-empty star-light submit_star " id="submit_star_5" data-rating="5" ></label>
				<i class="fa fa-arrow-right" style="font-size:36px" id="backarrow"></i>
			</div>
			
							
						
			<div class="form-group">
				<input type="text" name="beer_name" onclick="suggest()" onkeyup="search()" id="beer_name" class="form-control" placeholder="Enter beer Name" required/>
				<ul id="bL">
				<?php 
				$dbconn = pg_connect("host=localhost port=5432 dbname=LetItBeer
				user=postgres password=admin") or die('Connessione morta' . pg_last_error());
					
				$qSearch = "SELECT distinct nome from birre ";
				$rr= pg_query($qSearch);
				while( $roww = pg_fetch_row($rr)){
					$bir = $roww[0];
					echo'<li style="display: none"><a href="#" onclick="hide(this)">'.$bir.'</a></li>'; }
						?>
				</ul>
			</div>

			<div class="form-group">
				<input type="text" maxlength="3" name="content" id="content" class="form-control content"  oninput="this.value = (this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'));"  placeholder="Insert Alcohol Content" />
			</div>


						

			<div class="form-group">
				<select name="select_beer_yeast" id="select_beer_yeast" class="form-control" >
					<option value="" disabled selected>Select type of yeast</option>
					<option value="Ale">Ale</option>
					<option value="Lager">Lager </option>
					<option value="Lambic">Lambic</option>
				</select>	
			</div>





			<div class="form-group">
				<select name="select_beer_color" id="select_beer_color" class="form-control" required>
					<option value="" disabled selected>Select Color</option>
					<option value="Bianca">Bianca </option>
					<option value="Bionda">Bionda </option>
					<option value="Ambrata">Ambrata</option>
					<option value="Scura">Scura</option>
				</select>
			</div>



		

						
			<div class="form-group">
				<textarea style="resize:none" maxlength="200" rows="3"name="user_notes" id="user_notes" class="form-control" placeholder="Type Review Here"></textarea>
			</div>



			<input name="file" id="file" type="file" accept="image/*" onchange="preview_image(event)" required/>
			<img id="output_image"/>



		
				<button type="submit" class="btn btn-primary" name="submit" id="save_review">Invia</button>
		
	</div>
</form>
