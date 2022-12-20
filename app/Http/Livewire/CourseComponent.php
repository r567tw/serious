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
        $error = $this->validate([
            'title'       => 'required|min:2',
            'description' => 'required|max:200'
        ]);

        Course::create([
            'title' => $this->title,
            'description' => $this->description
        ]);

        $this->resetInput();
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
        $errors = $this->validate([
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
            session()->flash('message', 'Course successfully updated.');
        }

    }

    public function destroy($id)
    {
        if ($id) {
            $record = Course::where('id', $id);
            $record->delete();
            session()->flash('message', 'Course successfully deleted.');
        }
    }
}
