<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidate;
use App\Models\Skills;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class UpdateJobSeekerProfileData extends Component
{
    use WithFileUploads;

    public $user;
    public $resume, $resumeUrl, $resumePath;
    public $coverPictureUrl, $coverPicturePath, $coverPicture;
    public $coverLetterUrl, $coverLetterPath, $coverLetter;
    public $skillsList;
    public $showingAddSkillModal = false;
    public $skills;
    public $title;

    public function mount()
    {
        $this->user = Candidate::where('user_id', auth()->user()->id)->first();
        $this->resumeUrl = $this->user->curriculumVitae;
        $this->coverPictureUrl = $this->user->coverPicture;
        $this->coverLetterUrl = $this->user->coverLetter;
        $this->skillsList = Skills::all();
        $this->skills = $this->user->skills;
    }


    public function showAddSkillModal(){
        $this->showingAddSkillModal = true;
    }

    // function to remove CV
    public function removeCV(){
        Storage::delete($this->resumeUrl);
        $this->user->update([
            'curriculumVitae' => null,
        ]);
        $this->reset(['resume','resumeUrl']);
        // Redirect to the profile page
        // return redirect('/user/profile');
    }

    // function to remove cover picture
    public function removeCoverPicture(){
        Storage::delete($this->coverPictureUrl);
        $this->user->update([
            'coverPicture' => null
        ]);
        $this->reset(['coverPicture','coverPictureUrl']);
        // Redirect to the profile page
        // return redirect('/user/profile');
    }

    // function to remove cover letter 
    public function removeCoverLetter(){
        Storage::delete($this->coverLetterUrl);
        $this->user->update([
            'coverLetter' => null
        ]);
        $this->reset(['coverLetter','coverLetterUrl']);
        // Redirect to the profile page
        // return redirect('/user/profile');
    }

    public function addSkill(){
        $validated = $this->validate([
            'title' => 'required|max:25|unique:skills'
        ]);
        Skills::create([
            'title' => $this->title
        ]);
        
        $this->reset(['showingAddSkillModal']);
        return redirect('/user/profile');

    }

    // function to save data to the DB
    public function save()
    {   
        $validated = $this->validate([
            'resume' => 'nullable|file|mimes:pdf,docx|max:2048',
            'coverPicture' => 'nullable|file|mimes:png,jpg,jpeg|max:2048',
            'coverLetter' => 'nullable|file|mimes:pdf,docx|max:2048'
        ]);
        
        $this->user->update([
            'skills' => $this->skills
        ]);
        if ($this->resume) {
            // storing file in storage/public/uploads folder
            $this->resumePath = $this->resume->storeAs('public/uploads', 'cv-user'.auth()->user()->id.'.pdf');
            
            $this->user->update([
                'curriculumVitae' => $this->resumePath,
            ]);
            return redirect('/user/profile');
        }

        if($this->coverPicture){
            $this->coverPicturePath = $this->coverPicture->storeAs('public/uploads/cover_pictures','cover-user'.auth()->user()->id.'.jpg');
            
            $this->user->update([
                'coverPicture' => $this->coverPicturePath,
            ]);
            return redirect('/user/profile');
        }

        if($this->coverLetter){
            $this->coverLetterPath = $this->coverLetter->storeAs('public/uploads/cover_letters','coverletter-user'.auth()->user()->id.'.pdf');
            
            $this->user->update([
                'coverLetter' => $this->coverLetterPath,
            ]);
            return redirect('/user/profile');
        }

        session()->flash('success', 'Data saved successfully !');

    }

    public function render()
    {
        return view('livewire.update-job-seeker-profile-data',[
            'skills' => Skills::all(),   
        ]);
    }
}