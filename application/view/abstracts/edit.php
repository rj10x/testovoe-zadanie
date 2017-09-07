<div class="container">
    <h1>Редактирование абстракции</h1>
    <!-- add song form -->
    <div>
        <form action="<?php echo URL; ?>abstracts/updateabstract" method="POST">
          <div class="form-group">
				<label>Имя</label>
				<input class="form-control" type="text" name="first_name" value="<?php echo htmlspecialchars($abstract->first_name, ENT_QUOTES, 'UTF-8'); ?>" required />
			</div>
           
           <div class="form-group">
				<label>Фамилия</label>
				<input class="form-control" type="text" name="last_name" value="<?php echo htmlspecialchars($abstract->last_name, ENT_QUOTES, 'UTF-8'); ?>" required />
		   </div>
           
           <div class="form-group">
				<label class="uk-form-label" for="data_rogdeniya">Дата рождения:</label>
				<select class="form-control data-rogdeniya" name="den_rogdeniya" value="<?php echo htmlspecialchars($abstract->den_rogdeniya, ENT_QUOTES, 'UTF-8'); ?>">
					<option value=''>дд</option>
					<option value='02'>01</option>
					<option value='03'>02</option>
					<option value='04'>03</option>
					<option value='05'>04</option>
					<option value='06'>05</option>
					<option value='07'>06</option>
					<option value='08'>07</option>
					<option value='09'>08</option>
					<option value='10'>09</option>
					<option value='11'>10</option>
					<option value='12'>11</option>
					<option value='13'>12</option>
					<option value='14'>13</option>
					<option value='15'>14</option>
					<option value='16'>15</option>
					<option value='17'>16</option>
					<option value='18'>17</option>
					<option value='19'>18</option>
					<option value='20'>19</option>
					<option value='21'>20</option>
					<option value='22'>21</option>
					<option value='23'>22</option>
					<option value='24'>23</option>
					<option value='25'>24</option>
					<option value='26'>25</option>
					<option value='27'>26</option>
					<option value='28'>27</option>
					<option value='29'>28</option>
					<option value='30'>29</option>
					<option value='31'>30</option>
					<option value='32'>31</option>
				</select>

				<select class="form-control data-rogdeniya" name="mesyats_rogdeniya" data-size="6" value="<?php echo htmlspecialchars($abstract->mesyats_rogdeniya, ENT_QUOTES, 'UTF-8'); ?>">
					<option value=''>мм</option>
					<option value='01'>01</option>
					<option value='02'>02</option>
					<option value='03'>03</option> 
					<option value='04'>04</option>
					<option value='05'>05</option>
					<option value='06'>06</option>
					<option value='07'>07</option>
					<option value='08'>08</option>
					<option value='09'>09</option>
					<option value='10'>10</option>
					<option value='11'>11</option> 
					<option value='12'>12</option>
				</select>

			    <?php echo "<select class=\"form-control data-rogdeniya\" name=\"god_rogdeniya\" data-size=\"6\" value=\"";
			    echo htmlspecialchars($abstract->god_rogdeniya, ENT_QUOTES, 'UTF-8');
				echo "<option value=''>гггг</option> ";
				for($i=0;$i<=90;$i++){
				$year=date('Y',strtotime("last day of -$i year"));
				echo "<option name='$year'>$year</option>";
				}
				echo "</select>"; ?>
			</div>
           <div class="form-group">
		   		<label>Описание</label>
				<textarea class="form-control" rows="3" name="description" value="" placeholder="Краткое описание абстракции..." value="<?php echo htmlspecialchars($abstract->description, ENT_QUOTES, 'UTF-8'); ?>" required ></textarea>
           </div>
           <div class="form-group">
			   <div class="checkbox">
				  <label>
					<input type="checkbox" value="yes" name="marital_status">
					Семеное положение - женат(замужем)
				  </label>
				</div>
			</div>
           <div class="form-group">
			   <div class="radio">
					  <label>
						<input type="radio" name="language" id="language1" value="en" checked>
						English
					  </label>
					</div>
					<div class="radio">
					  <label>
						<input type="radio" name="language" id="language2" value="fr">
						French
					  </label>
					</div>
					<div class="radio">
					  <label>
						<input type="radio" name="language" id="language3" value="de"> Dutch</label>
					</div>
           </div>
          <div class="form-group"> 
			  <label>Количество</label>
			  <select id="first-disabled2" name="quantity" class="selectpicker form-control" multiple data-hide-disabled="true" data-size="4" value="<?php echo htmlspecialchars($abstract->selectpicker, ENT_QUOTES, 'UTF-8'); ?>" required>
					<option>1</option>
					<option>2</option>
					<option>2+1</option>
					<option>3+2</option>
			   </select>
			</div>
           <button id="submit" class="btn btn-success"  type="submit" name="submit_update_abstract" value="Update"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Добавить абстракцию</button>
        </form>
    </div>
</div>


			

