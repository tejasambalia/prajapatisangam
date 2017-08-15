<?php
namespace App\Classes;

use Illuminate\Http\Request;
use DB;

Class SearchLogic {
	public function search($searchText) {
		//set default value
		$oreginalSearchText = trim($searchText);
		$searchText = '%'.$oreginalSearchText.'%';


		//check string contains white space
		if(!preg_match('/\s/',$oreginalSearchText)){
			$surname = DB::table('m_surname')
			->where('name', '=', $oreginalSearchText)
			->select('id')
			->get();

			$surnameId = '';
			foreach ($surname as $data) {
				$surnameId = $data->id;
			}

			//check search text in user information
			$resultAddress = DB::table('userData')
				->where('firstName', 'like', $searchText)
				->orWhere('middleName', 'like', $searchText)
				->orWhere('surnameId', '=', $surnameId)
				->orWhere('website', 'like', $searchText)
				->orWhere('homeTown', 'like', $searchText)
				->orWhere('education', 'like', $searchText)
				->orWhere('occupation', 'like', $searchText)
				->orWhere('phone', '=', $oreginalSearchText)
				->select('id')
				->get();
		}
		else{
			$perfectString = preg_replace('/\s\s+/', ' ', $oreginalSearchText);
			$searchWords = preg_split('/\s/', $perfectString);
			//remove more then 3 words
			if(count($searchWords)>3){
				for ($key=3; $key < count($searchWords); $key++) { 
					unset($searchWords[$key]);
				}
			}
			foreach ($searchWords as $tempWord) {
				$compareSearchWord[] = '%'.$tempWord.'%';
			}
						
			if(count($searchWords)>0){
				if(count($searchWords)==1){
					//one word not possible here

				}
				elseif(count($searchWords)==2){
					//two words conditions
					$surname = DB::table('m_surname')
						->where('name', '=', $searchWords[0])
						->select('id')
						->get();

					if(count($surname)>0){
						//first surname
						foreach ($surname as $data) {
							$surnameId = $data->id;
						}

						$resultAddress = DB::table('userData')
							->where('firstName', 'like', $compareSearchWord[1])
							->where('surnameId', '=', $surnameId)
							->select('id')
							->get();
					}
					else{
						//second surname or not
						$surname = DB::table('m_surname')
							->where('name', '=', $searchWords[1])
							->select('id')
							->get();
						if(count($surname)>0){
							//second surname
							foreach ($surname as $data) {
								$surnameId = $data->id;
							}

							$resultAddress = DB::table('userData')
								->where('firstName', 'like', $compareSearchWord[0])
								->where('surnameId', '=', $surnameId)
								->select('id')
								->get();
						}
						else{
							//no surname
							$resultAddress = DB::table('userData')
								->where('firstName', 'like', $compareSearchWord[0])
								->where('middleName', 'like', $compareSearchWord[1])
								->select('id')
								->get();
						}

					}
				}
				elseif(count($searchWords)==3){
					//three words condition

					$surname = DB::table('m_surname')
						->where('name', '=', $searchWords[0])
						->select('id')
						->get();

					if(count($surname)>0){
						//first word surname
						foreach ($surname as $data) {
							$surnameId = $data->id;
						}

						$resultAddress = DB::table('userData')
							->where('firstName', 'like', $compareSearchWord[1])
							->where('middleName', 'like', $compareSearchWord[2])
							->where('surnameId', '=', $surnameId)
							->select('id')
							->get();

					}
					else{
						//last word surname
						$surname = DB::table('m_surname')
							->where('name', '=', $searchWords[2])
							->select('id')
							->get();

						if(count($surname)>0){
							foreach ($surname as $data) {
								$surnameId = $data->id;
							}

							$resultAddress = DB::table('userData')
								->where('firstName', 'like', $compareSearchWord[0])
								->where('middleName', 'like', $compareSearchWord[1])
								->where('surnameId', '=', $surnameId)
								->select('id')
								->get();
						}
						else{
							$resultAddress = DB::table('userData')
								->where('firstName', 'like', $compareSearchWord[0])
								->where('middleName', 'like', $compareSearchWord[1])
								->select('id')
								->get();
						}
					}
				}
			}
		}

		return $resultAddress;
	}
}