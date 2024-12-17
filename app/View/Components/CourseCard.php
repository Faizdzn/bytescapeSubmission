<?php

namespace App\View\Components;

use App\Models\Course;
use App\Models\CourseRate;
use App\Models\Kelas;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CourseCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $cid = '1'
    )
    {
        $this->cid = $cid;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $courseDt = Course::select()->where('course_id', $this->cid)->first();   
        
        $star = CourseRate::select(['star'])->where('course_id', $this->cid)->get();
        $starTotal = count($star);
        $starArr = 0;

        foreach($star as $i) {
            $starArr += $i['star'];
        }

        $starAvg = $starTotal > 0 ? ($starArr / $starTotal) : 0;

        $class = Kelas::select()->where('kelas_id', $courseDt->kelas_id)->first();

        return view('components.course-card', [
            'course' => $courseDt,
            'kelas' => $class,
            'star' => $starAvg
        ]);
    }
}
