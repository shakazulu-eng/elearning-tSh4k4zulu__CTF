use App\Models\User;
use Illuminate\Http\Request;

public function assignCourse(Request $request, $id)
{
    $request->validate([
        'course_id' => 'required|exists:courses,id',
    ]);

    $user = User::findOrFail($id);
    $user->course_id = $request->course_id;
    $user->save();

    return back()->with('success', 'Course assigned successfully');
}
