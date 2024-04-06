<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $viewData = [];
    $viewData["title"] = "Sandwich Queen";
    return view('home.index')->with("viewData", $viewData);
  }

  public function about()
  {
    $viewData = [];
    $viewData["title"] = "About us - Sandwich Queen";
    $viewData["subtitle"] =  "About Sandwich Queen";
    $viewData["description"] =  "At Sandwich Queen, we don't just make sandwiches, we craft them. With a sprinkle of tradition and a dash of innovation, our gourmet sandwiches bring the taste of royalty to your everyday life. Since opening, we've been dedicated to using only the freshest local produce and the finest artisanal bread. Our commitment? To serve you not just a meal, but an experience that delights with every bite. Whether you're craving a classic or seeking a surprise, our menu is a testament to our passion for sandwich perfection. Join us and savor the taste of Sandwich Queen, where every sandwich is a bite of bliss.";
    $viewData["author"] = "Developed by: Bambang Sarif";
    return view('home.about')->with("viewData", $viewData);
    
  }
}

?>