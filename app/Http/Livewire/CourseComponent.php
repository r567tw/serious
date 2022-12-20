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
            'title'       => 'required|min:5',
            'description' => 'required'
        ]);

        Course::create([
            'title' => $this->title,
            'description' => $this->description
        ]);

        $this->resetInput();
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
            'title' => 'required|min:5',
            'description' => 'required'
        ]);

        if ($this->selected_id) {
            $record = Course::find($this->selected_id);
            $record->update([
                'title' => $this->title,
                'description' => $this->description
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }

    }

    public function destroy($id)
    {
        if ($id) {
            $record = Course::where('id', $id);
            $record->delete();
        }
    }
}
