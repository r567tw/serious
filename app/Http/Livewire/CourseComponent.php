<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class CourseComponent extends Component
{
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
        $this->emit('alert_remove');
        session()->flash('message', 'Course successfully created.');
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
            $this->emit('alert_remove');
            session()->flash('message', 'Course successfully updated.');
        }

    }

    public function destroy($id)
    {
        if ($id) {
            $record = Course::where('id', $id);
            $record->delete();
            $this->emit('alert_remove');
            session()->flash('message', 'Course successfully deleted.');
        }
    }

    public function vote($id)
    {
        if ($id) {
            $course = Course::find($id);
            $course->vote(auth()->user());
            $this->emit('alert_remove');
            session()->flash('message', 'voted.');
        }
    }
}
