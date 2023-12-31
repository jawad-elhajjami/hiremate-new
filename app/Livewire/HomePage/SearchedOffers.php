<?php

namespace App\Livewire\HomePage;

use App\Models\City;
use App\Models\Country;
use App\Models\Employer;
use App\Models\favSeekerPost;
use App\Models\JobOfferPost;
use App\Models\recentSeekerPost;
use App\Models\User;
use Auth;
use Illuminate\Support\Collection;
use Livewire\Attributes\Renderless;
use Livewire\Component;
use Livewire\Attributes\On;
use Session; 

class SearchedOffers extends Component
{
    public $offers = [];
    public $employers = [];
    public $users = [];
    public $favPosts = [];
    public $authUser;
    public static $postId = 0;
    public static  $selectedPostId;
    public $showingFilter = false;
    public $searchedTitle;
    public $searchedLocation;
    public $idJob = 1;
    public $windowWidth;
    public $resultsFound = false;

    #[Renderless]
    public function showModal(){
        // dd($key);
        $this->dispatch("modal-show",  ['id' => Session::get('selectedOfferPostId')]);
    }
    
    public function render()
    {
        return view('livewire.home-page.searched-offers', [
            $this->employers = Employer::all(),
            $this->users = User::all(),
            $this->authUser = Auth::user(),
            $this->favPosts = favSeekerPost::UserFav(),
            self::$selectedPostId = Session::get('selectedOfferPostId', ''),
        ]);
    }

    public function mount() {
        $this->searchedTitle = Session::get('last_search_title', '');
        $this->searchedLocation = Session::get('last_search_location', '');
        $this->offers = $this->searching([$this->searchedTitle, $this->searchedLocation]);
    }

    #[On('searching')]
    public function searching($data) {
        $this->searchedTitle = $data[0];
        $this->searchedLocation = $data[1];
        if ($this->searchedTitle != "" || $this->searchedLocation != "") {
            if($this->searchedTitle != "" && $this->searchedLocation != "") {
                $jobTitle = JobOfferPost::where("title", "like", "%".$this->searchedTitle."%")->get();
                $companyId = Employer::where("companyName", "like", "%".$this->searchedTitle."%")->exists() ? 
                Employer::where("companyName", "like", "%".$this->searchedTitle."%")->get()[0]->user_id : null;                
                $companyName = JobOfferPost::where("user_id",  $companyId)->get();
                $countryIds = Country::getCountryId($this->searchedLocation);
                $cityIds = City::getCityId($this->searchedLocation);
                $country = JobOfferPost::where("country_id", "like", "")->get();
                foreach($countryIds as $countryId){
                    JobOfferPost::where("country_id", "like", $countryId->id)->exists() ? $country = JobOfferPost::where("country_id", "like", $countryId->id)->get() : null;
                }
                $city = JobOfferPost::where("city_id", "like", "")->get();
                foreach($cityIds as $cityId){
                    JobOfferPost::where("city_id", "like", $cityId->id)->exists() ? $city = JobOfferPost::where("city_id", "like", $cityId->id)->get() : null;
                }
                $this->offers = ($jobTitle->merge($companyName))->intersect($country->merge($city));
            }elseif($this->searchedTitle != "") {
                $jobTitle = JobOfferPost::where("title", "like", "%".$this->searchedTitle."%")->get();
                $companyId = Employer::where("companyName", "like", "%".$this->searchedTitle."%")->exists() ? 
                Employer::where("companyName", "like", "%".$this->searchedTitle."%")->get()[0]->user_id : null;
                $companyName = JobOfferPost::where("user_id",  $companyId)->get();
                $this->offers = $jobTitle->merge($companyName);
            }elseif($this->searchedLocation != "") {
                $countryIds = Country::getCountryId($this->searchedLocation);
                $cityIds = City::getCityId($this->searchedLocation);
                $country = JobOfferPost::where("country_id", "like", "")->get();
                foreach($countryIds as $countryId){
                    JobOfferPost::where("country_id", "like", $countryId->id)->exists() ? $country = JobOfferPost::where("country_id", "like", $countryId->id)->get() : null;
                }
                $city = JobOfferPost::where("city_id", "like", "")->get();
                foreach($cityIds as $cityId){
                    JobOfferPost::where("city_id", "like", $cityId->id)->exists() ? $city = JobOfferPost::where("city_id", "like", $cityId->id)->get() : null;
                }
                $this->offers = $country->merge($city);
            }
            // JobseekerOffers::selectNavSection(2);
            if ($this->offers->keys()->first() != ''){
                self::$selectedPostId = $this->offers[$this->offers->keys()->first()]->id;
                Session::put('selectedOfferPostId', self::$selectedPostId);
                $this->resultsFound = true;
                return $this->offers;
            } else {
                $this->resultsFound = false;
                return $this->offers;
            }
        } else {
            return null;
        }
    }
    public function likedPost($postId): bool {
        $liked = false;
        foreach($this->favPosts as $favPost) {
            $favPost->post_id == $postId ? $liked = true : null;
        }
        return $liked;
    }

    public function addFav($postId) {
        // $this->js("alert('$postId')");
        if(!favSeekerPost::where('user_id','=',$this->authUser->id)->where('post_id','=', $postId)->exists()) {
            favSeekerPost::create([
                'user_id' => $this->authUser->id,
                'post_id' => $postId,
            ]);
        } else {
            favSeekerPost::where('user_id','=',$this->authUser->id)->where('post_id','=', $postId)->delete();
        }

        // $this->init($postId-1);
    }

    public function init($lastSelectedPostId) {
        self::$selectedPostId = $lastSelectedPostId;
    }

    public function showOfferDetails($postId) {
        // dd($postId ,$id);
        Session::put('selectedOfferPostId', $postId);
        // self::$selectedPostId = $postId;
        $this->idJob = $postId;

        if($this->windowWidth < 768) {
            $this->dispatch('popup-joboffer-details', postId:$postId-1);
        }
        
        if(!recentSeekerPost::where('user_id','=',$this->authUser->id)->where('post_id','=', $postId)->exists()) {
            recentSeekerPost::create([
                'user_id' => $this->authUser->id,
                'post_id' => $postId,
            ]);
        }else {
            recentSeekerPost::where('user_id','=',$this->authUser->id)->where('post_id','=', $postId)->delete();
            recentSeekerPost::create([
                'user_id' => $this->authUser->id,
                'post_id' => $postId,
            ]);
        }
    }

}