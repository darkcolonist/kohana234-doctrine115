<?php defined('SYSPATH') OR die('No direct access allowed.');
class Test_Controller extends Controller {

	public function disp()
	{
		$users = Doctrine::getTable("TblUsers")->findAll();
		
		// echo kohana::debug($users->toArray());
		
		foreach($users as $user){
			echo "<fieldset>";
			echo "<legend>{$user->name}</legend>";
			
			echo "houses:<br/>";
			if($user->TblHouses->count() > 0){
				echo "<ul>";
				foreach($user->TblHouses as $house){
					echo "<li>{$house->number}</li>";
				}
				echo "</ul>";
			}else{
				echo "<em>no houses...</em>";
			}
			
			echo "<hr style='border: none; border-top: 1px dotted #ccc'/>";
			
			echo "cars:<br/>";
			if($user->TblCars->count() > 0){
				echo "<ul>";
				foreach($user->TblCars as $car){
					echo "<li>{$car->year} {$car->model}</li>";
				}
				echo "</ul>";
			}else{
				echo "<em>no cars...</em>";
			}
			
			echo "</fieldset>";
		}
	}

}