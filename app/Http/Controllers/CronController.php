<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use DB;

class CronController extends Controller{
	public function createRelation(){
		$data_family_id = DB::table('relation_created')
			->select('family_id')
			->where('inserted_relationship_table', '=', '0')
			->get();

		//audit created ip
		$ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';

		foreach ($data_family_id as $key) {

			$data = DB::table('userData')
				->select('id', 'firstName', 'middleName','relationSelect', 'gender', 'birthDate')
				->where('family_id', '=', $key->family_id)
				->get();

			//print_r($data);
			$i = 0;
			foreach($data as $d){
				$temp_data[$i]['id'] = $d->id;
				$temp_data[$i]['relationSelect'] = $d->relationSelect;
				$temp_data[$i]['gender'] = $d->gender;
				$temp_data[$i]['firstName'] = $d->firstName;
				$temp_data[$i]['middleName'] = $d->middleName;
				$temp_data[$i]['birthDate'] = $d->birthDate;
				$i++;
			}
			
			for($j=0; $j<$i; $j++){
				for($k=$j+1; $k<$i; $k++){
					$parent_to_child_relation = '';
					$child_to_parent_relation = '';
					//1 to other relations 1 = Himself
					if($temp_data[$j]['relationSelect']==1){
						if($temp_data[$k]['relationSelect']==2){
							$parent_to_child_relation = '2';
							$child_to_parent_relation = '11';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 2 wife, 11 Husband";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==3){
							$parent_to_child_relation = '3';
							$child_to_parent_relation = '5';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 3 son, 5 father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							$parent_to_child_relation = '4';
							$child_to_parent_relation = '5';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 4 daughter, 5 father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==5){
							$parent_to_child_relation = '5';
							$child_to_parent_relation = '3';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5 father, 3 son";
								echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							$parent_to_child_relation = '6';
							$child_to_parent_relation = '3';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 6 mother, 3 son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==7){
							$parent_to_child_relation = '7';
							$child_to_parent_relation = '9';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 7 grand son, 9 grand father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==8){
							$parent_to_child_relation = '8';
							$child_to_parent_relation = '9';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 8 grand daughter, 9 grand father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==9){
							$parent_to_child_relation = '9';
							$child_to_parent_relation = '7';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 9 grand father, 7 grand son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==10){
							$parent_to_child_relation = '10';
							$child_to_parent_relation = '7';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 10 grand mother, 7 grand son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==11){				
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 11 Husband, 2 wife";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==12){
							$parent_to_child_relation = '12';
							$child_to_parent_relation = '12';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 12 brother, 12 brother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==13){
							$parent_to_child_relation = '13';
							$child_to_parent_relation = '12';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 13 sister, 12 brother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							$parent_to_child_relation = '15';
							$child_to_parent_relation = '16';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 15 daughter in law, 16 Father in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==16){
							$parent_to_child_relation = '16';
							$child_to_parent_relation = '14';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 16 Father in law, 14, son in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==17){
							$parent_to_child_relation = '17';
							$child_to_parent_relation = '14';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 Mother in law, 14 Son in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==18){
							// $parent_to_child_relation = '17';
							// $child_to_parent_relation = '14';
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 Mother in law, 14 Son in law";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==19){
							// $parent_to_child_relation = '19';
							// $child_to_parent_relation = '14';
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 Mother in law, 14 Son in law";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==20){
							// $parent_to_child_relation = '17';
							// $child_to_parent_relation = '14';
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 Mother in law, 14 Son in law";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==21){
							// $parent_to_child_relation = '17';
							// $child_to_parent_relation = '14';
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 Mother in law, 14 Son in law";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==22){

							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							$parent_to_child_relation = '22';
							if($diff->format("%R%a")>0){
								$child_to_parent_relation = '20';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 22 Bhabhi, 20 Der";
							}
							else{
								$child_to_parent_relation = '18';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 22 Bhabhi, 18 Jeth";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==23){

							$parent_to_child_relation = '23';
							$child_to_parent_relation = '25';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 23 Kaka, 25 Bhatrijo";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==24){

							$parent_to_child_relation = '24';
							$child_to_parent_relation = '25';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 24 Kaki, 25 Bhatrijo";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==25){

							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							$parent_to_child_relation = '25';
							if($diff->format("%R%a")>0){
								$child_to_parent_relation = '23';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 25 Bhatrijo, 23 Kaka";
							}
							else{
								$child_to_parent_relation = '27';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 25 Bhatrijo, 27 Bhaiji";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==26){

							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							$parent_to_child_relation = '26';
							if($diff->format("%R%a")>0){
								$child_to_parent_relation = '23';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 23 Kaka";
							}
							else{
								$child_to_parent_relation = '27';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 27 Bhaiji";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==27){

							$parent_to_child_relation = '27';
							$child_to_parent_relation = '25';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 27 Bhaiji, 25 Bhatrijo";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==28){

							$parent_to_child_relation = '28';
							$child_to_parent_relation = '25';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 28 Bhabhu, 25 Bhatrijo";
							echo "<br>";
						}

					}

					//2 to other relations 2 = Wife
					elseif($temp_data[$j]['relationSelect']==2){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '11';
							$child_to_parent_relation = '2';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 11 Husband, 2 wife";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==3){
							$parent_to_child_relation = '3';
							$child_to_parent_relation = '6';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 3 son, 6 mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							$parent_to_child_relation = '4';
							$child_to_parent_relation = '6';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 4 daughter, 6 mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==5){
							$parent_to_child_relation = '16';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasra, vahu";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							$parent_to_child_relation = '17';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasu, vahu";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==7){
							$parent_to_child_relation = '7';
							$child_to_parent_relation = '10';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 7 grand son, 10 grand mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==8){
							$parent_to_child_relation = '8';
							$child_to_parent_relation = '10';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 8 grand daughter, 10 grand mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==9){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." mota sasra, vahu beta";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==10){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." mota sasu, vahu beta";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==11){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." pote, pote";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==12){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '18';
								$child_to_parent_relation = '22';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 18 Jeth, 22 Bhabhi";
							}
							else{
								$parent_to_child_relation = '20';
								$child_to_parent_relation = '22';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 20 Der, 22 Bhabhi";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==13){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Nanand, bhabhi";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==14){
							$parent_to_child_relation = '14';
							$child_to_parent_relation = '17';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 14 son in law, 17 mother in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							$parent_to_child_relation = '15';
							$child_to_parent_relation = '17';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 15 Daughter in law, 17 Mother in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==16){
							$parent_to_child_relation = '5';
							$child_to_parent_relation = '4';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5 Father, 4 Daughter";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==17){
							$parent_to_child_relation = '6';
							$child_to_parent_relation = '4';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 6 Mother, 4 Daughter";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==18){
							// $parent_to_child_relation = '2';
							// $child_to_parent_relation = '11';
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 2 wife, 11 husband";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==19){
							// $parent_to_child_relation = '2';
							// $child_to_parent_relation = '11';
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 2 wife, 11 husband";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==20){
							// $parent_to_child_relation = '2';
							// $child_to_parent_relation = '11';
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 2 wife, 11 husband";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==21){
							// $parent_to_child_relation = '2';
							// $child_to_parent_relation = '11';
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 2 wife, 11 husband";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==22){

							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '19';
								$child_to_parent_relation = '21';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 19 Jethani, 21 Derani";
							}
							else{
								$parent_to_child_relation = '21';
								$child_to_parent_relation = '19';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 21 Derani, 18 Jethani";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==23){
								$parent_to_child_relation = '29';
								$child_to_parent_relation = '15';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 29 Kakaji, 15 daughter in law";
						}
						elseif($temp_data[$k]['relationSelect']==24){
								$parent_to_child_relation = '30';
								$child_to_parent_relation = '15';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 29 Kakiji, 15 daughter in law";
						}
						elseif($temp_data[$k]['relationSelect']==25){

							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							$parent_to_child_relation = '25';
							if($diff->format("%R%a")>0){
								$child_to_parent_relation = '24';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 25 Bhatrijo, 24 Kaki";
							}
							else{
								$child_to_parent_relation = '28';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 25 Bhatrijo, 27 Bhabhu";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==26){

							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							$parent_to_child_relation = '26';
							if($diff->format("%R%a")>0){
								$child_to_parent_relation = '24';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 23 Kaki";
							}
							else{
								$child_to_parent_relation = '28';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 28 Bhabhu";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==27){

							$parent_to_child_relation = '16';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 16 Father in law, 25 Daughter in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==28){

							$parent_to_child_relation = '17';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 Mother in low, 25 Daughter in law";
							echo "<br>";
						}
					}
					
					//3 to other relations 3 = Son
					elseif($temp_data[$j]['relationSelect']==3){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '5';
							$child_to_parent_relation = '3';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5 father, 3 son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==2){
							$parent_to_child_relation = '6';
							$child_to_parent_relation = '3';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 6 mother, 3 son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==3){
							$parent_to_child_relation = '12';
							$child_to_parent_relation = '12';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 12 brother, 12 brother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							$parent_to_child_relation = '13';
							$child_to_parent_relation = '12';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 13 sister, 12 brother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==5){
							$parent_to_child_relation = '9';
							$child_to_parent_relation = '7';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 9 grand father, 7 grand son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							$parent_to_child_relation = '10';
							$child_to_parent_relation = '7';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 10 grand mother, 7 grand son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==7){
							$parent_to_child_relation = '3';
							$child_to_parent_relation = '5';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 3 son, 5 father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==8){
							if($temp_data[$j]['firstName']==$temp_data[$k]['middleName']){
								$parent_to_child_relation = '4';
								$child_to_parent_relation = '5';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 4 daughter, 5 father";
							}
							else{
								$middle_data = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$k]['middleName'])
									->get();
								
								foreach($middle_data as $d){
									$date1 = date_create($d->birthDate);
									$date2 = date_create($temp_data[$j]['birthDate']);
									$diff = date_diff($date1, $date2);
								}

								if($diff->format("%R%a")>0){
									$parent_to_child_relation = '26';
									$child_to_parent_relation = '27';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 27 bhaiji";
								}
								else{
									$parent_to_child_relation = '26';
									$child_to_parent_relation = '23';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 23 Kaka";
								}
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==9){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." par dada, par putra";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==10){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." par dadi, par putra";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==11){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." N/A, N/A";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==12){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '27';
								$child_to_parent_relation = '25';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 27 Bhaiji, 25 Bhatrijo";
							}
							else{
								$parent_to_child_relation = '23';
								$child_to_parent_relation = '25';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 23 Kaka, 25 Bhatrijo";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==13){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fai, Bhatrijo";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==14){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Banevi, Sado";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							if($temp_data[$j]['firstName']==$temp_data[$k]['middleName']){
								$parent_to_child_relation = '2';
								$child_to_parent_relation = '11';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 2 wife , 11 husband";								
							}
							else{
								$middle_data = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$k]['middleName'])
									->get();
								
								foreach($middle_data as $d){
									$date1 = date_create($d->birthDate);
									$date2 = date_create($temp_data[$j]['birthDate']);
									$diff = date_diff($date1, $date2);
								}

								if($diff->format("%R%a")>0){
									$parent_to_child_relation = '22';
									$child_to_parent_relation = '18';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 22 Bhabhi, 18 Jeth";
								}
								else{
									$parent_to_child_relation = '22';
									$child_to_parent_relation = '20';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 22 Bhabhi, 20 der";
								}
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==16){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Nana, Bhaniyo";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==17){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Nani, Bhaniyo";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==22){

							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '28';
								$child_to_parent_relation = '25';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 28 bhabhu, 25 bhatrijo";
							}
							else{
								$parent_to_child_relation = '24';
								$child_to_parent_relation = '25';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 24 Kaki, 25 bhatrijo";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==23){
								$parent_to_child_relation = '9';
								$child_to_parent_relation = '7';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 9 Grand Father, 7 Grand son";
						}
						elseif($temp_data[$k]['relationSelect']==24){
								$parent_to_child_relation = '10';
								$child_to_parent_relation = '7';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 10 Grand mother, 7 grand son";
						}
						elseif($temp_data[$k]['relationSelect']==25){
							$parent_to_child_relation = '12';
							$child_to_parent_relation = '12';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 12 Brother, 12 Brother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==26){
							$parent_to_child_relation = '13';
							$child_to_parent_relation = '12';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 13 sister, 12 brother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==27){

							$parent_to_child_relation = '9';
							$child_to_parent_relation = '7';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 9 grond father, 7 grand son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==28){

							$parent_to_child_relation = '10';
							$child_to_parent_relation = '7';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 10 grand mother, 7 grand son";
							echo "<br>";
						}
					}

					//4 to other relations 4 = Doughter
					elseif($temp_data[$j]['relationSelect']==4){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '5';
							$child_to_parent_relation = '4';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5 father, 4 daughter";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==2){
							$parent_to_child_relation = '6';
							$child_to_parent_relation = '4';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 6 mother, 4 daughter";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==3){
							$parent_to_child_relation = '12';
							$child_to_parent_relation = '13';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 12 bhai, 13 ben";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							$parent_to_child_relation = '13';
							$child_to_parent_relation = '13';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 13 ben, 13 ben";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==5){
							$parent_to_child_relation = '9';
							$child_to_parent_relation = '8';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 9 grand father, 8 grand daughter";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							$parent_to_child_relation = '10';
							$child_to_parent_relation = '8';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 10 grand mother, 8 grand daughter";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==7){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fai, Bhatrijo";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==8){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fai, Bhatriji";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==9){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." par dada, par putri";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==10){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." par dadi, par putri";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==11){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." N/A, N/A";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==12){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '27';
								$child_to_parent_relation = '26';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 27 Bhaiji, 26 Bhatriji";
							}
							else{
								$parent_to_child_relation = '23';
								$child_to_parent_relation = '26';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 23 Kaka, 26 Bhatriji";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==13){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fai, Bhatriji";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==14){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." jiju, sali";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Bhabhi, nanand";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==16){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Nana, Bhanki";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==17){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Nani, Bhanki";
							// echo "<br>";
						}

						elseif($temp_data[$k]['relationSelect']==22){

							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '28';
								$child_to_parent_relation = '26';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 28 bhabhu, 26 bhatriji";
							}
							else{
								$parent_to_child_relation = '24';
								$child_to_parent_relation = '26';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 24 Kaki, 26 bhatriji";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==23){
								$parent_to_child_relation = '9';
								$child_to_parent_relation = '8';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 9 Grand Father, 7 Grand daughter";
						}
						elseif($temp_data[$k]['relationSelect']==24){
								$parent_to_child_relation = '10';
								$child_to_parent_relation = '8';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 10 Grand mother, 8 grand daughter";
						}
						elseif($temp_data[$k]['relationSelect']==25){
							$parent_to_child_relation = '13';
							$child_to_parent_relation = '12';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 13 sister, 12 Brother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==26){
							$parent_to_child_relation = '13';
							$child_to_parent_relation = '13';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 13 sister, 13 sister";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==27){

							$parent_to_child_relation = '9';
							$child_to_parent_relation = '8';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 9 grond father, 8 grand daughter";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==28){

							$parent_to_child_relation = '10';
							$child_to_parent_relation = '8';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 10 grand mother, 8 grand daughter";
							echo "<br>";
						}
					}

					//5 to other relations 5 = Father
					elseif($temp_data[$j]['relationSelect']==5){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '5';
							$child_to_parent_relation = '3';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5 father, 3 son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==2){
							$parent_to_child_relation = '15';
							$child_to_parent_relation = '16';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 15 Daughter in law, 16 Father in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==3){
							$parent_to_child_relation = '7';
							$child_to_parent_relation = '9';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 7 grand son, 9 grand father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							$parent_to_child_relation = '8';
							$child_to_parent_relation = '9';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 8 grand daughter, 9 grand father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							$parent_to_child_relation = '2';
							$child_to_parent_relation = '11';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 2 Wife, 11 Husband";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==7){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." par putra, par dada";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==8){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." par putri, par dada";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==9){
							$parent_to_child_relation = '5';
							$child_to_parent_relation = '3';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5 father, 3 son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==10){
							$parent_to_child_relation = '6';
							$child_to_parent_relation = '3';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 6 mother, 3 son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==11){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." N/A, N/A";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==12){
							$parent_to_child_relation = '3';
							$child_to_parent_relation = '5';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 3 son, 5 father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==13){
							$parent_to_child_relation = '4';
							$child_to_parent_relation = '5';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 4 daughter, 5 father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==14){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Nana, Bhanki";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." par putra vadhu, par sasra";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==16){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." vevai, vevai";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==17){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." vevan, vevai";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==22){
							$parent_to_child_relation = '15';
							$child_to_parent_relation = '16';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 15 Daughter in law, 16 Father in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==23){
								$parent_to_child_relation = '12';
								$child_to_parent_relation = '12';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 12 Brother, 12 Brother";
						}
						elseif($temp_data[$k]['relationSelect']==24){
								$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '22';
								$child_to_parent_relation = '18';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 22 bhabhi, 18 Jeth";
							}
							else{
								$parent_to_child_relation = '22';
								$child_to_parent_relation = '20';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 24 bhabhi, 26 der";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==25){
							$parent_to_child_relation = '7';
							$child_to_parent_relation = '9';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 7 grand son, 9 grand father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==26){
							$parent_to_child_relation = '8';
							$child_to_parent_relation = '9';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 8 grand daughter, 9 grand father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==27){

							$parent_to_child_relation = '12';
							$child_to_parent_relation = '12';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 12 Brother, 12 Brother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==28){

							$parent_to_child_relation = '22';
							$child_to_parent_relation = '20';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 22 bhabhi, 20 grand der";
							echo "<br>";
						}
					}

					//6 to other relations 6 = Mother
					elseif($temp_data[$j]['relationSelect']==6){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '6';
							$child_to_parent_relation = '3';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 6 mother, 3 son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==2){
							$parent_to_child_relation = '15';
							$child_to_parent_relation = '17';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 15 Daughter in law, 17 Mother in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==3){
							$parent_to_child_relation = '7';
							$child_to_parent_relation = '10';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 7 grand son, 10 grand mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							$parent_to_child_relation = '8';
							$child_to_parent_relation = '10';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 8 grand daughter, 10 grand mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==5){
							$parent_to_child_relation = '2';
							$child_to_parent_relation = '11';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 2 wife, 11 husband";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==7){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." par putra, par dadi";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==8){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." par putri, par dadi";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==9){
							$parent_to_child_relation = '16';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 16 Father in law, 15 Daughter in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==10){
							$parent_to_child_relation = '17';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasu, vahu";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==11){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." N/A, N/A";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==12){
							$parent_to_child_relation = '6';
							$child_to_parent_relation = '3';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 6 mother, 3 son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==13){
							$parent_to_child_relation = '6';
							$child_to_parent_relation = '4';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 6 mother, 4 daughter";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==14){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Jamai, 17 Mother in law";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 15 daughter in law, 17 Mother in law";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==16){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." vevai, vevan";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==17){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." vevan, vevan";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==22){
							$parent_to_child_relation = '15';
							$child_to_parent_relation = '17';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 15 Daughter in law, 17 Mother in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==23){
								$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '18';
								$child_to_parent_relation = '22';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 18 Jeth, 22 Bhabhi";
							}
							else{
								$parent_to_child_relation = '20';
								$child_to_parent_relation = '22';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 20 Der, 22 bhabhi";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==24){
								$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '19';
								$child_to_parent_relation = '21';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 19 Jethani, 21 derani";
							}
							else{
								$parent_to_child_relation = '21';
								$child_to_parent_relation = '19';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 21 derani, 19 Jethani";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==25){
							$parent_to_child_relation = '7';
							$child_to_parent_relation = '10';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 7 grand son, 10 grand mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==26){
							$parent_to_child_relation = '8';
							$child_to_parent_relation = '10';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 8 grand daughter, 10 grand mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==27){

							$parent_to_child_relation = '18';
							$child_to_parent_relation = '22';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 18 Jeth, 22 Bhabhi";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==28){

							$parent_to_child_relation = '19';
							$child_to_parent_relation = '21';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 19 Jethani, 21 Dearni";
							echo "<br>";
						}
					}

					//7 to other relations 7 = Grand son
					elseif($temp_data[$j]['relationSelect']==7){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '7';
							$child_to_parent_relation = '9';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 7 grand son, 9 grand father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==2){
							$parent_to_child_relation = '7';
							$child_to_parent_relation = '10';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 7 grand son, 10 grand mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==3){
							if($temp_data[$j]['middleName']==$temp_data[$k]['firstName']){
								$parent_to_child_relation = '5';
								$child_to_parent_relation = '3';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5 father, 3 son";
							}
							else{
								$middle_data = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$j]['middleName'])
									->get();
								
								foreach($middle_data as $d){
									$date1 = date_create($d->birthDate);
									$date2 = date_create($temp_data[$k]['birthDate']);
									$diff = date_diff($date1, $date2);
								}

								if($diff->format("%R%a")>0){
									$parent_to_child_relation = '23';
									$child_to_parent_relation = '25';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 23 , 25";
								}
								else{
									$parent_to_child_relation = '27';
									$child_to_parent_relation = '25';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 27, 25";
								}
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fai, Bhatrijo";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==5){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Par dada, par putra";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." par putra, par dadi";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==8){
							$parent_to_child_relation = '12';
							$child_to_parent_relation = '13';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." bhai, ben";
							echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==9){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasra, vahu";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==10){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasu, vahu";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==11){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." N/A, N/A";
							// echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==12){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." par dada, Bhatrijo";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==13){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fai, Bhatrijo";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==14){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fuva, Bhatrijo";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							if($temp_data[$j]['middleName']==$temp_data[$k]['middleName']){
								$parent_to_child_relation = '6';
								$child_to_parent_relation = '3';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 6 Mother, 3 son";
							}
							else{
								$middle_data_of_k = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$k]['middleName'])
									->get();

								$middle_data_of_j = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$j]['middleName'])
									->get();
								
								foreach($middle_data_of_k as $d){
									$date1 = date_create($d->birthDate);
								}
								foreach($middle_data_of_j as $d){
									$date2 = date_create($d->birthDate);
								}
								$diff = date_diff($date1, $date2);echo "<br>";

								if($diff->format("%R%a")>0){
									$parent_to_child_relation = '28';
									$child_to_parent_relation = '25';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 23 , 26";
								}
								else{
									$parent_to_child_relation = '24';
									$child_to_parent_relation = '25';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 27, 26";
								}
							}
							echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==16){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Nana, Bhanki";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==17){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Nana, Bhanki";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==22){
							$parent_to_child_relation = '7';
							$child_to_parent_relation = '10';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 7 Grand son, 10 Grand mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==25){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '27';
								$child_to_parent_relation = '25';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 Bhaiji, 25 Bhatrijo";
							}
							else{
								$parent_to_child_relation = '23';
								$child_to_parent_relation = '25';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 23 kaka , 15 bhatrijo";
							}
							echo "<br>";
						}
					}

					//8 to other relations 8 = Grand Daughter
					elseif($temp_data[$j]['relationSelect']==8){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '8';
							$child_to_parent_relation = '9';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 8 grand daughter, 9 grand father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==2){
							$parent_to_child_relation = '8';
							$child_to_parent_relation = '10';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 8 grand daughter, 10 grand mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==3){
							if($temp_data[$j]['middleName']==$temp_data[$k]['firstName']){
								$parent_to_child_relation = '5';
								$child_to_parent_relation = '4';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5 father, 4 daughter";
							}
							else{
								$middle_data = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$j]['middleName'])
									->get();
								
								foreach($middle_data as $d){
									$date1 = date_create($d->birthDate);
									$date2 = date_create($temp_data[$k]['birthDate']);
									$diff = date_diff($date1, $date2);
								}

								if($diff->format("%R%a")>0){
									$parent_to_child_relation = '23';
									$child_to_parent_relation = '26';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 23 , 26";
								}
								else{
									$parent_to_child_relation = '27';
									$child_to_parent_relation = '26';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 27, 26";
								}
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fai, Bhatriji";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==5){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Par dada, par putri";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." par putri, par dadi";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==7){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." ben, bhai";
							// echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==9){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasra, vahu";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==10){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasu, vahu";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==11){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." N/A, N/A";
							// echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==12){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." par dada, Bhatrijo";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==13){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fai, Bhatrijo";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==14){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fuva, Bhatriji";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							if($temp_data[$j]['middleName']==$temp_data[$k]['middleName']){
								$parent_to_child_relation = '6';
								$child_to_parent_relation = '4';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 6 Mother, 4 daughter";
							}
							else{
								$middle_data_of_k = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$k]['middleName'])
									->get();

								$middle_data_of_j = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$j]['middleName'])
									->get();
								
								foreach($middle_data_of_k as $d){
									$date1 = date_create($d->birthDate);
								}
								foreach($middle_data_of_j as $d){
									$date2 = date_create($d->birthDate);
								}
								$diff = date_diff($date1, $date2);echo "<br>";

								if($diff->format("%R%a")>0){
									$parent_to_child_relation = '28';
									$child_to_parent_relation = '26';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 23 , 26";
								}
								else{
									$parent_to_child_relation = '24';
									$child_to_parent_relation = '26';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 27, 26";
								}
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==22){
							$parent_to_child_relation = '8';
							$child_to_parent_relation = '10';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 7 Grand daughter, 10 Grand mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==25){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '27';
								$child_to_parent_relation = '26';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 Bhaiji, 26 nhatriji";
							}
							else{
								$parent_to_child_relation = '23';
								$child_to_parent_relation = '26';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 23 kaka , 26 bhatriji";
							}
							echo "<br>";
						}
					}

					//9 to other relations 9 = Grand Father
					elseif($temp_data[$j]['relationSelect']==9){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '9';
							$child_to_parent_relation = '7';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 9 grand father, 7 grand son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==2){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." mota sasra, vahu beta";
							// echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==3){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5, 4";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==4){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fai, Bhatriji";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==5){
							$parent_to_child_relation = '5';
							$child_to_parent_relation = '3';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5 father, 3 son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							$parent_to_child_relation = '16';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasra, vahu";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==7){
							$parent_to_child_relation = '13';
							$child_to_parent_relation = '12';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." ben, bhai";
							echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==9){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasra, vahu";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==10){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasu, vahu";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==11){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." N/A, N/A";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==12){
							$parent_to_child_relation = '9';
							$child_to_parent_relation = '7';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." grand father, grand son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==13){
							$parent_to_child_relation = '9';
							$child_to_parent_relation = '8';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." grand father, grand daughter";
							echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==16){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." vevai, vevai";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==17){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." vevan, vevai";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==23){
							$parent_to_child_relation = '3';
							$child_to_parent_relation = '5';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 3 Son, 5 Father";
						}
						elseif($temp_data[$k]['relationSelect']==24){
							$parent_to_child_relation = '15';
							$child_to_parent_relation = '16';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 15 Daughter in law, 16 Father in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==27){
							$parent_to_child_relation = '3';
							$child_to_parent_relation = '5';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 3 Son, 5 father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==28){
							$parent_to_child_relation = '15';
							$child_to_parent_relation = '16';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 15 Daughter in law, 16 Father in law";
							echo "<br>";
						}
					}

					//10 to other relations 10 = Grand Mother
					elseif($temp_data[$j]['relationSelect']==10){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '10';
							$child_to_parent_relation = '7';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 10 grand mother, 7 grand son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==2){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." mota sasu, vahu beta";
							// echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==3){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5, 4";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==4){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fai, Bhatriji";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==5){
							$parent_to_child_relation = '6';
							$child_to_parent_relation = '3';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 6 mother, 3 son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							$parent_to_child_relation = '17';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasu, vahu";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==7){
							$parent_to_child_relation = '12';
							$child_to_parent_relation = '13';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." bhai, ben";
							echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==9){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasra, vahu";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==10){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasu, vahu";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==11){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." N/A, N/A";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==12){
							$parent_to_child_relation = '10';
							$child_to_parent_relation = '7';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." grand mother, grand son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==13){
							$parent_to_child_relation = '10';
							$child_to_parent_relation = '8';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." grand mother, grand daughter";
							echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==16){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." vevai, vevan";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==17){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." vevan, vevan";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==23){
							$parent_to_child_relation = '3';
							$child_to_parent_relation = '6';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 3 Son, 6 Mother";
						}
						elseif($temp_data[$k]['relationSelect']==24){
							$parent_to_child_relation = '15';
							$child_to_parent_relation = '17';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 15 Daughter in law, 17 Mother in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==27){
							$parent_to_child_relation = '3';
							$child_to_parent_relation = '6';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 3 Son, 6 Mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==28){
							$parent_to_child_relation = '15';
							$child_to_parent_relation = '17';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 15 Daughter in law, 17 Mother in law";
							echo "<br>";
						}
					}

					//11 to other relations 11 = Husband
					elseif($temp_data[$j]['relationSelect']==11){
						//Not possible
					}

					//12 to other relations 12 = Brother
					elseif($temp_data[$j]['relationSelect']==12){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '12';
							$child_to_parent_relation = '12';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 12 brother, 12 brother";
							echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==2){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." der, bhabhi";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==3){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5, 4";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==4){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fai, Bhatriji";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==5){
							$parent_to_child_relation = '5';
							$child_to_parent_relation = '3';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5 father, 3 son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							$parent_to_child_relation = '6';
							$child_to_parent_relation = '3';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 6 mother, 3 son";
							echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==7){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." bhai, ben";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==9){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasra, vahu";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==10){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasu, vahu";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==11){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." N/A, N/A";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==12){
							$parent_to_child_relation = '12';
							$child_to_parent_relation = '12';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 12 brother, 12 brother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==13){
							$parent_to_child_relation = '12';
							$child_to_parent_relation = '13';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 12 brother, 13 sister";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==22){
							if($temp_data[$j]['firstName']==$temp_data[$k]['middleName']){
								$parent_to_child_relation = '2';
								$child_to_parent_relation = '11';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 2 wife, 11 husband";								
							}
							else{
								$middle_data = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$k]['middleName'])
									->get();
								
								foreach($middle_data as $d){
									$date1 = date_create($d->birthDate);
									$date2 = date_create($temp_data[$j]['birthDate']);
									$diff = date_diff($date1, $date2);
								}

								$parent_to_child_relation = '22';
								if($diff->format("%R%a")>0){
									$child_to_parent_relation = '20';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 22 Bhabhi, 20 Der";
								}
								else{
									$child_to_parent_relation = '18';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 22 Bhabhi, 18 Jeth";
								}
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==23){

							$parent_to_child_relation = '23';
							$child_to_parent_relation = '25';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 23 Kaka, 25 Bhatrijo";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==24){

							$parent_to_child_relation = '24';
							$child_to_parent_relation = '25';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 24 Kaki, 25 Bhatrijo";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==25){
							if($temp_data[$j]['firstName']==$temp_data[$k]['middleName']){
								$parent_to_child_relation = '3';
								$child_to_parent_relation = '5';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 3 Son, 5 Father";								
							}
							else{
								$middle_data = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$k]['middleName'])
									->get();
								
								foreach($middle_data as $d){
									$date1 = date_create($d->birthDate);
									$date2 = date_create($temp_data[$j]['birthDate']);
									$diff = date_diff($date1, $date2);
								}

								$parent_to_child_relation = '25';
								if($diff->format("%R%a")>0){
									$child_to_parent_relation = '23';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 25 Bhatrijo, 23 Kaka";
								}
								else{
									$child_to_parent_relation = '27';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 25 Bhatrijo, 27 Bhaiji";
								}
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==26){
							if($temp_data[$j]['firstName']==$temp_data[$k]['middleName']){
								$parent_to_child_relation = '4';
								$child_to_parent_relation = '5';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 4 Daughter, 5 Father";								
							}
							else{
								$middle_data = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$k]['middleName'])
									->get();
								
								foreach($middle_data as $d){
									$date1 = date_create($d->birthDate);
									$date2 = date_create($temp_data[$j]['birthDate']);
									$diff = date_diff($date1, $date2);
								}

								$parent_to_child_relation = '26';
								if($diff->format("%R%a")>0){
									$child_to_parent_relation = '23';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 23 Kaka";
								}
								else{
									$child_to_parent_relation = '27';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 27 Bhaiji";
								}
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==27){

							$parent_to_child_relation = '27';
							$child_to_parent_relation = '25';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 27 Bhaiji, 25 Bhatrijo";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==28){

							$parent_to_child_relation = '28';
							$child_to_parent_relation = '25';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 28 Bhabhu, 25 Bhatrijo";
							echo "<br>";
						}
					}

					//13 to other relations 13 = Sister
					elseif($temp_data[$j]['relationSelect']==13){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '12';
							$child_to_parent_relation = '13';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 12 brother, 13 sister";
							echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==2){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." der, bhabhi";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==3){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5, 4";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==4){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fai, Bhatriji";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==5){
							$parent_to_child_relation = '5';
							$child_to_parent_relation = '4';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5 father, 4 daughter";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							$parent_to_child_relation = '6';
							$child_to_parent_relation = '4';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 6 mother, 4 daughter";
							echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==7){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." bhai, ben";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==9){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasra, vahu";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==10){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." sasu, vahu";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==11){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." N/A, N/A";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==12){
							$parent_to_child_relation = '12';
							$child_to_parent_relation = '13';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 12 brother, 13 sister";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==13){
							$parent_to_child_relation = '13';
							$child_to_parent_relation = '13';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 13 sister, 13 sister";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==14){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Bhatrija, Faiji";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Bhatriji, Faiji";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==22){
							$parent_to_child_relation = '22';
							$child_to_parent_relation = '31';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 22 Bhabhi, 31 Nanand";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==23){

							$parent_to_child_relation = '23';
							$child_to_parent_relation = '26';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 23 Kaka, 25 Bhatriji";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==24){

							$parent_to_child_relation = '24';
							$child_to_parent_relation = '26';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 24 Kaki, 25 Bhatriji";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==25){

							$parent_to_child_relation = '25';
							$child_to_parent_relation = '32';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 25 Bhatrijo, 32 Fai";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==26){

							$parent_to_child_relation = '26';
							$child_to_parent_relation = '32';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 32 Fai";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==27){

							$parent_to_child_relation = '27';
							$child_to_parent_relation = '26';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 27 Bhaiji, 26 Bhatriji";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==28){

							$parent_to_child_relation = '28';
							$child_to_parent_relation = '26';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 28 Bhabhu, 26 Bhatriji";
							echo "<br>";
						}
					}

					//14 to other relations 14 = Son in low
					elseif($temp_data[$j]['relationSelect']==14){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '16';
							$child_to_parent_relation = '14';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 16 Father in law, 14 Son in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==2){
							$parent_to_child_relation = '17';
							$child_to_parent_relation = '14';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 mother in law, 14 Son in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==3){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Salo, Banevi";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							$parent_to_child_relation = '2';
							$child_to_parent_relation = '11';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 2 Wife, 11 Husband";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==7){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fuva, Bhatrijo";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==8){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fuva, Bhatriji";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==12){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Kakaji sasra/mota sasra, Jamai";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==13){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Faiji, Jamai";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Bhabhi, Jiju";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==16){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Nanaji, Jamai";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==17){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Naniji, Jamai";
							// echo "<br>";
						}

					}

					//15 to other relations 15 = Daughter in low
					elseif($temp_data[$j]['relationSelect']==15){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '16';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 16 Father in law, 15 Daughter in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==2){
							$parent_to_child_relation = '17';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 mother in law, 15 Daughter in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==3){
							if($temp_data[$j]['middleName']==$temp_data[$k]['firstName']){
								$parent_to_child_relation = '11';
								$child_to_parent_relation = '2';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 4 Daughter, 5 Father";								
							}
							else{
								$middle_data = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$j]['middleName'])
									->get();
								
								foreach($middle_data as $d){
									$date1 = date_create($d->birthDate);
									$date2 = date_create($temp_data[$k]['birthDate']);
									$diff = date_diff($date1, $date2);
								}

								if($diff->format("%R%a")>0){
									$parent_to_child_relation = '20';
									$child_to_parent_relation = '22';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 20 der, 22 bhabhi";
								}
								else{
									$parent_to_child_relation = '18';
									$child_to_parent_relation = '22';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 18 jeth, 22 bhabhi";
								}
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							$parent_to_child_relation = '31';
							$child_to_parent_relation = '22';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 31 Nanand, 22 Bhabhi";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==7){
							if($temp_data[$j]['middleName']==$temp_data[$k]['middleName']){
								$parent_to_child_relation = '3';
								$child_to_parent_relation = '6';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 3 Son, 6 Mother";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==8){
							if($temp_data[$j]['middleName']==$temp_data[$k]['middleName']){
								$parent_to_child_relation = '4';
								$child_to_parent_relation = '6';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 4 Daughter, 6 Mother";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==12){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Kakaji sasra/mota sasra, Jamai";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==13){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Faiji, Jamai";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Bhabhi, Jiju";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==16){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Nanaji, Jamai";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==17){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Naniji, Jamai";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==22){
							$parent_to_child_relation = '17';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 Mother in law, 15 Daughter in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==25){

							if($temp_data[$j]['firstName']==$temp_data[$k]['middleName']){
								$parent_to_child_relation = '11';
								$child_to_parent_relation = '2';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 11 husband, 2 wife";								
							}
							else{
								$middle_data = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$k]['middleName'])
									->get();
								
								foreach($middle_data as $d){
									$date1 = date_create($d->birthDate);
									$date2 = date_create($temp_data[$j]['birthDate']);
									$diff = date_diff($date1, $date2);
								}

								if($diff->format("%R%a")>0){
									$parent_to_child_relation = '18';
									$child_to_parent_relation = '22';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 18 Jeth, 22 Bhabhi";
								}
								else{
									$parent_to_child_relation = '20';
									$child_to_parent_relation = '22';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 20 der, 22 Bhabhi";
								}
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==26){

							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$j]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '26';
								$child_to_parent_relation = '28';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 bhatriji, 28 bhabhu";
							}
							else{
								$parent_to_child_relation = '26';
								$child_to_parent_relation = '24';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 bhatriji, 24 kaki";
							}
						}
					}

					//16 to other relations 16 = Father in low
					elseif($temp_data[$j]['relationSelect']==16){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '14';
							$child_to_parent_relation = '16';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 14 Son in law, 16 Father in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==2){
							$parent_to_child_relation = '5';
							$child_to_parent_relation = '4';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5 Father, 4 Daughter";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==3){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Bhaniyo, Nana";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Bhanki, Nana";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==5){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." vevai, vevai";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Vevan, Vevai";
							// echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==7){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." , Bhatrijo";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==8){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fuva, Bhatriji";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==12){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Kakaji sasra/mota sasra, Jamai";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==14){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Bhanej, Nanaji";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Bhanej, Nanaji";
							// echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==16){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 11 Husband, 2 Wife";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==17){
							$parent_to_child_relation = '2';
							$child_to_parent_relation = '11';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 2 Wife, 11 Husband";
							echo "<br>";
						}

					}

					//17 to other relations 17 = Mother in low
					elseif($temp_data[$j]['relationSelect']==17){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '14';
							$child_to_parent_relation = '17';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 14 Son in law, 17 Mother in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==2){
							$parent_to_child_relation = '4';
							$child_to_parent_relation = '6';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 4 Daughter, 6 Mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==3){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Bhaniyo, Nani";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Bhanki, Nani";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==5){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." vevai, vevan";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Vevan, Vevan";
							// echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==7){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." , Bhatrijo";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==8){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Fuva, Bhatriji";
						// 	echo "<br>";
						// }
						// if($temp_data[$k]['relationSelect']==12){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Kakaji sasra/mota sasra, Jamai";
						// 	echo "<br>";
						// }
						elseif($temp_data[$k]['relationSelect']==14){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Bhanej, Naniji";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							// echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." Bhanej, Nanaji";
							// echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==16){
							$parent_to_child_relation = '11';
							$child_to_parent_relation = '2';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 11 Husband, 2 Wife";
							echo "<br>";
						}
						// if($temp_data[$k]['relationSelect']==17){
						// 	echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 2 Wife, 11 Husband";
						// 	echo "<br>";
						// }

					}

					//22 to other relations 22 = Bhabhi
					elseif($temp_data[$j]['relationSelect']==22){
						if($temp_data[$k]['relationSelect']==1){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$j]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$k]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '18';
								$child_to_parent_relation = '22';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 18 Jeth, 22 Bhabhi";
							}
							else{
								$parent_to_child_relation = '20';
								$child_to_parent_relation = '22';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 20 der, 22 Bhabhi";
							}
						}
						elseif($temp_data[$k]['relationSelect']==2){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$j]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$k]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '19';
								$child_to_parent_relation = '21';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 19 Jethani, 21 Derani";
							}
							else{
								$parent_to_child_relation = '21';
								$child_to_parent_relation = '19';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 21 deraani, 19 jethani";
							}
						}
						elseif($temp_data[$k]['relationSelect']==3){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$j]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$k]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '25';
								$child_to_parent_relation = '28';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 25 Bhatrijo, 28 bhabhu";
							}
							else{
								$parent_to_child_relation = '25';
								$child_to_parent_relation = '24';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 25 Bhatrijo, 24 Kaki";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$j]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$k]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '26';
								$child_to_parent_relation = '28';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 28 bhabhu";
							}
							else{
								$parent_to_child_relation = '26';
								$child_to_parent_relation = '24';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 24 Kaki";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==5){
							$parent_to_child_relation = '16';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 16 Father in law, 15 Daughter in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==6){
							$parent_to_child_relation = '17';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 mother in law, 15 Daughter in law";
							echo "<br>";	
						}
						if($temp_data[$k]['relationSelect']==7){
							$parent_to_child_relation = '7';
							$child_to_parent_relation = '10';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 7 Grand son, 10 Grand mother";
							echo "<br>";
						}
						if($temp_data[$k]['relationSelect']==8){
							$parent_to_child_relation = '8';
							$child_to_parent_relation = '10';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 8 Grand mother, 10 Grand mother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==15){
							$parent_to_child_relation = '15';
							$child_to_parent_relation = '17';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 15 Daughter in law, 17 Mother in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==22){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$j]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$k]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '19';
								$child_to_parent_relation = '21';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 19 Jethani, 21 Derani";
							}
							else{
								$parent_to_child_relation = '21';
								$child_to_parent_relation = '19';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 21 Derani, 19 Jethani";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==23){
							$parent_to_child_relation = '16';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 16 father in law, 15 daughter in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==24){
							$parent_to_child_relation = '17';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 mother in law, 15 daughter in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==25){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$j]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$k]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '25';
								$child_to_parent_relation = '28';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 25 Bhatrijo, 28 Bhabhu";
							}
							else{
								$parent_to_child_relation = '25';
								$child_to_parent_relation = '14';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 25 Bhatrijo, 14 Kaki";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==26){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$j]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$k]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '26';
								$child_to_parent_relation = '28';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 28 Bhabhu";
							}
							else{
								$parent_to_child_relation = '26';
								$child_to_parent_relation = '14';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 14 Kaki";
							}
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==27){
							$parent_to_child_relation = '16';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 16 Father in law, 15 Mother in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==28){
							$parent_to_child_relation = '17';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 Mother in law, 15 Mother in law";
							echo "<br>";
						}

					}

					//24 to other relations 24 = Kaki
					elseif($temp_data[$j]['relationSelect']==24){
						if($temp_data[$k]['relationSelect']==1){
							$parent_to_child_relation = '25';
							$child_to_parent_relation = '24';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 25 Bhatrijo, 24 Kaki";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==2){
							$parent_to_child_relation = '17';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 Mother in law, 15 Mother in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==3){
							$parent_to_child_relation = '10';
							$child_to_parent_relation = '7';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 10 grand mother, 7 Grand son";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==4){
							$parent_to_child_relation = '10';
							$child_to_parent_relation = '8';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 10 grand mother, 8 Grand daughter";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==5){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$j]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$k]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '18';
								$child_to_parent_relation = '22';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 18 Jeth, 22 Bhabhi";
							}
							else{
								$parent_to_child_relation = '20';
								$child_to_parent_relation = '22';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 20 Der, 22 Bhabhi";
							}
						}
						elseif($temp_data[$k]['relationSelect']==6){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$j]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$k]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '19';
								$child_to_parent_relation = '21';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 19 Jethani, 21 Derani";
							}
							else{
								$parent_to_child_relation = '21';
								$child_to_parent_relation = '19';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 21 deraani, 19 Jethani";
							}	
						}
						elseif($temp_data[$k]['relationSelect']==9){
							$parent_to_child_relation = '16';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 16 Father in law, 15 Daughter in law";
							echo "<br>";	
						}
						elseif($temp_data[$k]['relationSelect']==10){
							$parent_to_child_relation = '17';
							$child_to_parent_relation = '15';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 17 Mother in law, 15 Daughter in law";
							echo "<br>";	
						}
						elseif($temp_data[$k]['relationSelect']==12){
							if($temp_data[$j]['middleName']==$temp_data[$k]['middleName']){
								$parent_to_child_relation = '3';
								$child_to_parent_relation = '6';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 3 Son, 6 Mother";	
							}
							echo "<br>";	
						}
						elseif($temp_data[$k]['relationSelect']==13){
							if($temp_data[$j]['firstName']==$temp_data[$k]['middleName']){
								$parent_to_child_relation = '5';
								$child_to_parent_relation = '4';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 5 Father, 4 Daughter";	
							}
							else{
								$middle_data = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$j]['middleName'])
									->get();
								
								foreach($middle_data as $d){
									$date1 = date_create($d->birthDate);
									$date2 = date_create($temp_data[$k]['birthDate']);
									$diff = date_diff($date1, $date2);
								}

								if($diff->format("%R%a")>0){
									$parent_to_child_relation = '26';
									$child_to_parent_relation = '27';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 27 Bhaiji";
								}
								else{
									$parent_to_child_relation = '26';
									$child_to_parent_relation = '23';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 26 Bhatriji, 23 Kaka";
								}
							}
							echo "<br>";	
						}
						elseif($temp_data[$k]['relationSelect']==22){
							$parent_to_child_relation = '15';
							$child_to_parent_relation = '16';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 15 Daughter in law, 16 Father in law";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==23){
							$parent_to_child_relation = '12';
							$child_to_parent_relation = '12';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 12 Brother, 12 Brother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==24){
							if($temp_data[$j]['firstName']==$temp_data[$k]['middleName']){
								$parent_to_child_relation = '2';
								$child_to_parent_relation = '11';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 2 Wife, 11 Husband";
								echo "<br>";	
							}
							else{
								$middle_data = DB::table('userData')
									->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
									->where('family_id', '=', $key->family_id)
									->where('firstName', '=', $temp_data[$j]['middleName'])
									->get();
								
								foreach($middle_data as $d){
									$date1 = date_create($d->birthDate);
									$date2 = date_create($temp_data[$k]['birthDate']);
									$diff = date_diff($date1, $date2);
								}

								if($diff->format("%R%a")>0){
									$parent_to_child_relation = '22';
									$child_to_parent_relation = '18';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 22 Bhabhi, 18 Jeth";
								}
								else{
									$parent_to_child_relation = '22';
									$child_to_parent_relation = '20';
									echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 22 Bhabhi, 20 Der";
								}
								echo "<br>";
							}
						}
						elseif($temp_data[$k]['relationSelect']==25){
							$parent_to_child_relation = '7';
							$child_to_parent_relation = '9';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 7 Grand son, 9 Grand father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==26){
							$parent_to_child_relation = '8';
							$child_to_parent_relation = '9';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 8 Grand daughter, 9 Grand father";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==27){
							$parent_to_child_relation = '12';
							$child_to_parent_relation = '12';
							echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 12 Brother, 12 Brother";
							echo "<br>";
						}
						elseif($temp_data[$k]['relationSelect']==28){
							$middle_data = DB::table('userData')
								->select('id', 'firstName', 'relationSelect', 'gender', 'birthDate')
								->where('family_id', '=', $key->family_id)
								->where('firstName', '=', $temp_data[$k]['middleName'])
								->get();
							
							foreach($middle_data as $d){
								$date1 = date_create($d->birthDate);
								$date2 = date_create($temp_data[$k]['birthDate']);
								$diff = date_diff($date1, $date2);
							}

							if($diff->format("%R%a")>0){
								$parent_to_child_relation = '22';
								$child_to_parent_relation = '18';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 22 Bhabhi, 18 Jeth";
							}
							else{
								$parent_to_child_relation = '22';
								$child_to_parent_relation = '20';
								echo $temp_data[$j]['id']." ".$temp_data[$j]['firstName']." ".$temp_data[$k]['id']." ".$temp_data[$k]['firstName']." 22 Bhabhi, 20 Der";
							}
							echo "<br>";
						}

					}

					if($parent_to_child_relation!='' && $child_to_parent_relation!=''){
						DB::table('relationship')->insert([
							'family_id' => $key->family_id,
							'parent_userData_id' => $temp_data[$j]['id'],
							'child_userData_id' => $temp_data[$k]['id'],
							'parent_to_child_relation' => $parent_to_child_relation,
							'child_to_parent_relation' => $child_to_parent_relation,
							'audit_ip' => $ipaddress
						]);
					}

				}
			}
			DB::table('relation_created')
				->where('family_id', $key->family_id)
				->update(['inserted_relationship_table' => '1']);
		}



	}
}