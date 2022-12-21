<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CourseComponent extends Component
{
    use LivewireAlert;

    public $data, $title, $description, $selected_id;
    public $updateMode = false;

    public function render()
    {
        $this->data = Course::all();
        return view('livewire.course.component');
    }

    private function resetInput()
    {
        $this->title = null;
        $this->description = null;
    }

    public function store()
    {
        $this->validate([
            'title'       => 'required|min:2|max:20',
            'description' => 'required|max:200'
        ]);

        Course::create([
            'title' => $this->title,
            'description' => $this->description
        ]);

        $this->resetInput();
        $this->alert('success', 'Post Created', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }

    public function edit($id)
    {
        $record = Course::findOrFail($id);

        $this->selected_id = $id;
        $this->title = $record->title;
        $this->description = $record->description;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'title' => 'required|min:2',
            'description' => 'required|max:200'
        ]);

        if ($this->selected_id) {
            $record = Course::find($this->selected_id);
            $record->update([
                'title' => $this->title,
                'description' => $this->description
            ]);

            $this->resetInput();
            $this->updateMode = false;

            $this->alert('success', 'Course successfully updated.', [
                'position' => 'center',
                'timer' => 1000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }

    }

    public function destroy($id)
    {
        if ($id) {
            $record = Course::where('id', $id);
            $record->delete();
            $this->alert('info', 'Course successfully deleted.', [
                'position' => 'center',
                'timer' => 1000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function vote($id)
    {
        if ($id) {
            $course = Course::find($id);
            $course->vote(auth()->user());

            $this->alert('success', 'voted.', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }
}
