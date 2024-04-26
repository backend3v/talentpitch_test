<?php
namespace App\Library\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class GenerateService
{
public function get_faker($keyword,$cantity,$properties,$model)
{
  $text = "Write a json with ".$cantity." ".$keyword." ".$model." objects with properties ".$properties;
  Log::channel('stderr')->info($text);
  $token = env('IA_API_KEY');
  $path = env('API_TEXT_GENERATION');
  $response = Http::withToken($token)->post($path,['providers' => 'openai','text'=>$text]);
  $response_body = json_decode($response->body());
  Log::channel('stderr')->info(gettype($response_body));
  return json_decode($response_body->openai->generated_text,true);
}
public function get_faker2($keyword,$cantity,$properties,$model)
{
  $content = '{
    "program1": {
    "name": "The Adventures of Sherlock Holmes",
    "date": "Every Saturday",
    "location": "London, England",
    "frequency": "Weekly",
    "description": "Follow the famous detective Sherlock Holmes and his partner Dr. Watson as they solve mysterious crimes in Victorian London."
    },
    "program2": {
    "name": "Game of Thrones",
    "date": "Every Sunday",
    "location": "Westeros",
    "frequency": "Weekly",
    "description": "Enter the world of Westeros, where noble families fight for control of the Iron Throne and supernatural forces threaten the realm."
    },
    "program3": {
    "name": "Stranger Things",
    "date": "Every Friday",
    "location": "Hawkins, Indiana",
    "frequency": "Weekly",
    "description": "Join a group of friends as they uncover supernatural mysteries and battle against a government conspiracy in 1980s small town America."
    }
    }';
  $json = json_decode($content,true);
  Log::channel('stderr')->info($json);
  return $json;
}
    
}