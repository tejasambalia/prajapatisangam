<?php
namespace App\Http\Controllers;
use DB;
use App\news_source;
use App\content_news;

class NewsController extends Controller{

	public function callapi()
	{
		$news_urls = news_source::get();
		
		$ch = curl_init();

		foreach ($news_urls as $data) {
			if($data->site=='newsapi.org'){
				curl_setopt($ch, CURLOPT_URL, $data->link);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 120);
				$authToken = curl_exec($ch);
				$return_data = json_decode($authToken);
				if($return_data->status=='ok'){
					//store news data in our DB
					$source = $return_data->source;
					foreach ($return_data->articles as $data_news) {
						$data_insert['title'] = $data_news->title;
						$data_insert['image_link'] = $data_news->urlToImage;
						$data_insert['url'] = $data_news->url;
						$data_insert['description'] = $data_news->description;
						$data_insert['author'] = $data_news->author;
						$data_insert['source'] = $source;

						content_news::insert($data_insert);
					}
				}
			}
		}
	}
}