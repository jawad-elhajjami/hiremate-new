<?php

namespace App\Livewire\HomePage;

use App\Models\Employer;
use App\Models\JobOfferPost;
use Livewire\Component;

class JobseekerOffers extends Component
{
    public $offers = [];
    public $employers = [];
    public static $postId = 0;
    public static $selectedPostId = 0;


    public function render()
    {
        return view('livewire.home-page.jobseeker-offers', [
            $this->offers = JobOfferPost::all(),
            $this->employers = Employer::all(),
        ]);
    }

    public function addFav() {
        $this->js("alert('method reached')");
        
        // $this->dispatch('likeOffer', $postId);
    }

    public function showOfferDetails($postId) {
        self::$selectedPostId = $postId-1;
        // $this->js("console.log('$test')");
    }


}