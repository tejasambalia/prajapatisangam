<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use DateTime;
use URL;

class SitemapController extends Controller
{
	public function sitemap(){
		$link = URL::asset('');

		//generate video link
		$data_video = DB::table('content_video')
			->select('id', 'title', 'audit_created_date', 'audit_updated_date')
			->get();

		//generate profile data
		$data_profile = DB::table('userData')
			->select('id', 'firstName', 'audit_created_date', 'audit_updated_date')
			->get();

		$xml = "";

		$xml.='<?xml version="1.0" encoding="UTF-8"?>
		<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
		  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" 
		  xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">';

		//video links
		foreach ($data_video as $d_video) {
			$title = str_replace(' ', '-', $d_video->title);
            $title = preg_replace('/[^A-Za-z0-9\-]/', '', $title);
			$lastmod = strtotime($d_video->audit_updated_date);
			if($lastmod==''){
				$lastmod = strtotime($d_video->audit_created_date);
			}
			$xml.="<url><loc>".$link.$title."/".$d_video->id."</loc><lastmod>".date('Y-m-d', $lastmod)."</lastmod></url>";
		}

		//profile links
		http://www.prajapatisangam.com/profile/Rameshbhai/12
		foreach ($data_profile as $d_profile) {
			if($d_profile->firstName!=''){
				$title = str_replace(' ', '-', $d_profile->firstName);
	            $title = preg_replace('/[^A-Za-z0-9\-]/', '', $title);
				$lastmod = strtotime($d_profile->audit_updated_date);
				if($lastmod==''){
					$lastmod = strtotime($d_profile->audit_created_date);
				}
				$xml.="<url><loc>".$link."profile/".$title."/".$d_profile->id."</loc><lastmod>".date('Y-m-d', $lastmod)."</lastmod></url>";
			}
		}

		//static urls
		$xml.="<url><loc>".$link."index</loc><lastmod>".date('Y-m-d')."</lastmod></url>";
		$xml.="<url><loc>".$link."</loc><lastmod>".date('Y-m-d')."</lastmod></url>";
		$xml.="<url><loc>".$link."signin</loc><lastmod>2017-09-03</lastmod></url>";
		$xml.="<url><loc>".$link."signup</loc><lastmod>2017-09-03</lastmod></url>";
		$xml.="<url><loc>".$link."about</loc><lastmod>2017-09-03</lastmod></url>";
		$xml.="<url><loc>".$link."terms</loc><lastmod>2017-09-03</lastmod></url>";
		$xml.="<url><loc>".$link."faqs</loc><lastmod>2017-09-03</lastmod></url>";
		$xml.="<url><loc>".$link."news</loc><lastmod>".date('Y-m-d')."</lastmod></url>";
		

		$xml.="</urlset>";

		// $fp = fopen('sitemap.xml', 'w');
		// fwrite($fp, $xml);
		// fclose($fp);
		echo $xml;
	}
}